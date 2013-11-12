<?php

include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/color/field_color.php";
include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/google_webfonts/field_google_webfonts.php";
include_once WAVETHEMES_THEME_DIRECTORY . "include/options/fields/slider/field_slider.php";

class WaveRedux_Options_google_maps_locations {

	public $parent;

    function __construct($field = array(), $value ='', $parent)
    {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
		$this->parent = $parent;
    }

    function render()
    {
    	
		if(!is_array($this->value) || empty($this->value)){
			$this->value = array(array('latitude' => "", 'longitude' => "", 'text' => ""));
		}
		
		echo '<table class="google-maps-locations" cellspacing="0" cellpadding="0" border="0">';
		
		echo '<tr>';
		echo '<th>' . __("Latitude", WAVE_TEXT_DOMAIN) . '</th>';
		echo '<th>' . __("Longitude", WAVE_TEXT_DOMAIN) . '</th>';
		echo '<th>' . __("Info", WAVE_TEXT_DOMAIN) . '</th>';
		echo '<th>&nbsp;</th>';
		echo '</tr>';
		
		$index = 0;
		
		foreach($this->value as $i => $field){
			echo '<tr data-marker-id="' . $index . '">';
			echo '<td>';
			echo '<input type="text" name="' . WAVE_OPTION_NAME . '[' . $this->field['id'] . '][' . $index . '][latitude]" value="' . $field['latitude'] . '" class="regular-text">';
			echo '</td>';
			echo '<td>';
			echo '<input type="text" name="' . WAVE_OPTION_NAME . '[' . $this->field['id'] . '][' . $index . '][longitude]" value="' . $field['longitude'] . '" class="regular-text">';
			echo '</td>';
			echo '<td>';
			echo '<textarea rows="4" name="' . WAVE_OPTION_NAME . '[' . $this->field['id'] . '][' . $index . '][text]" class="large-text">' . $field['text'] . '</textarea>';
			echo '</td>';
			echo '<td>';
			echo '<a class="button" href="javascript:void(0);" onclick="PolarAdmin.Markers.remove(event);">&#215;</a>';
			echo '</td>';
			echo '</tr>';
			
			$index++;
		}


		echo '</table>';
		
		echo '<input type="button" value="Add Row" class="button button-primary add-marker">';
		
		
    }

}
