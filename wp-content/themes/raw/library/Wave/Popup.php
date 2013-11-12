<?php

class Wave_Popup {

	private static $list = array();

	public static function activate_popup($pop_id) {

		if (isset(self::$list[$pop_id])) {
			return;
		}

		$popup = array(
			'id'             => 'cta-popup-' . mt_rand(),
			'width'          => get_post_meta($pop_id, "cta_popup_width", true),
			'header_text'    => get_post_meta($pop_id, "cta_popup_header_text", true),
			'header_subtext' => get_post_meta($pop_id, "cta_popup_header_subtext", true),
			'form'           => get_post_meta($pop_id, "cta_popup_form", true)
		);

		$html = '';
		$html .= '<div id="' . $popup['form'] . '" class="popup">';
		$html .= '<div class="popup-content-wrapper" data-popup-width="' . (empty($popup['width']) ? 500 : $popup['width']) . '">';
		$html .= '<header class="popup-header">';
		$html .= '<h2>' . $popup['header_text'] . '</h2>';
		$html .= '<span class="sub">' . $popup['header_subtext'] . '</span>';
		$html .= '<a class="close-button" href="#close"><i class="icon-remove"></i></a>';
		$html .= '</header>';
		$html .= '<div class="popup-content">';
		$html .= wave_build_form($popup['form']);
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';

		self::$list[$pop_id] = $html;

	}

	public static function print_popups() {

		echo join("", self::$list);

	}

}