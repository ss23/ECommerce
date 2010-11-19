<?
// Get the PATH define value
if (!$GLOBALS['config'] = parse_ini_file('../config/config.ini', TRUE)) {
	throw new ECommerceException('Unable to open configuration file');
}
define('PATH', $GLOBALS['config']['app']['path']);
// Include the files to detect if we're in debug mode
require PATH.'htdocs/include/debug.php';
// Include the custom exception class along with handler
require PATH.'htdocs/include/exception.php';
// Custom Functions (Misc)
require PATH.'htdocs/include/functions.php';
// Include Smarty
require PATH.'htdocs/include/Smarty/Smarty.class.php';
// Smarty Configuration
$GLOBALS['smarty'] = new Smarty();
$smarty->template_dir = PATH.'htdocs/include/SmartyTemplates';
$smarty->compile_dir = PATH.'write/templates_c';
$smarty->cache_dir = PATH.'write/cache';
$smarty->config_dir = PATH.'config';
$smarty->plugins_dir[] = PATH.'htdocs/include/SmartyTemplates';

// Database stuff
require PATH.'htdocs/include/MyPDO.php';
$GLOBALS['pdo'] = new MyPDO();

// The library (lib) function
function lib($Library) {
	if (file_exists(PATH."htdocs/include/$Library.php")) {
		require_once PATH."htdocs/include/$Library.php";
		return;
	}
	if (file_exists(PATH."htdocs/include/functions/$Library.php")) {
		require_once PATH."htdocs/include/functions/$Library.php";
		return;
	}
	throw new Exception('Could not load library '.$Library);
}

// Custom Classes
lib('File');
lib('Image');
lib('User');

// User Authentication and sessions
require PATH.'htdocs/include/Sessions.php';

?>
