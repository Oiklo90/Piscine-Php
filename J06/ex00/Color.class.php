<?php
class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	static $verbose = false;

	function __construct($color) {
		if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) {
			$this->red = intval($color['red']);
			$this->blue = intval($color['blue']);
			$this->green = intval($color['green']);
		}
		else if (isset($color['rgb'])) {
			$red = $color['rgb'] & 0xFF;
			$green = ($color['rgb'] & 0x00FF) >> 8;
			$blue = ($color['rgb'] & 0x000FF) >> 16;
		}
		if (Self::$verbose)
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function __destruct() {
		if (Self::$verbose)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	
	public function add($colorinst) {
		return new Color(array('red' => $this->red + $colorinst->red, 'green' => $this->green + $colorinst->green, 'blue' => $this->blue + $colorinst->blue));
	}
	
	public function sub($colorinst) {
		return new Color(array('red' => $this->red - $colorinst->red, 'green' => $this->green - $colorinst->green, 'blue' => $this->blue - $colorinst->blue));
		
	}
	
	public function mult($fact) {
		return new Color(array('red' => $this->red * $fact, 'green' => $this->green * $fact, 'blue' => $this->blue * $fact));
		
	}
	
	function __toString() {
		return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
	}

	public static function doc()
	{
		$read = fopen("Color.doc.txt", 'r');
		echo "\n";
		while ($read && !feof($read))
			echo fgets($read);
		echo "\n";
	}
}
?>
