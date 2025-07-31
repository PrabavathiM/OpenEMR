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

$patientId = $_SESSION['pid'] ?? null; // Check for logged-in patient

// Default: current date
$defaultDate = date('Y-m-d');

// Process form data or use default date
$fromDate = $_POST['from_date'] ?? $defaultDate;
$toDate = $_POST['to_date'] ?? $defaultDate;

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
</head>
<body class="container mt-3">

<h3><?php echo xlt("Patient Appointment Report"); ?></h3>

<?php if ($patientId): ?>
<form method="POST" class="form-inline mb-3">
    <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>" />

    <label class="mr-2"><?php echo xlt("From Date"); ?>:</label>
    <input type="date" name="from_date" class="form-control mr-3"
           value="<?php echo attr($fromDate); ?>" required>

    <label class="mr-2"><?php echo xlt("To Date"); ?>:</label>
    <input type="date" name="to_date" class="form-control mr-3"
           value="<?php echo attr($toDate); ?>" required>

    <button type="submit" class="btn btn-primary"><?php echo xlt("Submit"); ?></button>
</form>

<?php
    // Fetch encounters for the logged-in patient
    // $encQuery = "
    //     SELECT pid, facility, reason, date
    //     FROM form_encounter JOIN openemr_postcalendar_events ON form_encounter.encounter = openemr_postcalendar_events.pc_pid 
    //     WHERE date BETWEEN ? AND ? AND pid = ?
    //     ORDER BY date DESC
    // ";
    $encQuery = "
    SELECT pc_title
    FROM openemr_postcalendar_events
    WHERE pc_eventDate BETWEEN ? AND ? AND pc_pid = ?
    ORDER BY pc_eventDate DESC
";

    $encResults = sqlStatement($encQuery, [$fromDate, $toDate, $patientId]);

    if (sqlNumRows($encResults) > 0) {
        echo "<h5 class='mt-4'>" . xlt("Encounters for Patient ID:") . " " . text($patientId) . "</h5>";
        echo "<table class='table table-bordered'>
                <thead>
                    <tr>
                        
                        <th>" . xlt("Facility") . "</th>
                        <th>" . xlt("Category") . "</th>
                    </tr>
                </thead>
                <tbody>";

        while ($enc = sqlFetchArray($encResults)) {
            echo "<tr>
    
                    <td>" . text($enc['facility']) . "</td>
                    <td>" . text($enc['reason']) . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='text-muted'>" . xlt("No appointment records found for selected date range.") . "</p>";
    }
?>

<?php else: ?>
    <div class="alert alert-warning">
        <?php echo xlt("No patient is currently logged in."); ?>
    </div>
<?php endif; ?>

</body>
</html>
