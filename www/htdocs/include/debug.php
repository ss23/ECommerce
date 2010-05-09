<?php

if (in_array($_SERVER['SERVER_NAME'], $GLOBALS['config']['app']['debug'])) {
	define('DEBUG', TRUE);
	error_reporting(-1); // All errors ahoy!
} else {
	define('DEBUG', FALSE);
	error_reporting(E_ERROR); // Only report fatal errors (This could make for dodgy code that "works", doesn't get caught, but is bad). Might change this to 3 in the future...
}
?>