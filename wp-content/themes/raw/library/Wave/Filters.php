<?php

class Wave_Filters {
	private static $registeredWidgets;

	public static function postsLinkAttributes() {
		return 'class="button plain"';
	}

	public static function title($title, $sep) {
		global $paged, $page;

		if (is_feed()) {
			return $title;
		}

		$title .= get_bloginfo('name');

		$site_description = get_bloginfo('description', 'display');

		if ($site_description && (is_home() || is_front_page())) {
			$title = "$title $sep $site_description";
		}

		if ($paged >= 2 && is_numeric($page)) {
			$title = "{$title} {$sep} " . sprintf(__('Page %s', WAVE_TEXT_DOMAIN), max($paged, $page));
		}

		return $title;
	}

	public static function widgetFirstLastClasses($params) {
		$id = $params[0]['id'];

		$widgets = wp_get_sidebars_widgets();

		if (!self::$registeredWidgets) {
			self::$registeredWidgets = array();
		}

		if (!isset($widgets[$id]) || !is_array($widgets[$id])) {
			return $params;
		}

		if (isset(self::$registeredWidgets[$id])) {
			self::$registeredWidgets[$id]++;
		} else {
			self::$registeredWidgets[$id] = 1;
		}

		$class = 'class="widget-' . self::$registeredWidgets[$id] . ' ';

		if (self::$registeredWidgets[$id] == 1) {
			$class .= 'widget-first first ';
		} elseif (self::$registeredWidgets[$id] == count($widgets[$id])) {
			$class .= 'widget-last last ';
		}

		$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);

		return $params;
	}
}
