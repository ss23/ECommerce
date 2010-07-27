<?php
DEFINE('SECURE', true);

require "include/global.php";

if (isset($_POST['submit'])) {
	// Oh the joy of manual form validation
	$errors = false;
	// First, check all compulsary fields aren't blank
	if (empty($_POST['username'])) {
		$errors[] = 'You must fill in a username';
	}

	if (empty($_POST['password'])) {
		$errors[] = 'Please enter a password';
	}

	if (!$errors) {
		// More validation, but no point if anything is empty
		lib('User');

		if (user_authenticate($_POST['username'], $_POST['password'])) {
			header('Location: /account.php');
			die(); // Just in case?
		} else {
			$errors[] = 'Invalid username or password. Please try again';
		}
	}
	$smarty->assign('errors', $errors);
}

$smarty->display('login.tpl');
?>

