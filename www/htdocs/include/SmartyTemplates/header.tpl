<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
	<meta name="description" content="description"/>
	<meta name="keywords" content="keywords"/>
	<meta name="author" content="author"/>
	<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" media="screen"/>
	<title>{$title} | ECommerce</title>
</head>
<body>
{if $user}
<h4>You are logged in as {$user->username} <a href="/logout.php">Logout</a></h4>
{/if}
