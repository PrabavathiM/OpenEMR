    <?php
    require_once "../globals.php";
    require_once "$srcdir/patient.inc.php";
    require_once "$srcdir/options.inc.php";
    require_once "$srcdir/patient_tracker.inc.php";
    require_once "$srcdir/user.inc.php";
    require_once "$srcdir/MedEx/API.php";

    use OpenEMR\Common\Csrf\CsrfUtils;
    use OpenEMR\Core\Header;

    Header::setupHeader();

    // $Catogery = sqlStatement("SELECT pc_catname FROM openemr_postcalendar_categories");
    // $selectedCatogery = $_POST['pc_catname'] ?? '';
    // $duration = $_POST['duration'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
            CsrfUtils::csrfNotVerified();
        }
    }


    $selectedCatogery = isset($_POST['form_category']) ? $_POST['form_category'] : '';
    $duration = isset($_POST['duration']) ? $_POST['duration'] : '';
    $catid = isset($_POST['catid_hidden']) ? $_POST['catid_hidden'] : '';


    // Read the event categories, generate their options list, and get
    // the default event duration from them if this is a new event.
    $cattype = 0;
    if (!empty($_GET['prov']) && ($_GET['prov'] == true)) {
        $cattype = 1;
    }

    if ($_GET['group'] == true) {
        $cattype = 3;
    }

    $cres = sqlStatement("SELECT pc_catid, pc_cattype, pc_catname, " .
        "pc_recurrtype, pc_duration, pc_end_all_day " .
        "FROM openemr_postcalendar_categories where pc_active = 1 ORDER BY pc_seq");
    $catoptions = "";

    $prefcat_options = "    <option value='0'>-- " . xlt("None{{Category}}") . " --</option>\n";

    while ($crow = sqlFetchArray($cres)) {
        $cat_duration = round($crow['$text'] / 60);
        if ($crow['pc_end_all_day']) {
            $cat_duration = 1440;
        }

        // This section is to build the list of preferred categories:
        if ($cat_duration) {
            $prefcat_options .= "    <option value='" . attr($crow['pc_catid']) . "'";
            if ($eid) {
                if ($crow['pc_catid'] == $row['pc_prefcatid']) {
                    $prefcat_options .= " selected";
                }
            }

            $prefcat_options .= ">" . text(xl_appt_category($crow['pc_catname'])) . "</option>\n";
        }

        if ($crow['pc_cattype'] != $cattype) {
            continue;
        }

        $catoptions .= "    <option value='" . attr($crow['pc_catid']) . "'";
        if ($eid) {
            if ($crow['pc_catid'] == $row['pc_catid']) {
                $catoptions .= " selected";
            }
        } else {
            if ($crow['pc_catid'] == $default_catid) {
                $catoptions .= " selected";
                $thisduration = $cat_duration;
            }
        }

        $catoptions .= ">" . text(xl_appt_category($crow['pc_catname'])) . "</option>\n";
    }
    ?>
    <html>

    <head>
        <title><?php echo xlt("Category Report"); ?></title>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.jqueryui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.4/css/buttons.jqueryui.css">
    </head>

    <body class="container mt-3">

        <form method="POST">
            <div>
                <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>">
                <input type="hidden" name="catid_hidden" id="catid_hidden">
                <h3 class="d-flex justify-content-center"><?php echo xlt("Category Report"); ?></h3>
                <label for=" duration">Category</label>
                <select class='form-control' name='form_category' id='form_category' onchange='set_category()'>
                    <?php echo $catoptions ?>
                </select>
                <label for="duration"> Select Duration:</label>
                <select name="duration" id="duration" class="form-control" required>
                    <option value="">-- Select Duration --</option>
                    <?php
                    for ($i = 0; $i <= 60; $i += 5) {
                        $text = $i; 
                        echo "<option value=\"$i\">$text</option>";
                    }
                    ?>
                </select>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary "><?php echo xlt("Submit"); ?></button>
                </div>

            </div>
        </form>
        <?php
        if (!empty($selectedCatogery) && !empty($duration)) {
            // Get category name from ID
            $catnameQuery = "SELECT pc_catname FROM openemr_postcalendar_categories WHERE pc_catid = ?";
            $catnameResult = sqlQuery($catnameQuery, array($selectedCatogery));
            $catname = $catnameResult['pc_catname'] ?? '';
            // 1. Check for duplicate category name + duration
            $check_both_query = "SELECT * FROM catogery_report WHERE name = ? AND duration = ?";
            $check_both_result = sqlStatement($check_both_query, array($catname, $duration));

            // 2. Check for duplicate category name only (regardless of duration)
            $check_name_query = "SELECT * FROM catogery_report WHERE name = ?";
            $check_name_result = sqlStatement($check_name_query, array($catname));

            if (sqlNumRows($check_both_result) > 0) {
                echo "<div class='alert alert-danger'>" . xlt("This Category and Duration combination already exists.") . "</div>";
            } elseif (sqlNumRows($check_name_result) > 0) {
                echo "<div class='alert alert-warning'>" . xlt("This Category already exists with a different duration.") . "</div>";
            } else {
                // Safe to insert
                $insert_query = "INSERT INTO catogery_report (pc_catid, name, duration) VALUES (?, ?, ?)";
                sqlStatement($insert_query, array($selectedCatogery, $catname, $duration));
            }
        }

        $allDataQuery = "SELECT * FROM catogery_report";
        $allDataResult = sqlStatement($allDataQuery);
        echo "<table class='table table-bordered' id='catogery_report_table'>
        <thead>
            <tr>
                <th>" . xlt("Category") . "</th>
                <th>" . xlt("Duration") . "</th>
                <th>" . xlt("Actions") . "</th>
            </tr>
        </thead>
        <tbody>";

        if (sqlNumRows($allDataResult) > 0) {
            while ($row = sqlFetchArray($allDataResult)) {
                echo "<tr>
            <td>" . text($row['name']) . "</td>
            <td>" . text($row['duration']) . "</td>
            <td>
                <a href='category_report_edit.php?name=" . urlencode($row['name']) . "&duration=" . urlencode($row['duration']) . "' 
                   class='btn btn-primary'>
                    " . xlt("Edit") . "
                </a>
                <form method='POST' style='display:inline-block' action='category_report_delete.php' onsubmit='return confirm(\"Are you sure?\");'>
                    <input type='hidden' name='name' value='" . attr($row['name']) . "'>
                    <input type='hidden' name='duration' value='" . attr($row['duration']) . "'>
                    <button class='btn btn-danger' type='submit'>" . xlt("Delete") . "</button>
                </form>
            </td>
          </tr>";
            }
        } else {
            echo "<tr><td colspan='3' class='text-center text-muted'>" . xlt("No records in category report table.") . "</td></tr>";
        }

        echo "</tbody></table>";
        ?>

    </body>

    </html>