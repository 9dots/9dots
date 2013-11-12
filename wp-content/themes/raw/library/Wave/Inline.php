<?php

class Wave_Inline {

	private $ueid;
	private $selector;

	public function __construct($prefix = '#') {
		$this->ueid     = wave_ueid();
		$this->selector = $prefix . $this->ueid;
	}

	public function css($key, $value) {
		Wave_Dynamic::css($this->selector, $key, $value);
	}

	public function ueid() {
		echo $this->ueid;
	}

	public function get_ueid() {
		return $this->ueid;
	}

	public function get_style_attribute() {

	}

}