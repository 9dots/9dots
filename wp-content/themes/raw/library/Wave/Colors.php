<?php

class Wave_Colors {

	private static $list = array();

	public static function get_keys() {
		return array_keys(self::$list);
	}

	public static function get_colors() {

		$output = array();

		foreach (self::$list as $key => $item) {
			if (isset($item['color'], $item['label'])) {
				$output[$item['color']][] = $item['label'];
			}
		}

		return $output;
	}

	public static function add_color($key, $color) {
		return self::$list[$key]['color'] = $color;
	}

	public static function add_label($key, $label) {
		return self::$list[$key]['label'] = $label;
	}

}
