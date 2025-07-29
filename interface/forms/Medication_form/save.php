<?php
require_once("../../globals.php");
require_once("$srcdir/api.inc.php");
require_once("$srcdir/forms.inc.php");

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;

if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
    CsrfUtils::csrfNotVerified();
}

// if (!$encounter) {
//     die(xlt("Internal error: we do not seem to be in an encounter!"));
// }       


$formid = $_POST['id'] ?? '';
$pid = $_SESSION['pid'];
$encounter = $_SESSION['encounter'];
$user = $_SESSION['authUser'];
$date = date("Y-m-d H:i:s");

$data = [
    $_POST['drug_name'],
    $_POST['dosage'],
    $_POST['route'],
    $_POST['frequency'],
    $_POST['start_date'],
    $_POST['stop_date'],
    $_POST['refills'],
    $_POST['status'],
    $_POST['discontinuation_reason'],
    $_POST['instructions']
];

if ($formid) {
    $query = "UPDATE form_medication SET 
        drug_name = ?, dosage = ?, route = ?, frequency = ?, start_date = ?, stop_date = ?, 
        refills = ?, status = ?, discontinuation_reason = ?, instructions = ?, date = ?, user = ? 
        WHERE id = ?";
    sqlStatement($query, array_merge($data, [$date, $user, $formid]));
} else {
    $query = "INSERT INTO form_medication (
        drug_name, dosage, route, frequency, start_date, stop_date,
        refills, status, discontinuation_reason, instructions,
        date, user, pid, encounter
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $newid = sqlInsert($query, array_merge($data, [$date, $user, $pid, $encounter]));
    addForm($encounter, "medication_form", $newid, "form_medication", $pid, $user);
}

formHeader("Redirecting...");
formJump();
formFooter();
exit;


// Fetch existing data if editing
if ($formid) {
    $row = sqlQuery("SELECT * FROM form_medication WHERE id = ?", [$formid]);
    if ($row) {
        extract($row);
    }
}

?>