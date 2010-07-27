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

	if (empty($_POST['email'])) {
		$errors[] = 'Please enter an email';
	}

	if (!$errors) {
		// More validation, but no point if anything is empty
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'Please enter a valid email';
		}

		lib('User');

		if (user_exists($_POST['username'])) {
			$errors[] = 'That username is already taken. Please try again';
		}

		if (user_email_exists($_POST['email'])) {
			$errors[] = 'That email is already taken. Please try again';
		}

		if (strlen($_POST['password']) < 4) {
			$errors[] = 'Please enter a longer password';
		}

	}

	if (!$errors) {
		if (user_create($_POST['username'], $_POST['password'], $_POST['email'])) {
			user_force_authenticate($_POST['username']);
			$smarty->display('registration_complete.tpl');
			die(); // All complete!
		} else {
			$errors[] = 'Unknown error. Please try again';
		}
	}

	$smarty->assign('errors', $errors);
}




// Populate the countries
$stmt = $pdo->prepare('
	SELECT `code`, `name`
	FROM `countries`');
$stmt->execute();
$smarty->assign('countries', $stmt->fetchAll());


$smarty->display('register.tpl');
?>

