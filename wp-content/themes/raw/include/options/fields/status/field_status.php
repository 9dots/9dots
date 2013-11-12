<?php
class WaveRedux_Options_status {

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    function render() {
        $class = (isset($this->field['class'])) ? ' ' . $this->field['class'] : '';
        $label_yes = (isset($this->field['label_yes'])) ?  $this->field['label_yes'] : '';
	    $label_no = (isset($this->field['label_no'])) ? $this->field['label_no'] : '';
	    $has_options = (isset($this->field['has_options'])) ? (bool)$this->field['has_options'] : false;
        $test = (empty($this->field['test'])) ? false : $this->field['test'];
        $id = (isset($this->field['id'])) ? $this->field['id'] : '';
        $field_name = $this->args['opt_name'] . '[' . $id . ']';

        echo '<div class="admin-status" data-test="' . ($test ? 1 : 0) . '">';

        echo '<div class="admin-status-icon">';

        if($this->value == '2' || $test == true){
	        echo '<span class="tick"></span>';
            //echo '<img class="admin-status-icon" src="' . get_template_directory_uri() . '/assets/img/admin/icons/tick.png" width="16" height="16" alt="" />';
        }
        else{
	        echo '<span class="cross"></span>';
            //echo '<img class="admin-status-icon" src="' . get_template_directory_uri() . '/assets/img/admin/icons/cross.png" width="16" height="16" alt="" />';
        }

        echo '</div>';

	    if(empty($this->value) && $this->value == ''){
		    $this->value = '1';
	    }


        if(!empty($label_yes) && $has_options && !$test){

            echo '<fieldset>';

	        //var_dump($this->value);

            echo '<label for="' . $id . '_yes">';
            echo '<input type="radio" id="' . $id . '_yes" class="icheck" name="' . $field_name . '" value="1" ' . checked($this->value, "1", false) . '/>';
            echo '<span>' . $label_yes . '</span>';
            echo '</label><br/>';

            echo '<label for="' . $id . '_no">';
            echo '<input type="radio" id="' . $id . '_no" class="icheck" name="' . $field_name . '" value="2" ' . checked($this->value, "2", false) . '/>';
            echo '<span>' . $label_no . '</span>';
            echo '</label><br/>';

            echo '</fieldset>';

        }


        echo '</div>';

        if(isset($this->field['desc'])){
            echo '<div><span class="description">' .  $this->field['desc'] . '</span></div>';
        }
        
    }
}
