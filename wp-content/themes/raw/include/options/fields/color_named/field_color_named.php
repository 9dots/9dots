<?php
class WaveRedux_Options_color_named {

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
		$this->parent = $parent;
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


		echo '<div class="color-named-fields">';
		
		echo '<div class="color-named-fields-name">';
		
		echo '<label class="field-label">' . __("Name", WAVE_OPTION_NAME) . '</label>';
		
		$fieldName = array(
			'id'	=> $this->field['id']."_name",
			'type'	=> "text",
			'class'	=> $class
		);
		
		$uiName = new WaveRedux_Options_text($fieldName, @$this->parent->options[$fieldName['id']], $this->parent);
		$uiName->render();
		
		echo '</div>';
		
		echo '<div class="color-named-fields-color">';
		
		echo '<label class="field-label">' . __("Color", WAVE_OPTION_NAME) . '</label>';
		
		$fieldColor = array(
			'id'	=> $this->field['id']."_color",
			'type'	=> "color",
			'class'	=> $class." spectrum-select"
		);
		
        $uiColor = new WaveRedux_Options_color($fieldColor, @$this->parent->options[$fieldColor['id']], $this->parent);
		$uiColor->render();
        
		echo '</div>';
		echo '</div>';

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
