<?
class MyPDO extends PDO {
    public function __construct() {
        $dns = $GLOBALS['config']['database']['driver'].':host='.$GLOBALS['config']['database']['host'].
        ((!empty($GLOBALS['config']['database']['port'])) ? (';port=' . $GLOBALS['config']['database']['port']) : '').
        ';dbname=' . $GLOBALS['config']['database']['schema'];
       
        return parent::__construct($dns, $GLOBALS['config']['database']['username'], $GLOBALS['config']['database']['password']);
    }
	
	public function prepare($sql, $driveropts = FALSE) {
		$hash = hash('sha1', $sql.$driveropts);
		if (isset($GLOBALS['stmt'][$hash])) {
			return $GLOBALS['stmt'][$hash];
		} else {
			if ($driveropts) {
				return $GLOBALS['stmt'][$hash] = parent::prepare($sql, $driveropts);
			} else {
				return $GLOBALS['stmt'][$hash] = parent::prepare($sql);
			}
		}
	}
}
