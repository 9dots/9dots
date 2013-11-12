<?php

class Wave_RegEx {

	public static function get($pattern, $str) {
		preg_match($pattern, $str, $matches);

		return isset($matches[1]) ? $matches[1] : false;
	}

	public static function get_all($pattern, $str) {
		preg_match_all($pattern, $str, $matches);

		return isset($matches[1]) ? $matches : false;
	}

	public static function match($pattern, $str) {
		preg_match($pattern, $str, $matches);

		return isset($matches[0]) ? true : false;
	}

	public static function get_list($pattern, $str) {
		preg_match_all($pattern, $str, $matches);

		return isset($matches[1]) ? $matches[1] : false;
	}

	public static function get_row($pattern, $str) {
		preg_match($pattern, $str, $matches);
		unset($matches[0]);
		$matches = array_values($matches);
		return isset($matches[0]) ? $matches : false;
	}

	public static function replace($pattern, $replace, $str) {
		return preg_replace($pattern, $replace, $str);
	}

	public static function remove($pattern, $str) {
		return self::replace($pattern, "", $str);
	}

}