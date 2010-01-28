<?php
class PageController {
	var $Smarty;

	function __construct() {
		$this->Smarty = new EcomSmarty;
		$this->Smarty->assign('title', 'Error');
	}
	function Output() {
		$this->Smarty->display('Page.tpl');
	}
}
