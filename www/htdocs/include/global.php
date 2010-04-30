<?
// Get the PATH define value
if (!$settings = parse_ini_file("../config/config.ini", TRUE)) throw new exception('Unable to open configuration file.');
define('PATH', $settings['app']['path']);
// Include the custom exception class
require PATH."htdocs/include/exception.php";
// Custom Functions (Misc)
require PATH."htdocs/include/functions.php";
// Include Smarty
require PATH."htdocs/include/Smarty/Smarty.class.php";
// Smarty Configuration
$GLOBALS['smarty'] = new Smarty();
$smarty->template_dir = PATH."htdocs/include/SmartyTemplates";
$smarty->compile_dir = PATH."write/templates_c";
$smarty->cache_dir = PATH."write/cache";
$smarty->config_dir = PATH."config";
$smarty->plugins_dir[] = PATH."htdocs/include/SmartyPlugins";

// Database stuff
require PATH."htdocs/include/MyPDO.php";
$GLOBALS['pdo'] = new MyPDO();

// Custom Classes
require PATH."htdocs/include/File.php";
require PATH."htdocs/include/Image.php";
?>