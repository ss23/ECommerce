<?
function smarty_function_image($params, &$smarty) {
	$image = new Image($params['name'], $params['alt']);
	$image->getPath($params['height'], $params['width']);
	print_r($image);
}
?>