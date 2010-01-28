<?php
define('ECOM_DIR', '/var/www/localhost/smarty/ecom/');
define('SMARTY_DIR', '/usr/local/lib/php/smarty/');
require(SMARTY_DIR . 'Smarty.class.php');
include(ECOM_DIR . 'libs/config.php');

$HTTPTitle = (empty($_GET['p'])) ? 'Home' : $_GET['p'];
$Page = new Controller($HTTPTitle);
$Page->Output();
?>
