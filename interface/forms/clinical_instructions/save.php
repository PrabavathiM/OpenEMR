        <?php

        // /**
        //  * Clinical instructions form save.php
        //  *
        //  * @package   OpenEMR
        //  * @link      http://www.open-emr.org
        //  * @author    Jacob T Paul <jacob@zhservices.com>
        //  * @author    Brady Miller <brady.g.miller@gmail.com>
        //  * @copyright Copyright (c) 2015 Z&H Consultancy Services Private Limited <sam@zhservices.com>
        //  * @copyright Copyright (c) 2019 Brady Miller <brady.g.miller@gmail.com>
        //  * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
        //  */ 

        // require_once(__DIR__ . "/../../globals.php");
        // require_once("$srcdir/api.inc.php");
        // require_once("$srcdir/forms.inc.php");

        // use OpenEMR\Common\Csrf\CsrfUtils;

        // if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
        //     CsrfUtils::csrfNotVerified();
        // }

        // if (!$encounter) { // comes from globals.php
        //     die(xlt("Internal error: we do not seem to be in an encounter!"));
        // }

        // $formid = (int) (isset($_GET['id']) ? $_GET['id'] : '');
        // //  print_r($id); exit;
        // $instruction = $_POST["instruction"];
        // //print_r($instruction); exit;

        // if ($formid) {
        //     //         $newid = sqlInsert(
        //     //     "INSERT INTO form_clinic_instructions (pid,encounter,user, instruction, date, activity) VALUES (?,?,?,?,?,?)",
        //     //     array($pid, $encounter, $_SESSION['authUser'], $instruction, $date, $activity)
        //     // );
        //     $newid = "INSERT INTO form_clinic_instructions( $instruction) VALUES (?)";
        //     addForm($encounter, "clinical_instructions", $newid, "clinical_instructions", $pid, $userauthorized);
            
        //     } else { // If adding a new form...
            
        //             $query= "INSERT INTO form_clinic_instructions(`pid`, `encounter`, `user`, `instruction`, `date`, `activity`) VALUES (?,?,?,?,?,?)";
        //             // print_r($query); exit;
        //             $newid = sqlInsert($query);
        //             addForm($encounter, "clinical_instructions", $newid, "clinical_instructions", $pid, $userauthorized);
        //     }
            
        // formHeader("Redirecting....");
        // formJump();
        // formFooter();

    require_once(__DIR__ . "/../../globals.php");
    require_once("$srcdir/api.inc.php");
    require_once("$srcdir/forms.inc.php");

    use OpenEMR\Common\Csrf\CsrfUtils;

    if (!CsrfUtils::verifyCsrfToken($_POST["csrf_token_form"])) {
        CsrfUtils::csrfNotVerified();
    }

    if (!$encounter || !$pid) {
        die(xlt("Internal error: Encounter or patient ID is missing!"));
    }

    $formid = (int) ($_GET['id'] ?? 0);
    $instruction = trim($_POST["instruction"] ?? '');
    $instruction = preg_replace('/[\x00-\x1F\x7F]/u', '', $instruction);
    $instruction = mb_convert_encoding($instruction, 'UTF-8', 'UTF-8');

    $date = date('Y-m-d H:i:s');
    $activity = '1'; 
    $user = $_SESSION['authUser'];

    if ($formid) {
        // UPDATE existing record
        $query = "UPDATE form_clinical_instructions SET `instruction` = ?, `date` = ?, `activity` = ? WHERE `id` = ?";
        sqlStatement($query, [$instruction, $date, $activity, $formid]);    
        
    } else {
        // INSERT new record
        $query = "INSERT INTO form_clinical_instructions (`pid`, `encounter`, `user`, `instruction`, `date`, `activity`) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $newid = sqlInsert($query, [$pid, $encounter, $user, $instruction, $date, $activity]);
        addForm($encounter, "clinical_instructions", $newid, "clinical_instructions", $pid, $user);
    }

    formHeader("Redirecting...");
    formJump();
    formFooter();
    exit;

