<?

function realToWeb($path) { // Not really sure if this is the best way to do this, but it works for now
	return substr($path, strlen(PATH.'htdocs/'));
}

?>