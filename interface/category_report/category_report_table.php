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

    $Catogery = sqlStatement("SELECT pc_catname FROM openemr_postcalendar_categories ");
    $selectedCatogery = $_POST['pc_catname'] ?? '';
    $duration = $_POST['duration'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
            CsrfUtils::csrfNotVerified();
        }
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
                <h3 class="d-flex justify-content-center"><?php echo xlt("Category Report"); ?></h3>
                <label for=" duration">Category</label>
                <select name="pc_catname" class="form-control" required>
                    <option value=""><?php echo xlt("Please Select Category"); ?></option>
                    <?php while ($row = sqlFetchArray($Catogery)) : ?>
                        <option value="<?php echo attr($row['pc_catname']); ?>"
                            <?php echo ($selectedCatogery == $row['pc_catname']) ? "selected" : ""; ?>>
                            <?php echo text($row['pc_catname']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label for="duration">Select Duration:</label>
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
            $query = "SELECT pc_catname FROM openemr_postcalendar_categories WHERE pc_catname = ?";
            $result = sqlStatement($query, array($selectedCatogery));

            if (sqlNumRows($result) > 0) {
                $check_query = "SELECT * FROM catogery_report WHERE name = ? AND duration = ?";
                $check_result = sqlStatement($check_query, array($selectedCatogery, $duration));

                if (sqlNumRows($check_result) == 0) {
                    $insert_query = "INSERT INTO catogery_report (name, duration) VALUES (?, ?)";
                    sqlStatement($insert_query, array($selectedCatogery, $duration));
                } else {
                    echo "<div class='alert alert-warning'>" . xlt("Category and Duration already exists.") . "</div>";
                }
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
}
else {
            echo "<tr><td colspan='3' class='text-center text-muted'>" . xlt("No records in category report table.") . "</td></tr>";
        }

        echo "</tbody></table>";
        ?>

    </body>
    </html>