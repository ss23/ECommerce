<?
class MyPDO extends PDO {
    public function __construct() {
		// Path to the config file
		$file = PATH."config/config.ini";
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');
        
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];
        
        return parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
	
	public function prepare($sql) {
		$hash = hash('sha1', $sql);
		if (isset($GLOBALS[$hash])) {
			return $GLOBALS[$hash];
		} else {
			return $GLOBALS[$hash] = parent::prepare($sql);
		}
	}
}