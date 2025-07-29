<?php
require_once("../../globals.php");
require_once("$srcdir/api.inc.php");
require_once("$srcdir/forms.inc.php");

use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Core\Header;


if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
    CsrfUtils::csrfNotVerified();
}

$returnurl = 'encounter_top.php';
$formid = (int) (isset($_GET['id']) ? $_GET['id'] : 0);
$check_res = $formid ? formFetch("form_medication", $formid) : array();
?>
<html>
<head>
    <?php Header::setupHeader(); ?>
</head>
<body <?php echo $top_bg_line;?> topmargin="0" rightmargin="0" leftmargin="2"
 bottommargin="0" marginwidth="2" marginheight="0">

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h2><?php echo xlt('Clinical Notes Form'); ?></h2>

            <form method="post" name="my_form" action="<?php echo $rootdir; ?>/forms/Medication_form/save.php?id=<?php echo attr_url($formid); ?>">
                <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>" />
                <div class="container">
                    <h4>Medication Details</h4>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Drug Name</label>
                            <input type="text" name="drug_name" class="form-control" value="<?php echo attr($drug_name); ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Dosage</label>
                            <input type="text" name="dosage" class="form-control" value="<?php echo attr($dosage); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Route</label>
                            <input type="text" name="route" class="form-control" value="<?php echo attr($route); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Frequency</label>
                            <input type="text" name="frequency" class="form-control" value="<?php echo attr($frequency); ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Refills</label>
                            <input type="number" name="refills" class="form-control" value="<?php echo attr($refills); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control" value="<?php echo attr($start_date); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Stop Date</label>
                            <input type="date" name="stop_date" class="form-control" value="<?php echo attr($stop_date); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Active" <?php echo ($status == 'Active' ? 'selected' : ''); ?>>Active</option>
                                <option value="Discontinued" <?php echo ($status == 'Discontinued' ? 'selected' : ''); ?>>Discontinued</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Reason for Discontinuation</label>
                            <input type="text" name="discontinuation_reason" class="form-control" value="<?php echo attr($discontinuation_reason); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Instructions</label>
                        <textarea name="instructions" class="form-control" rows="3"><?php echo text($instructions); ?></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Save Medication</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html> 
