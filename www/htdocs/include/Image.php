<?
class Image extends File {
	public $width;
	public $height;
	public $ratio;
	public $mime;
	public $bits;
	public $channels;
	public $alt;
	
	function __construct($name, $alt = "") {
		if (!file_exists(PATH."htdocs/assets/$name"))
			$name = "imagenotfound.jpg";
		$this->alt = $alt;
		parent::__construct($name);
		if (!($size = getimagesize($this->path))) {
			throw new ECommerceException('Could not get the stats for $image');
			return false;
		}
		$this->width = $size[0];
		$this->height = $size[1];
		$this->ratio = ($this->width / $this->height);
		$this->bits = $size["bits"];
		$this->mime = $size["mime"];
		$this->channels = $size["channels"];
	}
	
	function getPath($height, $width) {
		if (!is_numeric($height))
			$height = 0;
		if (!is_numeric($width))
			$width = 0;
		if (($width == 0) && ($height == 0))
			return $this->path;
		if (($width / $height) < $this->ratio) {
			$ratio = $height / $this->height;
		} else {
			$ratio = $width / $this->width;
		}
		if ($ratio = 1) 
			return $this->path;
		return resizeImage($ratio);
	}
	
	function resizeImage($height, $width) {
		if ($this->mine == "image/jpeg") {
			$src_img = imagecreatefromjpeg($this->path);
		} else if ($this->mine == "image/png") {
			$src_img = imagecreatefrompng($this->path);
		} else if ($this->mine == "image/gif") {
			$src_img = imagecreatefromgif($this->path);
		} else {
			throw new ECommerceException("Unsupported image type");
			return false;
		}
		$dist_img = ImageCreateTrueColor(,$thumb_h);
	}
}