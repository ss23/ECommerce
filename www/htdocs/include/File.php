<?
class File {
	public $path;
	public $size;
	public $modified;
	public $accessed;
	public $name;
	
	function __construct($name) {
		$this->name = $name;
		$this->path = PATH."htdocs/assets/$name";
		if (!file_exists($this->path)) {
			throw new ECommerceException('Could not load file '.PATH.'htdocs/assets/'.$name);
			return false;
		}
		$stats = stat($this->path);
		$this->modified = $stats['mtime'];
		$this->accessed = $stats['atime'];
		$this->size = $stats['size'];	
	}
}