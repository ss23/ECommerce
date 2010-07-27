<?php

function user_exists($User) {
	global $pdo;

	$stmt = $pdo->prepare('
		SELECT count(*)
		FROM `users`
		WHERE `username` = :username');
	$stmt->bindParam(':username', $User);
	$stmt->execute();
	
	return ($stmt->fetchColumn() > 0);
}

function user_email_exists($Email) {
        global $pdo;

        $stmt = $pdo->prepare('
                SELECT count(*)
                FROM `user_profiles`
                WHERE `email` = :email');
        $stmt->bindParam(':email', $Email);
        $stmt->execute();

        return ($stmt->fetchColumn() > 0);
}

function user_create($Username, $Password, $Email) {
	lib('Passwords');
	global $pdo;

	if (user_exists($Username)) {
		return false;
	}

	if (user_email_exists($Email)) {
		return false;
	}

	$stmt = $pdo->prepare('
		INSERT INTO `users`
		(
			`uuid`
			, `username`
			, `password`
		) VALUES (
			uuid()
			, :username
			, :password
		)');
	$stmt->bindValue(':username', $Username);
	$stmt->bindValue(':password', password_hash($Password));
	$stmt->execute();
	$stmt->closeCursor();
	return true;
}

function user_authenticate($Username, $Password) {
	lib('Passwords');

	global $pdo;

	$stmt = $pdo->prepare('
		SELECT `password`
		FROM `users`
		WHERE `username` = :username
	');
	$stmt->bindValue(':username', $Username);
	$stmt->execute();

	if (!$row = $stmt->fetch()) {
		return false;
	}

	if (password_check($Password, $row['password'])) {
		$GLOBALS['user'] = new User($Username);
		return true;
	} else {
		return false;
	}
}

function user_force_authenticate($Username) {
	if ($User =  new User($Username)) {
		$GLOBALS['user'] = $User;
	} else {
		return false;
	}
}

function user_logout() {
	unset($GLOBALS['user']);
	unset($_SESSION['user']);
	global $smarty;
	$smarty->assign('user', false);
}

class User {
	public $uuid;
	public $username;
	public $disabled;
	
	function __construct($Username) {
		if (!user_exists($Username)) {
			return false;
		}
		$this->username = $Username;
		$this->rehash();
		$_SESSION['user'] = $Username;
	}

	function rehash() {
		global $pdo;
		
		$stmt = $pdo->prepare('
			SELECT `uuid`, `disabled`, `username`
			FROM `users`
			WHERE 
				`username` = :username
		');
		$stmt->bindParam(':username', $this->username); 
		$stmt->setFetchMode(PDO::FETCH_INTO, $this);
		$stmt->execute();

		// Assign the (perhaps) updated user to smarty
		global $smarty;
		$smarty->assign('user', $this);
	}
}

?>
