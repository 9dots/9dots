<?php

class Wave_Js {

	private static $params = array();

	public static function set($key, $value) {
		self::$params[$key] = $value;
	}

	public static function get($key) {
		return self::$params[$key];
	}

	public static function printOutput() {
		$html = '<script>' . PHP_EOL;
		$html .= 'Polar.vars = ' . json_encode(self::$params) . ';' . PHP_EOL;
		$html .= '</script>' . PHP_EOL;
		echo $html;
	}

}
