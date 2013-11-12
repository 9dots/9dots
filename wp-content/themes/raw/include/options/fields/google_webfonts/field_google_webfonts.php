<?php
class WaveRedux_Options_google_webfonts {

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    function render() {
    	
		
		
		$fonts = Wave_Fonts::getFonts();
		
		
		
        $class = (isset($this->field['class'])) ? 'class="' . $this->field['class'] . '" ' : '';
		
        echo '<select id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" ' . $class . '>';

	    $variationsNames = array(
		    '100' => 'Thin',
		    '100-italic' => 'Thin Italic',
		    '200' => 'Extra Light',
		    '200-italic' => 'Extra Light Italic',
		    '300' => 'Light',
		    '300-italic' => 'Light Italic',
		    '400' => 'Regular',
		    '400-italic' => 'Regular Italic',
		    '500' => 'Medium',
		    '500-italic' => 'Medium Italic',
		    '600' => 'Semi-Bold',
		    '600-italic' => 'Semi-Bold Italic',
		    '700' => 'Bold',
		    '700-italic' => 'Bold Italic',
		    '800' => 'Heavy',
		    '800-italic' => 'Heavy Italic',
		    '900' => 'Black',
		    '900-italic' => 'Black Italic'
	    );
		
		$groupName = "";
        
        foreach($fonts as $font){
        	
			echo '<optgroup label="'.$font['name'].'">';
			
			foreach($font['variations'] as $variation){
				$variationName = isset($variationsNames[$variation]) ? $variationsNames[$variation] : "Unknown";
				$name = $font['name'] . " - " . $variationName;
				$value = $font['name'] . '-'.$variation;
				echo '<option value="' . $value.'" ' . selected($this->value, $value, false) . '>' . $name . '</option>';
			}
			
			echo '</optgroup>';
			
        }
        
        echo '</select>';
        
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
		
    }
    
}
