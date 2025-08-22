<?php

/**
 * Patient disclosures main screen.
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    Visolve <vicareplus_engg@visolve.com>
 * @author    Brady Miller <brady.g.miller@gmail.com>
 * @copyright Copyright (c) Visolve <vicareplus_engg@visolve.com>
 * @copyright Copyright (c) 2018 Brady Miller <brady.g.miller@gmail.com>
 * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3
 */

require_once("../../globals.php");
require_once("$srcdir/options.inc.php");

use OpenEMR\Common\Acl\AclMain;
use OpenEMR\Common\Csrf\CsrfUtils;
use OpenEMR\Common\Logging\EventAuditLogger;
use OpenEMR\Common\Twig\TwigContainer;
use OpenEMR\Core\Header;

// Control access
if (!AclMain::aclCheckCore('patients', 'report')) {
    echo (new TwigContainer(null, $GLOBALS['kernel']))->getTwig()->render('core/unauthorized.html.twig', ['pageTitle' => xl("Patient Report")]);
    exit;
}
$authWrite = AclMain::aclCheckCore('patients', 'report', '', 'write');
$authAddonly = AclMain::aclCheckCore('patients', 'report', '', 'addonly');

?>
<html>
<head>

    <?php Header::setupHeader(['common']); ?>

</head>

<body>
    <h2 class="title">
                <?php echo xlt('Patient Report'); ?>
    </h2>
<?php
echo "testing111";
?>
</body>
</html>


