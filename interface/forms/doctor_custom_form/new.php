        <?php

        /**
         * Clinical instructions form.
         *
         * @package   OpenEMR
         * @link      http://www.open-emr.org
         * @author    Jacob T Paul <jacob@zhservices.com>
         * @author    Brady Miller <brady.g.miller@gmail.com>
         * @copyright Copyright (c) 2015 Z&H Consultancy Services Private Limited <sam@zhservices.com>
         * @copyright Copyright (c) 2017-2019 Brady Miller <brady.g.miller@gmail.com>
         * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
         */

        require_once(__DIR__ . "/../../globals.php");
        require_once("$srcdir/api.inc.php");
        require_once("$srcdir/patient.inc.php");
        require_once("$srcdir/options.inc.php");

        use OpenEMR\Common\Csrf\CsrfUtils;
        use OpenEMR\Core\Header;

        $returnurl = 'encounter_top.php';
        $formid = (int) (isset($_GET['id']) ? $_GET['id'] : 0);
        // when edit click it pre-fill the form
        $check_res = $formid ? formFetch("doctor_custom_form", $formid) : array();
        ?>
        <html>

        <head>
            <title><?php echo xlt("Doctor Custom From"); ?></title>

            <?php Header::setupHeader(); ?>
        </head>

        <body>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <h2><?php echo xlt('Doctor Custom From '); ?></h2>
                        <form method="post" name="my_form" action="<?php echo $rootdir; ?>/forms/doctor_custom_form/save.php?id=<?php echo attr_url($formid); ?>">
                            <input type="hidden" name="csrf_token_form" value="<?php echo attr(CsrfUtils::collectCsrfToken()); ?>" />
                            <fieldset>
                                <legend><?php echo xlt('Doctor Instructions'); ?></legend>
                                <div class="container">
                                    <div class="form-group">
                                        <textarea name="doctor_instruction" id="instruction" class="form-control" cols="80" rows="5"><?php echo text($check_res['doctor_instruction'] ?? ''); ?></textarea>
                                    </div>
                                    <!-- Date and Time Field -->
                                    <div class="form-group">
                                        <label for="available_date">Date and Time</label>
                                        <input type="datetime-local" class="form-control" id="date_time" name="date_time" value="<?php echo text($check_res['datetime'] ?? ''); ?>"></input>
                                    </div>
                                    <!-- Health Issue -->
                                    <div class="form-group">
                                        <label for="health_issue">Common Health Issue</label>
                                        <select class="form-control" id="health_issue" name="health_issue" required>
                                            <option value="">-- Select an Issue --</option>
                                            <option value="fever" <?php echo ($check_res['health_issue'] ?? '') == 'fever' ? 'selected' : ''; ?>>Fever</option>
                                            <option value="cold_cough" <?php echo ($check_res['health_issue'] ?? '') == 'cold_cough' ? 'selected' : ''; ?>>Cold & Cough</option>
                                            <option value="headache" <?php echo ($check_res['health_issue'] ?? '') == 'headache' ? 'selected' : ''; ?>>Headache</option>
                                            <option value="diabetes" <?php echo ($check_res['health_issue'] ?? '') == 'diabetes' ? 'selected' : ''; ?>>Diabetes</option>
                                            <option value="hypertension" <?php echo ($check_res['health_issue'] ?? '') == 'hypertension' ? 'selected' : ''; ?>>Hypertension</option>
                                            <option value="allergy" <?php echo ($check_res['health_issue'] ?? '') == 'allergy' ? 'selected' : ''; ?>>Allergy</option>
                                            <option value="stomach_pain" <?php echo ($check_res['health_issue'] ?? '') == 'stomach_pain' ? 'selected' : ''; ?>>Stomach Pain</option>
                                            <option value="skin_issue" <?php echo ($check_res['health_issue'] ?? '') == 'skin_issue' ? 'selected' : ''; ?>>Skin Issue</option>
                                            <option value="asthma" <?php echo ($check_res['health_issue'] ?? '') == 'asthma' ? 'selected' : ''; ?>>Asthma</option>
                                            <option value="others" <?php echo ($check_res['health_issue'] ?? '') == 'others' ? 'selected' : ''; ?>>Others</option>
                                        </select>
                                    </div>

                                    <!-- count -->
                                    <div class="form-group">
                                        <label for="doctor_name">Count</label>
                                        <input type="number" class="form-control" id="count" name="count" min="1" value="<?php echo text($check_res['count'] ?? ''); ?>">
                                    </div>

                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="btn-group" role="group">
                                    <button type="submit" onclick='top.restoreSession()' class="btn btn-primary btn-save"><?php echo xlt('Save'); ?></button>
                                    <button type="button" class="btn btn-secondary btn-cancel" onclick="top.restoreSession(); parent.closeTab(window.name, false);"><?php echo xlt('Cancel'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

        </html>