<?php
// Salts are 12 characters long

function password_hash($Password) {
	$salt = substr(md5(uniqid(rand(), true)), 0, 12);
	return $salt . hash('sha256', $salt . $Password);
}

function password_check($Password, $Hashed) {
	$salt = substr($Hashed, 0, 12);
	return (($salt . hash('sha256', $salt . $Password)) == $Hashed);
}

?>
