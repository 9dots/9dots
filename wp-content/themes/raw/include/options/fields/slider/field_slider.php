<?php
class WaveRedux_Options_slider {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since WaveRedux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since WaveRedux_Options 1.0.0
    */
    function render() {
    	
		$attr = array();
		
		$attr["data-slider"] = "true";
				
		if(isset($this->field['slider'])){
			$slider = $this->field['slider'];
			foreach($slider as $key => $value){
				$attr["data-slider-".$key] = $value;
			}
		}
		
		
		foreach($attr as $key => $value){
			$attr[$key] = $key . '="' . $value . '"';
		}
		
		$attr = join(" ", $attr);
		
        $class = (isset($this->field['class'])) ? $this->field['class'] : 'regular-text';
        $placeholder = (isset($this->field['placeholder'])) ? ' placeholder="' . esc_attr($this->field['placeholder']) . '" ' : '';
        echo '<input type="text" id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" ' . $placeholder . ' '. $attr .' value="' . esc_attr($this->value) . '" class="' . $class . '" />';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
    }
}
