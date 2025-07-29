<?php

/**
 * clinic_note report.php
 *
 * @package   OpenEMR
 * @link      https://www.open-emr.org
 * @author    Rod Roark <rod@sunsetsystems.com>
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) 2005 Rod Roark <rod@sunsetsystems.com>
 * @copyright Copyright (c) 2021 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

require_once("../../globals.php");
require_once($GLOBALS["srcdir"] . "/api.inc.php");

function form_medication_report($pid, $encounter, $cols, $id)
{
    
    $count = 0;
    $data = formFetch("form_medication", $id);
    if ($data) {
       
    }
}
