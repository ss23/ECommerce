<?php


// Someone should rewrite all of my session handling for me. Or I'll find a better way to do it and write it myself
// I'm so sure this is a horribly wrong way of doing it, too many queries!

lib('UUID'); // We need this to generate a fake UUID that will be like a MySQL UUID

session_start();

global $pdo;

if (isset($_SESSION['uuid'])) {
	$stmt = $pdo->prepare('
		SELECT `uuid`, UNIX_TIMESTAMP(`last_active`) as last_active, INET_NTOA(`ip`) as ip
		FROM `sessions`
		WHERE `uuid` = :uuid
	');
	$stmt->bindParam(':uuid', $_SESSION['uuid']);
	$stmt->execute();

	$row = $stmt->fetch();
	$stmt->closeCursor();

	if (!$row['ip'] == $_SERVER['REMOTE_ADDR']) {
		// Looks like the IP changed in the middle of a session...
		// We should log out the user, and update the session IP
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
	} else {
		if (isset($_SESSION['user'])) {
			$GLOBALS['user'] = new User($_SESSION['user']);
		}
	}
	$stmt = $pdo->prepare('
		REPLACE INTO `sessions`
		(
			`uuid`, `ip`, `last_active`
		) VALUES (
			:uuid, INET_ATON(:ip), now()
		)	
	');
	$stmt->bindParam(':uuid', $_SESSION['uuid']);
	$stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
	$stmt->execute();

	// And that should finish up for when a session is already made

} else {
	$uuid = uuid_generate();
	$stmt = $pdo->prepare('
		INSERT INTO `sessions`
		(
			`uuid`, `ip`, `last_active`
		) VALUES (
			:uuid, INET_ATON(:ip), now()
		)
	');
	$stmt->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
	$stmt->bindParam(':uuid', $uuid);
	$stmt->execute();
	$_SESSION['uuid'] = $uuid; 
}

?>
