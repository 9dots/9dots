<?php

class WaveRedux_Options_header {

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    function render() {
    	
		
        $class = (isset($this->field['class'])) ? ' ' . $this->field['class'] . '' : '';
		echo '<span class="hidden-row"></span>';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th class="header" colspan="2">' . $this->field['title'] . '</th>';
        echo '<td class="hidden">';
		
		
    }
	
}
