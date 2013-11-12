<?php
class WaveRedux_Options_html {

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    function render() {
        $class = (isset($this->field['class'])) ? ' ' . $this->field['class'] : '';

        if(isset($this->field['html'])){

            if(is_array($this->field['html'])){
                $this->field['html'] = join("", $this->field['html']);
            }

            echo '<div class="'.$class.'">' .  $this->field['html'] . '</div>';
        }

        if(isset($this->field['desc'])){
            echo '<div><span class="description">' .  $this->field['desc'] . '</span></div>';
        }
        
    }
}
