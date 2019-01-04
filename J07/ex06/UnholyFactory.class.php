<?php

class UnholyFactory {

	private $types = [];
	public function absorb($guy) {
		if (!($guy instanceof Fighter)) {
			echo '(Factory can\'t absorb this, it\'s not a fighter)'.PHP_EOL;
			return false;
		}
		if (isset($this->types[$guy->getType()])) {
            echo "(Factory already absorbed a fighter of type {$guy->getType()})" . PHP_EOL;
			return false;
		}
		echo "(Factory absorbed a fighter of type {$guy->getType()})" . PHP_EOL;
        $this->types[$guy->getType()] = $guy;
        return true;
	}

	public function fabricate($type) {
		if (!isset($this->types[$type])) {
			echo "(Factory hasn't absorbed any fighter of type $type)" . PHP_EOL;
            return false;
		}
		echo "(Factory fabricates a fighter of type $type)" . PHP_EOL;
        return $this->types[$type];
	}
}

?>