<?php

// Add action for enqueueing scripts
add_action('wp_enqueue_scripts', "wave_shortcodes_enqueue_scripts", 1100);

function wave_shortcodes_enqueue_scripts() {

	// Define the root from where the the files should be loaded from
	$plugin_url = plugins_url(dirname(dirname(plugin_basename(__FILE__))));

	// Register all scripts that should could be enqueued
	wp_register_script('isotope', $plugin_url . '/assets/plugins/isotope/jquery.isotope.min.js', 'jquery', '1.0', true);
	wp_register_script('countto', $plugin_url . '/assets/plugins/countto/jquery.countTo.js', 'jquery', '1.0', true);
	wp_register_script('google_maps', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en', 'jquery', '3.0', true);
	wp_register_script('gmap3', $plugin_url . '/assets/plugins/gmap3/gmap3.min.js', 'jquery', '1.0', true);
	wp_register_script('knob', $plugin_url . '/assets/plugins/knob/jquery.knob.js', 'jquery', '1.0', true);
	wp_register_script('wave-shortcodes', $plugin_url . '/assets/js/shortcodes.js', 'jquery', time(), true);

	// Enqueue scripts
	wp_enqueue_script('countto');
	wp_enqueue_script('google_maps');
	wp_enqueue_script('gmap3');
	wp_enqueue_script('knob');
	wp_enqueue_script('isotope');
	wp_enqueue_script('wave-shortcodes');


}

// Register shortcodes with WordPress
add_shortcode('icon_box', 'wave_shortcode_icon_box');
add_shortcode('clients', 'wave_shortcode_clients');
add_shortcode('client', 'wave_shortcode_client');
add_shortcode('person', 'wave_shortcode_person');
add_shortcode('facebook_like', 'wave_shortcode_facebook_like');
add_shortcode('title', 'wave_shortcode_title');
add_shortcode('blog', 'wave_shortcode_blog');
add_shortcode('dropcap', 'wave_shortcode_dropcap');
add_shortcode('highlight', 'wave_shortcode_highlight');
add_shortcode('separator', 'wave_shortcode_separator');
add_shortcode('button', 'wave_shortcode_button');
add_shortcode('icon', 'wave_shortcode_icon');
add_shortcode('alert_error', 'wave_shortcode_alert_error');
add_shortcode('alert_success', 'wave_shortcode_alert_success');
add_shortcode('alert_info', 'wave_shortcode_alert_info');
add_shortcode('alert_notice', 'wave_shortcode_alert_notice');
add_shortcode('bar_graph', 'wave_shortcode_bar_graph');
add_shortcode('bar', 'wave_shortcode_bar');
add_shortcode('map', 'wave_shortcode_map');
add_shortcode('spacer', 'wave_shortcode_spacer');
add_shortcode('image', 'wave_shortcode_image');
add_shortcode('testimonial_slider', 'wave_shortcode_testimonial_slider');
add_shortcode('testimonial', 'wave_shortcode_testimonial');
add_shortcode('light', 'wave_shortcode_light');
add_shortcode('callout_box', 'wave_shortcode_callout_box');
add_shortcode('vimeo', 'wave_shortcode_vimeo');
add_shortcode('youtube', 'wave_shortcode_youtube');
add_shortcode('soundcloud', 'wave_shortcode_soundcloud');
add_shortcode('pricing_table', 'wave_shortcode_pricing_table');
add_shortcode('pricing_column', 'wave_shortcode_pricing_column');
add_shortcode('full_width_section', 'wave_shortcode_full_width_section');
add_shortcode('one_third', 'wave_shortcode_one_third');
add_shortcode('one_third_last', 'wave_shortcode_one_third_last');
add_shortcode('two_third', 'wave_shortcode_two_third');
add_shortcode('two_third_last', 'wave_shortcode_two_third_last');
add_shortcode('one_half', 'wave_shortcode_one_half');
add_shortcode('one_half_last', 'wave_shortcode_one_half_last');
add_shortcode('one_fourth', 'wave_shortcode_one_fourth');
add_shortcode('one_fourth_last', 'wave_shortcode_one_fourth_last');
add_shortcode('three_fourth', 'wave_shortcode_three_fourth');
add_shortcode('three_fourth_last', 'wave_shortcode_three_fourth_last');
add_shortcode('one_fifth', 'wave_shortcode_one_fifth');
add_shortcode('one_fifth_last', 'wave_shortcode_one_fifth_last');
add_shortcode('two_fifth', 'wave_shortcode_two_fifth');
add_shortcode('two_fifth_last', 'wave_shortcode_two_fifth_last');
add_shortcode('three_fifth', 'wave_shortcode_three_fifth');
add_shortcode('three_fifth_last', 'wave_shortcode_three_fifth_last');
add_shortcode('four_fifth', 'wave_shortcode_four_fifth');
add_shortcode('four_fifth_last', 'wave_shortcode_four_fifth_last');
add_shortcode('four_fifth', 'wave_shortcode_four_fifth');
add_shortcode('four_fifth_last', 'wave_shortcode_four_fifth_last');
add_shortcode('one_sixth', 'wave_shortcode_one_sixth');
add_shortcode('one_sixth_last', 'wave_shortcode_one_sixth_last');
add_shortcode('five_sixth', 'wave_shortcode_five_sixth');
add_shortcode('five_sixth_last', 'wave_shortcode_five_sixth_last');
add_shortcode('counters_circle', 'wave_shortcode_counters_circle');
add_shortcode('counter_circle', 'wave_shortcode_counter_circle');
add_shortcode('counters', 'wave_shortcode_counters');
add_shortcode('counter', 'wave_shortcode_counter');
add_shortcode('accordion', 'wave_shortcode_accordion');
add_shortcode('toggles', 'wave_shortcode_toggles');
add_shortcode('toggle', 'wave_shortcode_toggle');
add_shortcode('tabs', 'wave_shortcode_tabs_left');
add_shortcode('vertical_tabs', 'wave_shortcode_vertical_tabs');
add_shortcode('tabs_left', 'wave_shortcode_tabs_left');
add_shortcode('tabs_right', 'wave_shortcode_tabs_right');
add_shortcode('subject_tabs', 'wave_shortcode_subject_tabs_left');
add_shortcode('subject_tabs_left', 'wave_shortcode_subject_tabs_left');
add_shortcode('subject_tabs_right', 'wave_shortcode_subject_tabs_right');
add_shortcode('tabs_right', 'wave_shortcode_tabs_right');
add_shortcode('tab', 'wave_shortcode_tab');
add_shortcode('tab_left', 'wave_shortcode_tab');
add_shortcode('tab_right', 'wave_shortcode_tab');
add_shortcode('list', 'wave_shortcode_list');
add_shortcode('team_carousel', 'wave_shortcode_team_carousel');
add_shortcode('portfolio', 'wave_shortcode_portfolio');
add_shortcode('cta_button', 'wave_shortcode_cta_button');
add_shortcode('clear', 'wave_shortcode_clear');
add_shortcode('text_shadow', 'wave_text_shadow');


function wave_shortcode_clear($attr, $content = null) {
	return wave_clearboth(true);
}

function wave_shortcode_list($attr, $content = null) {

	$attr = shortcode_atts(array(
		'style'           => "arrows",
		'color'           => "",
		'animation'       => "",
		'animation_time'  => 500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$ueid = wave_ueid();

	if (!empty($attr['color'])) {
		Wave_Dynamic::css('#' . $ueid . ' li:before', 'color', $attr['color']);
	}

	$html = '<div id="' . $ueid . '" class="list ' . $attr['style'] . '"' . $attr_animation . '>' . $content . '</div>';

	return $html;
}


function wave_shortcode_clients($attr, $content = null) {

	$attr = shortcode_atts(array(
		'columns'             => 5,
		'carousel'            => "no",
		'carousel_delay'      => 4000,
		'carousel_transition' => 1000,
		'animation'           => "",
		'animation_time'      => 500,
		'animation_delay'     => 0
	), $attr);

	$attr_carousel            = ' data-carousel="' . ($attr['carousel'] == "yes" ? "true" : "false") . '"';
	$attr_carousel_delay      = ' data-carousel-delay="' . $attr['carousel_delay'] . '"';
	$attr_carousel_transition = ' data-carousel-transition="' . $attr['carousel_transition'] . '"';
	$attr_columns             = ' data-columns="' . $attr['columns'] . '"';

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="clients-wrapper"' . $attr_animation . '>';
	$html .= '<ul class="clients carousel"' . $attr_columns . $attr_carousel . $attr_carousel_delay . $attr_carousel_transition . '>';
	$html .= do_shortcode($content);
	$html .= '</ul>';
	$html .= '</div>';

	return $html;
}


function wave_shortcode_client($attr, $content = null) {

	$attr = shortcode_atts(array(
		'image' => null,
		'url'   => null,
		'alt'   => null
	), $attr);


	$img = '<img src="' . $attr['image'] . '" alt="" />';

	if (empty($attr['url'])) {
		$attr['url'] = 'javascript:void(0);';
	}

	$html = '<li class="client">';
	$html .= '<a href="' . $attr['url'] . '">' . $img . '</a>';
	$html .= '</li>';

	return $html;
}

function wave_shortcode_person($attr, $content = null) {

	$attr = shortcode_atts(array(
		'name'            => "Name",
		'title'           => "Title",
		'image'           => null,
		'facebook'        => null,
		'twitter'         => null,
		'google_plus'     => null,
		'linkedin'        => null,
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$social_media                = array();
	$social_media['facebook']    = $attr['facebook'];
	$social_media['google-plus'] = $attr['google_plus'];
	$social_media['twitter']     = $attr['twitter'];
	$social_media['linkedin']    = $attr['linkedin'];

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="person"' . $attr_animation . '>';
	$html .= '<div class="thumb">';
	$html .= '<div class="overlay">';
	$html .= '<div>';
	$html .= '<span>' . $attr['name'] . '</span>';
	$html .= '<ul class="socialmedia">';
	foreach ($social_media as $icon => $social_media_url) {
		if (!empty($social_media_url)) {
			$html .= '<li>';
			$html .= '<a href="' . $social_media_url . '" target="_blank">';
			$html .= '<i class="icon-' . $icon . '"></i>';
			$html .= '</a>';
			$html .= '</li>';
		}
	}
	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '<img src="' . $attr['image'] . '" alt="" />';
	$html .= '</div>';
	$html .= '<div class="name">' . $attr['name'] . '</div>';
	$html .= '<div class="title">' . $attr['title'] . '</div>';
	$html .= '<div class="description">' . do_shortcode($content) . '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_facebook_like($attr, $content = null) {

	$attr = shortcode_atts(array(
		'href'        => "",
		'width'       => "450",
		'height'      => "35",
		'colorscheme' => "light",
		'layout'      => "standard",
		'show_faces'  => "no"
	), $attr);

	$vars                = array();
	$vars['width']       = $attr['width'];
	$vars['height']      = $attr['height'];
	$vars['href']        = $attr['href'];
	$vars['colorscheme'] = $attr['colorscheme'];
	$vars['layout']      = $attr['layout'];
	$vars['action']      = "like";
	$vars['show_faces']  = ($attr['show_faces'] == "yes" ? "true" : "false");
	$vars['send']        = "false";
	$vars['appId']       = "201777023331722";

	$query = htmlentities(http_build_query($vars));

	$src = '//www.facebook.com/plugins/like.php?' . $query;

	$html = '<iframe src="' . $src . '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:' . $attr['width'] . 'px; height:' . $attr['height'] . 'px;" allowTransparency="true"></iframe>';

	return $html;

}


function wave_shortcode_callout_box($attr, $content = null) {

	$attr = shortcode_atts(array(
		'bgcolor'         => null,
		'bgimage'         => null,
		'boxed'           => "yes",
		'class'           => "",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$style = '';
	$classes = '';

	if ($attr['boxed'] == "yes" && is_null($attr['bgcolor'])) {
		$classes .= " boxed";
	}

	if (!is_null($attr['bgcolor'])) {
		$style .= 'background-color:' . $attr['bgcolor'] . ';';
	}

	if (!is_null($attr['bgimage'])) {
		$style .= 'background-image:url(' . $attr['bgimage'] . ');';
	}

	if (!empty($attr['class'])) {
		$classes .= " " . $attr['class'];
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="callout-box' . $classes . '"' . $attr_animation . ' style="' . $style . '">';
	$html .= do_shortcode($content);
	$html .= '</div>';

	return $html;

}


function wave_shortcode_full_width_section($attr, $content = null) {


	$attr = shortcode_atts(array(
		'bgcolor'        => "#fff",
		'bgimage'        => null,
		'pattern'        => null,
		'column'         => "yes",
		'parallax'       => null,
		'padding_top'    => false,
		'padding_right'  => false,
		'padding_bottom' => false,
		'padding_left'   => false,
		'align'          => "left",
		'class'          => null
	), $attr);

	$classes      = '';
	$attributes   = '';
	$style        = '';
	$column_style = '';

	if ($attr['bgcolor'] != "#fff") {
		$style .= 'background-color:' . $attr['bgcolor'] . ';';
	}

	if (!empty($attr['bgimage'])) {
		$style .= 'background-image:url(' . $attr['bgimage'] . ');';
	}

	if (!empty($attr['pattern'])) {
		$style .= 'background-repeat:repeat;';
	}

	if ($attr['padding_top'] !== false) {
		$column_style .= 'padding-top:' . $attr['padding_top'] . 'px;';
	}

	if ($attr['padding_right'] !== false) {
		$column_style .= 'padding-right:' . $attr['padding_right'] . 'px;';
	}

	if ($attr['padding_bottom'] !== false) {
		$column_style .= 'padding-bottom:' . $attr['padding_bottom'] . 'px;';
	}

	if ($attr['padding_left'] !== false) {
		$column_style .= 'padding-left:' . $attr['padding_left'] . 'px;';
	}

	if ($attr['column'] == "no") {
		$column_style = 'padding:0;';
		$column_style .= 'max-width:100%;';
		$column_style .= 'width:100%;';
	}

	if (!empty($attr['parallax']) && $attr['parallax'] != "no") {
		$classes .= " parallax";
		$attributes .= ' data-parallax-background-ratio="0.7"';
		$attributes .= ' data-background-image="' . $attr['bgimage'] . '"';
		if (!empty($attr['pattern'])) {
			$attributes .= ' data-parallax-scale="false"';
		} else {
			$attributes .= ' data-parallax-scale="true"';
		}
	}

	if (!empty($attr['class'])) {
		$classes .= " " . $attr['class'];
	}

	$html = '<div class="full-width-section' . $classes . '"' . $attributes . ' style="' . $style . '">';
	$html .= '<div class="column" style="' . $column_style . '">';
	$html .= do_shortcode($content);
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_text_shadow($attr, $content = null) {

	$attr = shortcode_atts(array(
		'vertical'  => 1,
		'horizontal' => 1,
		'blur' => 1,
		'color' => '#000000',
		'opacity' => 0.75
	), $attr);

	$inline = new Wave_Inline();
	$inline->css('text-shadow', $attr['vertical'] . 'px ' .  $attr['horizontal'] . 'px ' . $attr['blur'] . 'px ' . wave_hex_to_rgba($attr['color'], $attr['opacity']));

	return '<div id="' . $inline->get_ueid() . '">' . do_shortcode($content) . '</div>';

}

function wave_shortcode_spacer($attr, $content = null) {
	$attr = shortcode_atts(array(
		'width'  => "1",
		'height' => "1"
	), $attr);

	$class = "clear";

	if ($attr['height'] == "1" && $attr['width'] > 1) {
		$class = "";
	}

	$html = '<span class="spacer ' . $class . '" style="height: ' . $attr['height'] . 'px;width: ' . $attr['width'] . 'px"></span>';

	return $html;
}

function wave_shortcode_image($attr, $content = null) {

	$attr = shortcode_atts(array(
		'width'           => false,
		'height'          => false,
		'class'           => false,
		'frame'           => false,
		'border_color'    => false,
		'title'           => '',
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$inline = new Wave_Inline();

	$attributes = '';
	$classes = '';

	if (empty($url)) {
		if (empty($content)) {
			$url = "#";
		} else {
			$url = $content;
		}
	}

	if (!empty($attr['width'])) {
		$attributes .= ' width="' . $attr['width'] . '"';
	}

	if (!empty($attr['height'])) {
		$attributes .= ' height="' . $attr['height'] . '"';
	}

	if (!empty($attr['frame'])) {
		$classes .= 'frame-' . $attr['frame'];
	}

	if (!empty($attr['animation'])) {
		$attributes .= ' data-animation="' . $attr['animation'] . '"';
		$attributes .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attributes .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	}

	if (!empty($attr['border_color'])) {
		$inline->css('border-color', $attr['border_color']);
	}

	$html = '<img id="' . $inline->get_ueid() . '" class="image ' . $classes . '"' . $attributes . ' src="' . $url . '" alt="' . $attr['title'] . '" />';

	return $html;
}


function wave_shortcode_title($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'           => "",
		'align'           => "left",
		'size'            => "1",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$class_shadow = "";

	if (!empty($attr['shadow'])) {
		$class_shadow = " shadow";
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$ueid = wave_ueid();

	if (!empty($attr['color'])) {
		Wave_Dynamic::css('#' . $ueid, 'color', $attr['color']);
	}

	$html = '<h' . $attr['size'] . ' id="' . $ueid . '" class="align-' . $attr['align'] . $class_shadow . '"' . $attr_animation . '>' . do_shortcode($content) . '</h' . $attr['size'] . '>';

	return $html;

}


function wave_shortcode_one_third($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_one_third_last($attr);
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_third align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_one_third_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_third last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_two_third($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_two_third_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="two_third align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_two_third_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="two_third last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_one_half($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_one_half_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_half align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_one_half_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_half last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_one_fourth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_one_fourth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_fourth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_one_fourth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_fourth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_three_fourth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_three_fourth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="three_fourth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_three_fourth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="three_fourth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_one_fifth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_one_fifth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_fifth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_one_fifth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_fifth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_two_fifth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_two_fifth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="two_fifth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_two_fifth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="two_fifth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_three_fifth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_three_fifth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="three_fifth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_three_fifth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="three_fifth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_four_fifth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_four_fifth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="four_fifth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_four_fifth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="four_fifth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_one_sixth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_one_sixth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_sixth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_one_sixth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="one_sixth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_five_sixth($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'last'           => "no",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if($attr['last'] == "yes"){
		return wave_shortcode_five_sixth_last($attr);
	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="five_sixth align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_five_sixth_last($attr, $content = null) {
	$attr = shortcode_atts(array(
		'align'           => "left",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="five_sixth last align-' . $attr['align'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;
}

function wave_shortcode_blog($attr, $content = null) {

	$attr = shortcode_atts(array(
		'posts'           => "4",
		'categories' => null,
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="container container-blog"' . $attr_animation . '>';
	$html .= '<ul>';

	$args = array(
		'posts_per_page' => $attr['posts']
	);

	if(!empty($attr['categories'])){
		$args['cat'] = $attr['categories'];
	}

	$query = new WP_Query($args);

	$index = 0;

	if ($query->have_posts()) {
		while ($query->have_posts()) {

			$query->the_post();

			$html .= '<li data-post-id="' . get_the_ID() . '" class="blog-post-' . ($index % 2 ? "even" : "odd") . '">';
			$html .= '<div class="thumb">';
			$html .= '<a href="' . get_permalink() . '">';
			$html .= '<div class="overlay">';
			$html .= '<div>';
			$html .= '<span>' . get_the_title() . '</span>';
			$html .= '<i class="icon icon-1x icon-search"></i>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<img width="260" height="260" src="' . wave_get_post_thumb_url(get_the_ID(), 260, 260) . '" alt="" />';
			$html .= '</a>';
			$html .= '</div>';
			$html .= '<div class="content">';
			$html .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
			$html .= '<div class="excerpt">' . wave_get_excerpt(220) . '</div>';
			$html .= do_shortcode('[button size="small" color="secondary" url="' . get_permalink() . '"]' . __("Read More", WAVE_TEXT_DOMAIN) . '[/button]');
			$html .= '</div>';
			$html .= '</li>';

			$index++;

		}
	}

	$html .= '</ul>';
	$html .= '<div class="clearboth"></div>';
	$html .= '<footer>';
	$html .= do_shortcode('[button icon_right="arrow-right-2" icon_type="icomoon" size="medium" url="' . get_permalink(get_option('page_for_posts')) . '"]' . __("See More Posts", WAVE_TEXT_DOMAIN) . '[/button]');
	$html .= '</footer>';
	$html .= '</div>';

	wp_reset_postdata();

	return $html;

}


function wave_shortcode_button($attr, $content = null) {

	$attr = shortcode_atts(array(
		'text'            => "Button",
		'style'           => "",
		'color'           => "primary",
		'mouseover_color' => "",
		'class'           => "",
		'size'            => "large",
		'url'             => "#",
		'target'          => "_self",
		'icon_type'       => "",
		'icon_left'       => "",
		'icon_right'      => "",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$ueid = wave_ueid();

	if (!empty($attr['icon_left'])) {
		$attr['icon_left'] = '<i class="icon-left icon-' . str_replace("icon-", "", $attr['icon_left']) . ' ' . $attr['icon_type'] . '"></i>';
	}

	if (!empty($attr['icon_right'])) {
		$attr['icon_right'] = '<i class="icon-right icon-' . str_replace("icon-", "", $attr['icon_right']) . ' ' . $attr['icon_type'] . '"></i>';
	}

	if ($attr['text'] == "Button" && !empty($content)) {
		$attr['text'] = $content;
	}

	// Provide compatibility for when the user enters the color style in the style attribute
	if ($attr['style'] == 'primary' || $attr['style'] == 'secondary') {
		$attr['color'] = $attr['style'];
		$attr['style'] = '';
	}

	if ($attr['color'] == 'primary' || $attr['color'] == 'secondary') {
		$attr['class'] .= ' ' . $attr['color'];
		$attr['color'] = null;
	}

	if ($attr['style'] == 'alt') {
		if (!is_null($attr['color'])) {
			Wave_Dynamic::css('#' . $ueid, 'border-color', wave_hex_to_rgba($attr['color'], 0.5));
			Wave_Dynamic::css('#' . $ueid . ':hover', 'border-color', wave_option('style_button_alt_hover_border_color'));
		}
		if (!empty($attr['mouseover_color'])) {
			Wave_Dynamic::css('#' . $ueid . ':hover', 'border-color', $attr['mouseover_color']);
		}
	} else {
		if (!is_null($attr['color'])) {
			Wave_Dynamic::css('#' . $ueid, 'background-color', $attr['color']);
		}
		if (!empty($attr['mouseover_color'])) {
			Wave_Dynamic::css('#' . $ueid . ':hover', 'background-color', $attr['mouseover_color']);
		}
	}

	switch ($attr['style']) {
		case "alt":
			$attr['class'] .= ' alternative';
			$attr['size']  = "";
			$attr['style'] = "";
			break;
		case "3d":
			$attr['class'] .= ' dim3';
			break;
		case "2d":
			$attr['class'] .= ' dim2';
			break;
		case "ui":
			$attr['class'] .= ' ui';
			$attr['size']  = "";
			$attr['style'] = "";
			break;
		case "plain":
			$attr['class'] .= ' plain';
			$attr['size']  = "";
			$attr['style'] = "";
			break;
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<a id="' . $ueid . '" class="button ' . $attr['size'] . ' ' . $attr['class'] . '"' . $attr_animation . ' href="' . $attr['url'] . '" target="' . $attr['target'] . '">';
	$html .= $attr['icon_left'] . do_shortcode($attr['text']) . $attr['icon_right'];
	$html .= '</a>';

	return $html;
}

function wave_shortcode_cta_button($attr, $content = null) {

	$attr = shortcode_atts(array(
		'id'           => null,
		'style'           => ""
	), $attr);

	$button = array(
		'url'       => '#' . get_post_meta($attr['id'], "cta_popup_form", true),
		'class'     => 'call-to-action'
	);

	$button = array_merge($button, $attr);

	if (is_numeric($attr['id']) && !empty($attr['id'])) {

		if(empty($content)){
			$content = get_post_meta($attr['id'], 'cta_button_text', true);
			$button['icon_left'] = get_post_meta($attr['id'], 'cta_button_icon', true);
		}

		$html = wave_shortcode_button($button, $content);
		Wave_Popup::activate_popup($attr['id']);

		return $html;
	}

	return null;
}

function wave_shortcode_alert_error($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="alert alert-error"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_alert_success($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="alert alert-success"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_alert_info($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="alert alert-info"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_alert_notice($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="alert alert-notice"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_dropcap($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'           => null,
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$ueid = wave_ueid();

	if (!empty($attr['color'])) {
		Wave_Dynamic::css('#' . $ueid, 'color', $attr['color']);
	}

	$html = '<span id="' . $ueid . '" class="dropcap"' . $attr_animation . '>' . do_shortcode($content) . '</span>';

	return $html;
}

function wave_shortcode_highlight($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'   => "#000000",
		'bgcolor' => "#DFFF00",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<span class="highlight"' . $attr_animation . ' style="background:' . $attr['bgcolor'] . ';color:' . $attr['color'] . ';">' . do_shortcode($content) . '</span>';

	return $html;
}


function wave_shortcode_counter($attr, $content = null) {

	$attr = shortcode_atts(array(
		'style'           => "plain",
		'color'           => null,
		'value'           => 75,
		'unit'            => "%",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if ($attr['style'] != "box") {
		$attr['style'] = "plain";
	}

	if (empty($attr['color'])) {

		$option = get_option(WAVE_OPTION_NAME);

		if (isset($option["style_counters_color"])) {
			$attr['color'] = $option["style_counters_color"];
		}

	}


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="counter-box style-' . $attr['style'] . '" data-counter-value="' . $attr['value'] . '"' . $attr_animation . '>';
	$html .= '<div class="counter-box-counter">';
	$html .= '<span class="value" style="color:' . $attr['color'] . '">' . $attr['value'] . '</span>';
	$html .= '<span class="unit" style="color:' . $attr['color'] . '">' . $attr['unit'] . '</span>';
	$html .= '</div>';
	$html .= '<div class="counter-box-content">';
	$html .= do_shortcode($content);
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}


function wave_shortcode_counters($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="counters-box"' . $attr_animation . '>';
	$html .= do_shortcode($content);
	$html .= '<div class="clearboth"></div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_counters_circle($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="counters-circle"' . $attr_animation . '>';
	$html .= do_shortcode($content);
	$html .= '<div class="clearboth"></div>';
	$html .= '</div>';

	return $html;

}


function wave_shortcode_soundcloud($attr) {

	$attr = shortcode_atts(array(
		'url'       => '',
		'width'     => '100%',
		'height'    => 81,
		'comments'  => 'true',
		'auto_play' => 'true',
		'color'     => 'ff7700',
	), $attr);

	if ($attr['comments'] == 'yes') {
		$attr['comments'] = 'true';
	} else {
		$attr['comments'] = 'false';
	}

	if ($attr['auto_play'] == 'yes') {
		$attr['auto_play'] = 'true';
	} else {
		$attr['auto_play'] = 'false';
	}

	$attr['color'] = str_replace("#", "", $attr['color']);

	$url = 'https://w.soundcloud.com/player/';
	$url .= '?url=' . urlencode($attr['url']) . '';
	$url .= '&amp;show_comments=' . $attr['comments'] . '';
	$url .= '&amp;auto_play=' . $attr['auto_play'] . '';
	$url .= '&amp;color=' . $attr['color'];

	$html = '<iframe class="embed-audio" width="' . $attr['width'] . '" height="' . $attr['height'] . '" src="' . $url . '"></iframe>';

	return $html;

}


function wave_shortcode_light($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="light"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}


function wave_shortcode_vimeo($attr, $content = null) {

	$attr = shortcode_atts(array(
		'id'     => "",
		'width'  => "320",
		'height' => "260",
	), $attr);

	$html = '';
	$html .= '<div class="embed-video embed-video-vimeo" style="width:' . $attr['width'] . 'px;height:' . $attr['height'] . 'px">';
	$html .= '<iframe src="http://player.vimeo.com/video/' . $attr['id'] . '" width="' . $attr['width'] . '" height="' . $attr['height'] . '" allowFullScreen></iframe>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_youtube($attr, $content = null) {

	$attr = shortcode_atts(array(
		'id'     => "",
		'width'  => "320",
		'height' => "260",
	), $attr);

	$html = '';
	$html .= '<div class="embed-video embed-video-youtube" style="width:' . $attr['width'] . 'px;height:' . $attr['height'] . 'px">';
	$html .= '<iframe id="ytplayer" type="text/html" width="' . $attr['width'] . '" height="' . $attr['height'] . '" src="http://www.youtube.com/embed/' . $attr['id'] . '" allowFullScreen></iframe>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_testimonial_slider($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'           => "",
		'class'           => "",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$attributes = '';

	if (!empty($attr['animation'])) {
		$attributes .= ' data-animation="' . $attr['animation'] . '"';
		$attributes .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attributes .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	}

	$inline = new Wave_Inline();
	if (!empty($attr['color'])) {
		$inline->css('color', $attr['color']);
	}

	$html = '<div id="' . $inline->get_ueid() . '" class="testimonial_slider ' . $attr['class'] . '"' . $attributes . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_testimonial($attr, $content = null) {

	$attr = shortcode_atts(array(
		'name'    => "Name",
		'company' => "Company"
	), $attr);

	$html = '<div class="testimonial">';
	$html .= '<span class="quote">&ldquo;' . $content . '&rdquo;</span>';
	$html .= '<span class="name">' . $attr['name'] . '</span>';
	$html .= '<span class="company">' . $attr['company'] . '</span>';
	$html .= '</div>';

	return $html;
}

function wave_shortcode_accordion($attr, $content = null) {


	$attr = shortcode_atts(array(
		'style'           => "default",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="toggles single ' . $attr['style'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_toggles($attr, $content = null) {

	$attr = shortcode_atts(array(
		'style'           => "default",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="toggles multi ' . $attr['style'] . '"' . $attr_animation . '>' . do_shortcode($content) . '</div>';

	return $html;
}

function wave_shortcode_toggle($attr, $content = null) {

	$attr = shortcode_atts(array(
		'title'  => "",
		'status' => ""
	), $attr);

	$html = '';
	$html .= '<div class="toggle ' . ($attr['status'] == "open" ? "active" : "inactive") . '">';
	$html .= '<h3><i class="icon-chevron-right"></i><span>' . $attr['title'] . '</span></h3>';
	$html .= '<div class="toggle-content">';
	$html .= '<div class="toggle-content-inner">' . do_shortcode($content) . '</div>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}

function wave_shortcode_bar_graph($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<ul class="bar_graph"' . $attr_animation . '>' . do_shortcode($content) . '</ul>';

	return $html;
}

function wave_shortcode_bar($attr, $content = null) {

	$attr = shortcode_atts(array(
		'title'   => "Title",
		'percent' => "50"
	), $attr);

	$html = '<li>';
	$html .= '<span>' . $attr['title'] . '</span>';
	$html .= '<div class="bar" data-percentage="' . $attr['percent'] . '">';
	$html .= '<div style="width:0;"></div>';
	$html .= '</div>';
	$html .= '</li>';

	return $html;

}


function wave_shortcode_separator($attr) {

	$attr = shortcode_atts(array(
		'color'           => 0,
		'spacing'         => 80,
		'thickness'       => null,
		'style'           => 'none',
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$attr['spacing'] = round($attr['spacing'] / 2);

	if ($attr['style'] == "shadow") {
		$marginTop    = $attr['spacing'];
		$marginBottom = $attr['spacing'] - 21;
	} else {
		$marginTop    = $attr['spacing'];
		$marginBottom = $attr['spacing'];
	}

	$style = 'margin: ' . $marginTop . 'px 0 ' . $marginBottom . 'px 0;';

	if (!empty($attr['color'])) {
		$style .= 'border-color:' . $attr['color'] . ';';
	}

	if (!empty($attr['thickness'])) {
		$style .= 'border-width:' . $attr['thickness'] . 'px;';
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '<div class="sep sep-' . $attr['style'] . '" style="' . $style . '"' . $attr_animation . '></div>';

	return $html;
}

function wave_shortcode_counter_circle($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'   => null,
		'bgcolor' => null,
		'value'   => 75
	), $attr);

	$classes = '';

	$option = get_option(WAVE_OPTION_NAME);

	if (empty($attr['color']) && isset($option["style_counters_color"])) {
		$classes .= ' default-color';
		$attr['color'] = $option["style_counters_color"];
	}

	if (empty($attr['bgcolor']) && isset($option["style_counters_bgcolor"])) {
		$attr['bgcolor'] = $option["style_counters_bgcolor"];
	}

	$attr['value'] = intval($attr['value']);

	if($attr['value'] > 100){
		$attr['value'] = 100;
	} elseif($attr['value'] < 0) {
		$attr['value'] = 1;
	}

	$attr['value'] *= 10;

	$attributes = '';
	$attributes .= ' data-counter-value="' . $attr['value'] . '"';
	$attributes .= ' data-counter-color="' . $attr['color'] . '"';
	$attributes .= ' data-counter-bgcolor="' . $attr['bgcolor'] . '"';

	$html = '<div class="counter-circle' . $classes . '"' . $attributes . '>';
	$html .= '<input type="hidden" class="knob"';
	$html .= ' value="0" data-value="' . $attr['value'] . '" data-min="0" data-max="1000"';
	$html .= ' data-color="' . $attr['color'] . '" data-bgcolor="' . $attr['bgcolor'] . '" />';
	$html .= '<div class="counter-circle-content">';
	$html .= do_shortcode($content);
	$html .= '</div>';
	$html .= '</div>';

	return $html;
}


function wave_shortcode_icon_box($attr, $content = null) {

	$attr = shortcode_atts(array(
		'icon'            => false,
		'icon_color'      => "default",
		'icon_style'      => "",
		'icon_type'       => "fontawesome",
		'icon_size'       => "",
		'icon_mouseover'  => "no",
		'title'           => "Title",
		'layout'          => "icon-title",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	if (empty($content)) {
		$content = "Content";
	}

	switch ($attr['layout']) {
		case "icon-title" :
			$iconSize  = "tiny";
			$iconStyle = "invert";
			break;
		case "icon-top" :
			$iconSize               = "medium";
			$iconStyle              = "alt";
			$attr['icon_mouseover'] = "yes";
			if ($attr['icon_size'] != "") {
				$iconSize = $attr['icon_size'];
			}
			break;
		case "icon-left" :
			$iconSize  = "tiny";
			$iconStyle = "invert";
			break;
		case "boxed" :
			$attr['layout']         = "icon-top boxed";
			$iconSize               = "medium";
			$iconStyle              = "invert";
			$attr['icon_mouseover'] = "yes";
			if ($attr['icon_size'] != "") {
				$iconSize = $attr['icon_size'];
			}
			break;
	}

	if ($attr['icon_style'] != "") {
		$iconStyle = $attr['icon_style'];
	}

	$icon = array(
		'image'     => $attr['icon'],
		'size'      => $iconSize,
		'style'     => $iconStyle,
		'color'     => $attr['icon_color'],
		'mouseover' => $attr['icon_mouseover'],
		'type'      => $attr['icon_type']
	);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="icon-box ' . $attr['layout'] . '"' . $attr_animation . '>';
	$html .= '<div class="heading">';
	$html .= wave_shortcode_icon($icon);
	$html .= '<h3>' . do_shortcode($attr['title']) . '</h3>';
	$html .= '</div>';
	$html .= '<div class="content">' . do_shortcode($content) . '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_map($attr, $content = null) {

	$attr = shortcode_atts(array(
		'width'           => '100%',
		'height'          => "400",
		'address'         => '',
		'type'            => 'satellite',
		'zoom'            => '14',
		'scrollwheel'     => 'no',
		'scale'           => 'yes',
		'zoom_pancontrol' => 'yes',
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	static $mapInstance = 0;

	$attributes = '';
	$attributes .= ' data-map-address="' . $attr['address'] . '"';
	$attributes .= ' data-map-type="' . $attr['type'] . '"';
	$attributes .= ' data-map-zoom="' . $attr['zoom'] . '"';
	$attributes .= ' data-map-scrollwheel="' . $attr['scrollwheel'] . '"';
	$attributes .= ' data-map-scale="' . $attr['scale'] . '"';
	$attributes .= ' data-map-zoom-pancontrol="' . $attr['zoom_pancontrol'] . '"';

	if (is_numeric($attr['width'])) {
		$attr['width'] .= "px";
	}

	if (is_numeric($attr['height'])) {
		$attr['height'] .= "px";
	}

	$html = '<div id="map_' . $mapInstance . '" class="gmap" style="width: ' . $attr['width'] . ';height: ' . $attr['height'] . '"' . $attributes . '></div>';

	$mapInstance++;



	return $html;

}


function wave_shortcode_pricing_table($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$parts   = explode('[pricing_column', $content);
	$columns = count($parts) - 1;

	foreach ($parts as $index => $part) {
		if ($index > 0) {
			$part = ' column_index="' . $index . '" column_length="' . $columns . '"' . $part;
		}
		$parts[$index] = $part;
	}

	$content = join('[pricing_column', $parts);

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="pricing-table columns-' . $columns . '"' . $attr_animation . '>';
	$html .= do_shortcode($content);
	//$html .= $content;
	$html .= '<div class="clearboth"></div>';
	$html .= '</div>';

	return $html;
}


function wave_shortcode_pricing_column($attr, $content = null) {

	$attr = shortcode_atts(array(
		'name'            => "Product Name",
		'highlight'       => "",
		'currency'        => "$",
		'price'           => "99",
		'recurrence'      => "per month",
		'button_text'     => "Button Text",
		'button_url'      => "#button_url",
		'column_index'    => null,
		'column_length'   => null,
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$content = Wave_RegEx::replace('#<li>(.*?)</li>#sim', '<li><span class="cell">$1</span></li>', $content);

	$last_column = $attr['column_length'] == $attr['column_index'];

	if (strpos($attr['price'], ".")) {
		list($attr['price'], $decimal) = explode(".", $attr['price']);
		$decimal = '<span class="decimal">.' . $decimal . '</span>';
	} elseif (strpos($attr['price'], ",")) {
		list($attr['price'], $decimal) = explode(",", $attr['price']);
		$decimal = '<span class="decimal">,' . $decimal . '</span>';
	} else {
		$decimal = "";
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$button = array('url' => $attr['button_url']);

	$html = '';

	$html .= '<div class="pricing-column' . ((empty($attr['highlight']) || $attr['highlight'] == 'no') ? "" : " highlight") . ($last_column ? " last" : "") . '"' . $attr_animation . '>';
	$html .= '<header>';
	$html .= '<span class="name">' . $attr['name'] . '</span>';
	$html .= (empty($attr['highlight']) ? "" : '<span class="sub">' . $attr['highlight'] . '</span>');
	$html .= '</header>';
	$html .= '<div class="pricing">';
	$html .= '<span class="price"><span class="currency">' . $attr['currency'] . '</span>' . $attr['price'] . $decimal . '</span>';
	$html .= '<span class="recurrence">' . $attr['recurrence'] . '</span>';
	$html .= '</div>';
	$html .= $content;
	$html .= '<footer>';
	$html .= wave_shortcode_button($button, $attr['button_text']);
	$html .= '</footer>';
	$html .= '</div>';

	return $html;
}


function wave_shortcode_icon($attr, $content = null) {

	$attr = shortcode_atts(array(
		'color'           => "default",
		'bgcolor'         => "default",
		'size'            => "normal",
		'image'           => "ok",
		'style'           => "default",
		'type'            => "fontawesome",
		'padding_top'     => null,
		'padding_right'   => null,
		'padding_bottom'  => null,
		'padding_left'    => null,
		'mouseover'       => "yes",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$style = '';
	$class = 'icon wave-icon';

	switch ($attr['size']) {
		case "tiny" :
			$attr['size'] = "1x";
			break;
		case "small" :
			$attr['size'] = "2x";
			break;
		case "medium" :
		case "normal" :
			$attr['size'] = "3x";
			break;
		case "large" :
			$attr['size'] = "4x";
			break;
		case "huge" :
			$attr['size'] = "5x";
			break;
	}

	if (!is_null($attr['padding_top'])) {
		$style .= 'padding-top:' . $attr['padding_top'] . 'px;';
	}

	if (!is_null($attr['padding_right'])) {
		$style .= 'padding-right:' . $attr['padding_right'] . 'px;';
	}

	if (!is_null($attr['padding_bottom'])) {
		$style .= 'padding-bottom:' . $attr['padding_bottom'] . 'px;';
	}

	if (!is_null($attr['padding_left'])) {
		$style .= 'padding-left:' . $attr['padding_left'] . 'px;';
	}

	if ($attr['mouseover'] == "true") {
		$attr['mouseover'] = "yes";
	} elseif ($attr['mouseover'] == "false") {
		$attr['mouseover'] = "no";
	}

	$class .= ' icon-' . str_replace("icon-", "", $attr['image']);
	$class .= ' icon-' . $attr['size'];
	$class .= ' mouseover-' . $attr['mouseover'];

	$icon_types = array(
		"icomoon",
		"fontawesome"
	);

	if (empty($attr['type'])) {
		$class .= ' fontawesome';
	}
	if (in_array($attr['type'], $icon_types)) {
		$class .= ' ' . $attr['type'];
	}

	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	if ($attr['color'] == "default") {
		$attr['color'] = wave_option('style_icons_default_color');
		$class .= ' color-default';
	}

	switch ($attr['style']) {
		case "default" :
			$style .= 'color: ' . $attr['color'] . ';';
			if ($attr['bgcolor'] != "default") {
				$style .= 'background-color:' . $attr['bcolor'] . ';';
			} else {
				$style .= 'background-color:none;';
			}
			break;
		case "invert" :
			$class .= ' inherit-color';
			$style .= 'background-color:' . $attr['color'] . ';';
			break;
		case "alt" :
			$style .= 'color:' . $attr['color'] . ';';
			$style .= 'background-color:rgba(0, 0, 0, 0.05);';
			$class .= ' inherit-bgcolor';
			break;
	}

	$class .= ' style-' . $attr['style'];

	$html = '<i class="' . $class . '" style="' . $style . '"' . $attr_animation . '></i>';

	return $html;

}


function wave_shortcode_tabs_left($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$tabs = Wave_RegEx::get_all('/\[(\[?)(tab)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/sim', $content);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="tabs-wrapper"' . $attr_animation . '>';
	$html .= '<div class="tabs-container">';
	$html .= '<ul class="tabs-buttons">' . do_shortcode($content) . '</ul>';
	$html .= '<ul class="tabs-contents">';

	if (!empty($tabs[5])) {
		foreach ($tabs[5] as $tab_content) {
			$html .= '<li class="tab-content">' . do_shortcode($tab_content) . '</li>';
		}
	}

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_subject_tabs_left($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$attr = shortcode_atts(array(
		'title' => "Title",
	), $attr);

	$tabs = Wave_RegEx::get_all('/\[(\[?)(tab)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/sim', $content);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="tabs-wrapper subject left"' . $attr_animation . '>';
	$html .= '<div class="tabs-container">';
	$html .= '<h2>' . $attr['title'] . '</h2>';
	$html .= '<ul class="tabs-buttons">' . do_shortcode($content) . '</ul>';
	$html .= '<ul class="tabs-contents">';

	if (!empty($tabs[5])) {
		foreach ($tabs[5] as $tab_content) {
			$html .= '<li class="tab-content">' . $tab_content . '</li>';
		}
	}

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_subject_tabs_right($attr, $content = null) {

	$attr = shortcode_atts(array(
		'title'           => "Title",
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$tabs = Wave_RegEx::get_all('/\[(\[?)(tab)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/sim', $content);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="tabs-wrapper subject right"' . $attr_animation . '>';
	$html .= '<div class="tabs-container">';
	$html .= '<h2>' . $attr['title'] . '</h2>';
	$html .= '<ul class="tabs-buttons">' . do_shortcode($content) . '</ul>';
	$html .= '<ul class="tabs-contents">';

	if (!empty($tabs[5])) {
		foreach ($tabs[5] as $tab_content) {
			$html .= '<li class="tab-content">' . $tab_content . '</li>';
		}
	}

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_tabs_right($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$tabs = Wave_RegEx::get_all('/\[(\[?)(tab)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/sim', $content);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="tabs-wrapper right"' . $attr_animation . '>';
	$html .= '<div class="tabs-container">';
	$html .= '<ul class="tabs-buttons">' . do_shortcode($content) . '</ul>';
	$html .= '<ul class="tabs-contents">';

	if (!empty($tabs[5])) {
		foreach ($tabs[5] as $tab_content) {
			$html .= '<li class="tab-content">' . $tab_content . '</li>';
		}
	}

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_vertical_tabs($attr, $content = null) {

	$attr = shortcode_atts(array(
		'animation'       => "",
		'animation_time'  => 1500,
		'animation_delay' => 0
	), $attr);

	$tabs = Wave_RegEx::get_all('/\[(\[?)(tab)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)/sim', $content);


	if (!empty($attr['animation'])) {
		$attr_animation = '';
		$attr_animation .= ' data-animation="' . $attr['animation'] . '"';
		$attr_animation .= ' data-animation-time="' . $attr['animation_time'] . '"';
		$attr_animation .= ' data-animation-delay="' . $attr['animation_delay'] . '"';
	} else {
		$attr_animation = '';
	}

	$html = '';
	$html .= '<div class="tabs-wrapper vertical"' . $attr_animation . '>';
	$html .= '<div class="tabs-container">';
	$html .= '<ul class="tabs-buttons">' . do_shortcode($content) . '</ul>';
	$html .= '<ul class="tabs-contents">';

	if (!empty($tabs[5])) {
		foreach ($tabs[5] as $tab_content) {
			$html .= '<li class="tab-content">' . $tab_content . '</li>';
		}
	}

	$html .= '</ul>';
	$html .= '<div class="clearboth"></div>';
	$html .= '</div>';
	$html .= '</div>';

	return $html;

}

function wave_shortcode_tab($attr, $content = null) {

	$attr = shortcode_atts(array(
		'title'     => "Tab",
		'icon'      => null,
		'icon_type' => ""
	), $attr);

	$html = '';
	$html .= '<li class="tab-button">';
	$html .= '<a class="tab-button-anchor" href="#">';

	if (!empty($attr['icon'])) {
		$html .= '<i class="icon icon-' . $attr['icon'] . ' ' . $attr['icon_type'] . '"></i>';
	}

	$html .= $attr['title'];
	$html .= '</a>';
	$html .= '</li>';

	return $html;
}

function wave_shortcode_team_carousel($attr) {

	$attr = shortcode_atts(array(
		'title' => __("Our Team", WAVE_TEXT_DOMAIN)
	), $attr);

	$html = '';
	$html .= '<div class="team-carousel">';
	$html .= '<h3>' . $attr['title'] . '</h3>';
	$html .= '<a class="button-arrow button-arrow-right" href="#"></a>';
	$html .= '<a class="button-arrow button-arrow-left inactive" href="#"></a>';
	$html .= '<div class="carousel-wrapper">';
	$html .= '<div class="carousel">';
	$html .= '<ul class="teammembers clearboth">';

	$posts = get_posts("post_type=team");

	foreach ($posts as $post) {

		setup_postdata($post);

		$socialurls                     = array();
		$socialurls['icon-facebook']    = get_post_meta($post->ID, 'teammember_socialmedia_facebook', true);
		$socialurls['icon-google-plus'] = get_post_meta($post->ID, 'teammember_socialmedia_googleplus', true);
		$socialurls['icon-twitter']     = get_post_meta($post->ID, 'teammember_socialmedia_twitter', true);
		$socialurls['icon-linkedin']    = get_post_meta($post->ID, 'teammember_socialmedia_linkedin', true);

		$html .= '<li class="person">';

		$person_attr = array(
			'name'        => get_the_title($post->ID),
			'title'       => get_post_meta($post->ID, 'teammember_title', true),
			'image'       => wave_get_post_thumb_url($post->ID, 260, 260),
			'facebook'    => get_post_meta($post->ID, 'teammember_socialmedia_facebook', true),
			'twitter'     => get_post_meta($post->ID, 'teammember_socialmedia_twitter', true),
			'google_plus' => get_post_meta($post->ID, 'teammember_socialmedia_googleplus', true),
			'linkedin'    => get_post_meta($post->ID, 'teammember_socialmedia_linkedin', true)
		);

		$html .= wave_shortcode_person($person_attr, get_post_meta($post->ID, 'teammember_description', true));

		$html .= '</li>';

		wp_reset_postdata();

	}

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '<div class="clearboth"></div>';

	return $html;

}

function wave_shortcode_portfolio($attr, $content = null) {

	$attr = shortcode_atts(array(
		'posts' => "4",
		'categories' => null
	), $attr);

	$html = '<div class="container container-portfolio">';

	$args = array(
		'type'         => 'portfolio',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '1',
		'include'      => '',
		'number'       => '',
		'taxonomy'     => 'category',
		'pad_counts'   => false
	);

	if(!empty($attr['categories'])){
		$args['include'] = $attr['categories'];
	}

	$categories = get_categories($args);


	$html .= '<ul class="projects-categories">';
	$html .= '<li><a class="active" href="#all" data-filter="*">' . __("All", WAVE_TEXT_DOMAIN) . '</a></li>';

	foreach ($categories as $category) {
		$html .= '<li><a href="#' . $category->slug . '" data-filter=".project-category-' . $category->slug . '">' . $category->name . '</a></li>';
	}

	$html .= '</ul>';

	$html .= '<ul class="projects-list">';

	$args = array(
		'posts_per_page' => 8,
		'offset'         => 0,
		'post_type'      => "portfolio"
	);

	if(!empty($attr['categories'])){
		$args['cat'] = $attr['categories'];
	}

	$query = new WP_Query($args);

	$index = 0;

	if ($query->have_posts()) {
		while ($query->have_posts()) {

			$query->the_post();

			$class      = array();
			$categories = wp_get_post_categories(get_the_ID(), array('fields' => 'slugs'));

			foreach ($categories as $category) {
				$class[] = $category;
			}

			$html .= '<li class="project-index-' . $index . ' project-category-' . join(" project-category-", $class) . '" data-project-id="' . get_the_ID() . '">';
			$html .= '<div class="overlay">';
			$html .= '<div>';
			$html .= '<a href="' . get_permalink() . '">';
			$html .= '<span>' . get_the_title() . '</span>';
			$html .= '<i class="icon icon-1x icon-search"></i>';
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="thumb">';
			$html .= '<img width="260" height="260" src="' . wave_get_post_thumb_url(get_the_ID(), 260, 260) . '" alt="" />';
			$html .= '</div>';
			$html .= '</li>';

			$index++;

		}
	}

	$html .= '</ul>';
	$html .= '<div class="clearboth"></div>';
	$html .= '<footer>';
	$html .= do_shortcode('[button icon_right="arrow-right-2" icon_type="icomoon" size="medium" url="' . get_post_type_archive_link('portfolio') . '"]' . __("See More Projects", WAVE_TEXT_DOMAIN) . '[/button]');
	$html .= '</footer>';
	$html .= '</div>';

	wp_reset_postdata();

	return $html;

}
