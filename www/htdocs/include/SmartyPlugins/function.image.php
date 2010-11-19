<?
function smarty_function_image($params, &$smarty) {
	echo $params['name'];
	$image = new Image($params['name'], $params['alt']);
	return '<img src="'.$image->getPath($params['height'], $params['width']).'" alt="'.$params['alt'].'" />';
}
?>