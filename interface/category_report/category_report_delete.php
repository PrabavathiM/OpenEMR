<?php
require_once "../globals.php";

use OpenEMR\Common\Csrf\CsrfUtils;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $duration = $_POST['duration'];

    $query = "DELETE FROM categories_patient_report WHERE name = ? AND duration = ?";
    sqlStatement($query, array($name, $duration));
    header("Location: category_report_table.php");
    exit;
}
?>
