<?php
class ErrorController extends PageController {
	function __construct() {
		parent::__construct();
	}
	function Output() {
		$this->Smarty->display('Error.tpl');
	}
}
?>
