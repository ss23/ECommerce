<?php

function __autoload($Class) {
	if (fnmatch("*Controller", $Class)) {
		if (file_exists(ECOM_DIR."libs/controllers/".$Class.".php")) {
			require_once ECOM_DIR."libs/controllers/".$Class.".php";
			return;
		}
		// TODO Sexy error stuff
	}
	if (file_exists($Class.".php")) {
		require_once $Class.".php";
	} else {
		return false;
	}
	// TODO Other sexy error stuff here too :P
}

class EcomSmarty extends Smarty {
	function EcomSmarty() {
		$this->template_dir = ECOM_DIR . 'templates';
		$this->compile_dir = ECOM_DIR . 'templates_c';
		$this->config_dir = ECOM_DIR . 'configs';
		$this->cache_dir = ECOM_DIR . 'cache';
	}
}

class Controller {
	// TODO Make this controller system snap into mod_rewrite
	// TODO Sexy backtrace system so I can make error checking easy
	// TODO All of the error stuff
	
	var $Controller;
	var $Buffer;
	var $Smarty;

	function __construct($HTTPTitle) {
		// TODO I'm sure this can be done without $temp...
		$temp = $HTTPTitle . "Controller";

		if (class_exists($temp)) {
			$this->Controller = new $temp;
		} else {
			$this->Controller = new ErrorController;
		}
		unset($temp);
	}

	function Output() {
		$this->Controller->Output();
	}
}
function mysqli_init2() {
	$temp = new mysqli('localhost', 'ecommerce', 'PKMy4teLqyrhu8tD', 'ecommerce');
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	        exit();
		}

return $temp;
}

?>
