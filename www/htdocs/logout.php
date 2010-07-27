<?
require "include/global.php";

lib('User');
user_logout();

$smarty->display('logout.tpl');
?>
