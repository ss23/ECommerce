<?
function smarty_function_planslist($params, &$smarty) {
	global $pdo;
	$stmt = $pdo->prepare("SELECT * from `plans` LIMIT :offset , :limit");
	$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
	$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
	$limit = (isset($params['limit'])) ? $params['limit'] : '5';
	$offset = (isset($params['offset'])) ? $params['offset'] : '0';
	settype($limit, 'int');
	settype($offset, 'int');
	$stmt->execute();
	$smarty->assign('plans', $stmt->fetchAll(PDO::FETCH_ASSOC));
	$smarty->display('planslist.tpl');
}
?>
