<?php

include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/color/field_color.php";
include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/google_webfonts/field_google_webfonts.php";
include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/slider/field_slider.php";

class WaveRedux_Options_style_text {

	public $parent;

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
		$this->parent = $parent;
		
		//header("Content-Type: text/plain");
		
    }

    function render() {
    	
		//echo "<pre>";
		//print_r();
		//echo "</pre>";
		//exit;
		
		echo '<div class="style-text-fields">';
		
		echo '<div class="style-text-fields-color">';
		
		echo '<label class="field-label">' . __("Color", WAVE_OPTION_NAME) . '</label>';
		
		$fieldColor = array(
			'id'	=> $this->field['id']."_color",
			'type'	=> "color",
			'title'	=> $this->field['title']
		);
		
		if(!isset($this->parent->options[$fieldColor['id']])){
			$this->parent->options[$fieldColor['id']] = "";
		}
		
		$uiColor = new WaveRedux_Options_color($fieldColor, $this->parent->options[$fieldColor['id']], $this->parent);
		$uiColor->render();
		
		echo '</div>';
		
		echo '<div class="style-text-fields-font">';
		
		echo '<label class="field-label">' . __("Font", WAVE_OPTION_NAME) . '</label>';
		
		$fieldFont = array(
			'id'	=> $this->field['id']."_font",
			'type'	=> "google_webfonts",
			'class' => "chosen-select"
		);
		
		if(!isset($this->parent->options[$fieldFont['id']])){
			$this->parent->options[$fieldFont['id']] = "";
		}
		
        $uiFont = new WaveRedux_Options_google_webfonts($fieldFont, $this->parent->options[$fieldFont['id']], $this->parent);
		$uiFont->render();
        
		echo '</div>';
		
		echo '<div class="style-text-fields-size">';
		
		echo '<label class="field-label">' . __("Size", WAVE_OPTION_NAME) . '</label>';
		
		$fieldSize = array(
			'id'	=> $this->field['id']."_size",
			'type'	=> "slider",
            'sub_desc' => __('', WAVE_OPTION_NAME),
            'desc' => __('pixels', WAVE_OPTION_NAME),
            'validate' => "numeric",
            'class'		=> "input_pixels",
            'slider'	=> array(
				'range'		=> "6,120",
				'step'		=> "1",
				'snap'		=> "true"
			)
		);
		
		if(!isset($this->parent->options[$fieldSize['id']])){
			$this->parent->options[$fieldSize['id']] = "";
		}
		
        $uiSize = new WaveRedux_Options_slider($fieldSize, $this->parent->options[$fieldSize['id']], $this->parent);
		$uiSize->render();
		
		echo '</div>';
		
		echo '</div>';
		
    }

}
