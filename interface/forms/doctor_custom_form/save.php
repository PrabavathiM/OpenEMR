<?php

/**
 * Clinical instructions form save.php
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Jacob T Paul <jacob@zhservices.com>
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2015 Z&H Consultancy Services Private Limited <sam@zhservices.com>
 * @copyright Copyright (c) 2019 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

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
    $doctor_instruction = $_POST["doctor_instruction"] ?? '';
    // $doctor_instruction = preg_replace('/[\x00-\x1F\x7F]/u', '', $doctor_instruction);
    // $doctor_instruction = mb_convert_encoding($doctor_instruction, 'UTF-8', 'UTF-8');

    $date = date('Y-m-d H:i:s');
    $activity = '1'; 
    $user = $_SESSION['authUser'];

    if ($formid) {
        // UPDATE existing record
        $query = "UPDATE doctor_custom_form SET `doctor_instruction` = ?, `date` = ?, `activity` = ? WHERE `id` = ?";
        sqlStatement($query, [$doctor_instruction, $date, $activity, $formid]);    
        
    } else {
        // INSERT new record
        $query = "INSERT INTO doctor_custom_form (`pid`, `encounter`, `user`, `doctor_instruction`, `date`, `activity`) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $newid = sqlInsert($query, [$pid, $encounter, $user, $doctor_instruction, $date, $activity]);
        addForm($encounter, "Doctor Custom Form", $newid, "doctor_custom_form", $pid, $user);
    }

    formHeader("Redirecting...");
    formJump();
    formFooter();
    exit;
