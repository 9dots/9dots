<?php

class Wave_Fonts {

	private static $list = array();

	public static function add_font($name, $type, $css, $variations) {
		self::$list[] = array(
			'name'       => $name,
			'type'       => $type,
			'css'        => $css,
			'variations' => explode(',', $variations)
		);
	}

	public static function isType($fontName, $type) {
		$fontName = current(explode('-', $fontName));

		foreach (self::$list as $font) {
			if ($font['name'] == $fontName) {
				return $type == $font['type'];
			}
		}

		return false;
	}

	public static function getFonts() {

		$list = array();

		foreach(self::$list as $font){
			$list[$font['name']] = $font;
		}

		ksort($list);

		return array_values($list);
	}

}
