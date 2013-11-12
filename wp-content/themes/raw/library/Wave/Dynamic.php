<?php

class Wave_Dynamic {

	private static $js = array();
	private static $css = array();

	public static function css($selector, $key, $value = null) {
		if (is_array($key) && is_null($value)) {
			$list = $key;
			foreach ($list as $key => $value) {
				self::css($selector, $key, $value);
			}
		} elseif (!empty($key) || !is_null($value)) {
			self::$css[$selector][$key] = $value;
		}
	}

	public static function print_css() {
		foreach (self::$css as $selector => $styles) {
			echo $selector . '{';
			foreach ($styles as $property => $value) {
				echo $property . ': ' . $value . ';';
			}
			echo '}';
		}
	}

	public static function js($key, $value = null) {
		if (is_array($key) && is_null($value)) {
			$list = $key;
			foreach ($list as $key => $value) {
				self::js($key, $value);
			}
		} elseif (!empty($key) || !is_null($value)) {
			self::$js[$key] = $value;
		}
	}

	public static function print_js() {
		echo join(PHP_EOL, self::$js);
	}

}