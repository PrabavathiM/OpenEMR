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

    $patientId = $_SESSION['pid'] ?? null; // Check for current patient

    // Process form data or use default date
    $fromDate = $_POST['from_date'] ?? '';
    $toDate = $_POST['to_date'] ?? '';
    $facilityList = sqlStatement("SELECT id,name FROM facility");
    $selectedFacility = $_POST['facility'] ?? '';

    // CSRF Check
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
            CsrfUtils::csrfNotVerified();
        }
    }
    ?>

    <html>

    <head>
        <title><?php echo xlt("Patient Appointment Report"); ?></title>

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.jqueryui.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.4/css/buttons.jqueryui.css">    
    </head>

    <body class="container mt-3">

        <h3><?php echo xlt("Patient Appointment Report"); ?></h3>
        <!-- export button -->
            <div class="d-flex justify-content-end mb-3">
                <button id="export_csv" class="btn btn-danger"><?php echo xlt("Export"); ?></button>
            </div>

        <?php if ($patientId): ?>
            <form method="POST" class="form-inline mb-3">
                <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>">

                <label class="mr-2"><?php echo xlt("From Date"); ?>:</label>
                <input type="date" name="from_date" class="form-control mr-3"
                    value="<?php echo attr($fromDate); ?>" required>

            <label class="mr-2"><?php echo xlt("To Date"); ?>:</label>
            <input type="date" name="to_date" class="form-control mr-3"
                value="<?php echo attr($toDate); ?>" required>

            <select name="facility" class="form-control" required>
                <option value=""><?php echo xlt("Please Select Facility"); ?></option>
                <?php while ($row = sqlFetchArray($facilityList)) : ?>
                    <option value="<?php echo attr($row['name']); ?>"
                        <?php echo ($selectedFacility == $row['name']) ? "selected" : ""; ?>>
                        <?php echo text($row['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
                <button type="submit" class="btn btn-primary"><?php echo xlt("Submit"); ?></button>
            </form>

            <?php
            // Fetch encounters for the logged-in patient
            if (!empty($fromDate) && !empty($toDate) && !empty($selectedFacility)) {

                $encQuery = "
                    SELECT openemr_postcalendar_events.pc_eventDate, openemr_postcalendar_events.pc_title, facility.name
                    FROM openemr_postcalendar_events JOIN facility ON openemr_postcalendar_events.pc_facility = facility.id
                    WHERE  openemr_postcalendar_events.pc_pid = ? AND openemr_postcalendar_events.pc_eventDate BETWEEN ? AND ? AND facility.name = ?
                    ORDER BY openemr_postcalendar_events.pc_eventDate DESC
                ";
                $encResults = sqlStatement($encQuery, [$patientId, $fromDate, $toDate, $selectedFacility]);

                if (sqlNumRows($encResults) > 0) {

                    echo "<h5 class='mt-4'>" . xlt("Patient ID:") . " " . text($patientId) . "</h5>";
                    echo "<table class='table table-bordered' id = 'patient_appointment_report_table'>
                                <thead>
                                    <tr>
                                        
                                        <th>" . xlt("Date") . "</th>
                                        <th>" . xlt("Category") . "</th>
                                        <th>" . xlt("Facility") . "</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>";

                    while ($enc = sqlFetchArray($encResults)) {
                        echo "<tr>
                    
                                    <td>" . text($enc['pc_eventDate']) . "</td>
                                    <td>" . text($enc['pc_title']) . "</td>
                                    <td>" . text($enc['name']) . "</td>
                                    
                                </tr>";
                    }
                } else {
                    echo "<p class='text-muted'>" . xlt("No appointment records found for selected date range.") . "</p>";
                }
            }
            ?>

        <?php else: ?>
            <div class="alert alert-warning">
                <?php echo xlt("No patient is currently logged in."); ?>
            </div>
        <?php endif; ?>
        <script src="patient_appointment_report.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.jqueryui.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.4/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.jqueryui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.print.min.js"></script>
    </body>
    </html>