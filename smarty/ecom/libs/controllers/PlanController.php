<?php
class PlanController extends MainController {
        var $mysqli;
	var $plan; // TODO: Make this an object instead, because we all know objects are winner

	function __construct() {
		parent::__construct();
		$this->GetPlan($_GET['plan']);
		print_r($this->plan);
		$this->Smarty->assign('title', 'Plans - '.$this->plan['name']);
	}
	function Output() {
		$this->GetPlans();
		$this->Smarty->display('Plan.tpl');
	}
	function GetPlan($UUID) {
		if (!($this->mysqli)) {
			$this->mysqli = mysqli_init2();
		}
		// zomg too long, but to create an alias to mysql_real_escape_string, globalize mysqli and do it that way, or to do a mysqli::prepare... Decisions decisions
		$UUID = $this->mysqli->real_escape_string($UUID);
		
		$result = $this->mysqli->query("select * from `plans` where `plans`.`uuid` LIKE '".$UUID."'");
		$this->plan = $result->fetch_assoc();
		$result->close();
	}
}
?>
