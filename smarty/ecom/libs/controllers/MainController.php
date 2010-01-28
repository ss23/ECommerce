<?php
class MainController extends PageController {
	var $mysqli;

	function __construct() {
		parent::__construct();
		$this->Smarty->assign('title', 'Error');
	}
	function Output() {
		$this->Smarty->display('Error.tpl');
	}
	function GetPlans() {
		if (!($this->mysqli)) {
 			$this->mysqli = mysqli_init2();
		}
		$plans = $this->mysqli->query("select * from `plans`");
		// I'm also sure there's a better way to do this, but what the heck :/
		while($plan = $plans->fetch_array(MYSQLI_ASSOC)) {
			$plan_list[] = $plan;
		}
		$this->Smarty->assign('plans', $plan_list);
	}

}
?>
