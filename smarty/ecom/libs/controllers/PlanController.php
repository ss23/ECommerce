<?php
class HomeController extends MainController {
        var $mysqli;

	function __construct() {
		parent::__construct();
		$this->Smarty->assign('title', 'Home');
	}
	function Output() {
		$this->GetPlans();
		$this->Smarty->display('Home.tpl');
	}
}
?>
