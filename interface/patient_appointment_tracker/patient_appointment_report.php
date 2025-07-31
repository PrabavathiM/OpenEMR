<?php
require_once "../globals.php";
require_once("$srcdir/sql.inc");
require_once "$srcdir/patient.inc.php";
require_once "$srcdir/options.inc.php";
require_once "$srcdir/patient_tracker.inc.php";
require_once "$srcdir/user.inc.php";
require_once "$srcdir/MedEx/API.php";

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;

if (!empty($_POST)) {
    if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
        CsrfUtils::csrfNotVerified();
    }
}


Header::setupHeader();

$selectedDate = $_POST['appointment_date'] ?? date('Y-m-d');
?>

<html>
<head>
    <title><?php echo xlt("Patient Appointment Tracker"); ?></title>
</head>
<body class="container mt-3">

<h3><?php echo xlt("Patient Appointment Tracker"); ?></h3>

<form method="POST" class="form-inline mb-3">
    <label for="appointment_date"><?php echo xlt("Select Date"); ?>: </label>
    <input type="date" name="appointment_date" id="appointment_date" class="form-control mx-2"
           value="<?php echo attr($selectedDate); ?>" required>
    <button type="submit" class="btn btn-primary"><?php echo xlt("Submit"); ?></button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "
        SELECT 
            e.pc_pid AS pid,
            p.fname,
            p.lname,
            e.pc_appttime,
            e.pc_catid,
            c.pc_catname
        FROM 
            openemr_postcalendar_events e
        JOIN 
            patient_data p ON p.pid = e.pc_pid
        LEFT JOIN 
            openemr_postcalendar_categories c ON c.pc_catid = e.pc_catid
        WHERE 
            DATE(e.pc_eventDate) = ?
            AND e.pc_apptstatus = ''
        ORDER BY e.pc_appttime
    ";

    $results = sqlStatement($query, [$selectedDate]);

    echo "<table class='table table-bordered mt-3'>
            <thead>
                <tr>
                    <th>" . xlt("Patient ID") . "</th>
                    <th>" . xlt("First Name") . "</th>
                    <th>" . xlt("Last Name") . "</th>
                    <th>" . xlt("Time") . "</th>
                    <th>" . xlt("Category") . "</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = sqlFetchArray($results)) {
        echo "<tr>
                <td>" . text($row['pid']) . "</td>
                <td>" . text($row['fname']) . "</td>
                <td>" . text($row['lname']) . "</td>
                <td>" . text(substr($row['pc_appttime'], 0, 5)) . "</td>
                <td>" . text($row['pc_catname']) . "</td>
              </tr>";
    }
    echo "</tbody></table>";
}
?>

</body>
</html>
