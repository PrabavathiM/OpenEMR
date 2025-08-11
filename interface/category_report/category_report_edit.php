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

$Catogery = sqlStatement("SELECT pc_catname FROM categories_patient_report");

$old_name = $_GET['name'] ?? '';
$old_duration = $_GET['duration'] ?? '';
$selectedCatogery = $old_name;
$duration = $old_duration;
$success_msg = '';
$error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token_form'])) {
    if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
        CsrfUtils::csrfNotVerified();
    }

    $selectedCatogery = $_POST['pc_catname'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $old_name = $_POST['old_name'] ?? '';
    $old_duration = $_POST['old_duration'] ?? '';

    if (!empty($selectedCatogery) && !empty($duration)) {
        
        $check_query = "SELECT * FROM categories_patient_report  WHERE pc_catname = ? AND pc_duration = ?";
        $check_result = sqlStatement($check_query, [$selectedCatogery, $duration]);

        if (sqlNumRows($check_result) == 0 || ($old_name == $selectedCatogery && $old_duration == $duration)) {
            $update_query = "UPDATE categories_patient_report SET pc_duration = ? WHERE pc_catname = ? AND pc_duration = ?";
            sqlStatement($update_query, [$duration, $old_name, $old_duration]);
            $success_msg = "Category updated successfully.";
            header("Location: category_report_table.php");
            exit;
        } else {
            $error_msg = "A record with this category and duration already exists.";
        }
    } else {
        $error_msg = "Both fields are required.";
    }
}

// CSRF Token
$csrf_token = CsrfUtils::collectCsrfToken();


?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo xlt("Edit Category Report"); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h3 class="text-center mb-4"><?php echo xlt("Edit Category Report"); ?></h3>

    <?php if ($success_msg): ?>
        <div class="alert alert-success"><?php echo text($success_msg); ?></div>
    <?php endif; ?>

    <?php if ($error_msg): ?>
        <div class="alert alert-danger"><?php echo text($error_msg); ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="csrf_token_form" value="<?php echo attr($csrf_token); ?>">
        <input type="hidden" name="old_name" value="<?php echo attr($old_name); ?>">
        <input type="hidden" name="old_duration" value="<?php echo attr($old_duration); ?>">

        <div class="form-group">
            <label><?php echo xlt("Category"); ?></label>
            <select name="pc_catname" class="form-control" required>
                <option value=""><?php echo xlt("Please Select Category"); ?></option>
                <?php while ($row = sqlFetchArray($Catogery)) : ?>
                    <option value="<?php echo attr($row['pc_catname']); ?>" <?php echo ($selectedCatogery == $row['pc_catname']) ? "selected" : ""; ?>>
                        <?php echo text($row['pc_catname']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label><?php echo xlt("Duration"); ?></label>
            <select name="duration" class="form-control" required>
                <option value=""><?php echo xlt("Select Duration"); ?></option>
                <?php for ($i = 0; $i <= 60; $i += 5): ?>
                    <option value="<?php echo $i; ?>" <?php echo ($duration == $i) ? "selected" : ""; ?>>
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?php echo xlt("Update Category"); ?></button>
        <a href="category_report_table.php" class="btn btn-secondary ml-2"><?php echo xlt("Cancel"); ?></a>
    </form>
</body>
</html>
