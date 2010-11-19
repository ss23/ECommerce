<?
class Image extends File {
	public $width;
	public $height;
	public $ratio;
	public $mime;
	public $bits;
	public $channels;
	public $alt;
	private $gd;
	
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
	}
	
	function getPath($height, $width, $web = true) {
		echo $height;
		echo $width;
		if (!is_numeric($height))
			$height = 0;
		if (!is_numeric($width))
			$width = 0;
		if ((($width == 0) && ($height == 0)) || ($width == $this->width) && ($height == $this->height))
			return realToWeb($this->path);
		// Format is assets/images/height/name.ext. We don't need to worry about width, because they will always be in the original ratio.
		$path = PATH."htdocs/assets/images/$height/";
		if (file_exists($path.basename($this->path))) {
			return realToWeb($path.basename($this->path));
		} else if (!file_exists($path)) {
			if (!mkdir($path)) {
				throw new ECommerceException("Not the correct permissions to write to $path");
				return false;			
			}
		}
		$path .= basename($this->path);
		$newImage = $this->resizeRatio($width, $height);
		if ($this->mime == "image/jpeg") {
			imagejpeg($newImage, $path);
		} else if ($this->mime == "image/png") {
			imagepng($newImage, $path);
		} else if ($this->mime == "image/gif") {
			imagegif($newImage, $path);
		} else {
			throw new ECommerceException("Unsupported image type");
			return false;
		}
		return realToWeb($path);
	}
	
	function resizeRatio($maxWidth, $maxHeight, $useAsMinimum = false ) {
		if ($this->mime == "image/jpeg") {
			$this->gd = imagecreatefromjpeg($this->path);
		} else if ($this->mime == "image/png") {
			$this->gd = imagecreatefrompng($this->path);
		} else if ($this->mime == "image/gif") {
			$this->gd = imagecreatefromgif($this->path);
		} else {
			throw new ECommerceException("Unsupported image type");
			return false;
		}
		$widthRatio = $maxWidth / $this->width;
		$heightRatio = $maxHeight / $this->height;
		
		if( $widthRatio < $heightRatio )
			return $this->resizeByWidth($maxWidth);
		else
			return $this->resizeByHeight($maxHeight);
	}

	function resizeByWidth($width) {
		$heightScale = $width / $this->width;
		return $this->resize($width, $heightScale * $this->height);
	}
	
	function resizeByHeight($height) {
		$scale = $height / $this->height;
		return $this->resize($scale * $this->width, $height);
	}
	
	function resize($width, $height) {
		$width = round($width);
		$height = round($height);

		$newImage = imagecreatetruecolor($width, $height);
		
		imagealphablending($newImage, false);
		imagesavealpha($newImage, true);

		imagecopyresampled($newImage, $this->gd, 0, 0, 0, 0, $width, $height, $this->width, $this->height);

		return $newImage;
	}

}