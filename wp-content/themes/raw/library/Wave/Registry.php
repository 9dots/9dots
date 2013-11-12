<?php

class Wave_Registry {

	private static $data = array();

	public static function set($key, $value) {

		self::$data[$key] = $value;

	}

	public static function get($key) {

		if (isset(self::$data[$key])) {
			return self::$data[$key];
		}

		return null;
	}

}