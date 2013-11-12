<?php
class WaveRedux_Options_color {

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
        $class = (isset($this->field['class'])) ? $this->field['class'] : '';

		if(!strpos($class, "spectrum-select")){
			$class = "spectrum-palette";
		}

        if(!isset($this->field['title'])){
            $this->field['title'] = "";
        }
		
		echo '<input type="text" data-field-title="' . $this->field['title'] . '" id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" value="' . $this->value . '" class="' . $class . '" />';
		echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? '<br/><br/><span class="description">' . $this->field['desc'] . '</span>' : '';
    }

    /**
     * Enqueue Function.
     *
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since WaveRedux_Options 1.0.0
    */
    function enqueue() {
        if(get_bloginfo('version') >= '3.5') {
            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script(
                'redux-opts-field-color-js',
                WaveRedux_OPTIONS_URL . 'fields/color/field_color.js',
                array('wp-color-picker'),
                time(),
                true
            );
        } else {
            wp_enqueue_script(
                'redux-opts-field-color-js', 
                WaveRedux_OPTIONS_URL . 'fields/color/field_color_farb.js', 
                array('jquery', 'farbtastic'),
                time(),
                true
            );
        }
    }
}
