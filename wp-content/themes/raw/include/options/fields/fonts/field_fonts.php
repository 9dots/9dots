<?php
class WaveRedux_Options_fonts {

    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

	private function get_fonts_list() {
		$filename = WAVETHEMES_DIRECTORY . '/data/google_webfonts.json';
		$contents = file_get_contents($filename);
		$google_webfonts = json_decode($contents);
		return $google_webfonts;
	}

    function render() {

		$list = $this->get_fonts_list();

	    $ranges = array(
		    'A' => 'A - B',
		    'C' => 'C - F',
		    'G' => 'G - I',
		    'J' => 'J - L',
		    'M' => 'M - O',
		    'P' => 'P - R',
		    'S' => 'S - U',
		    'V' => 'V - X',
		    'Y' => 'Y - Z'
	    );

	    $fonts_image = get_template_directory_uri() . '/assets/img/admin/fonts.jpg';

	    echo '<span class="hidden-row"></span>';
	    echo '</td>';
	    echo '</tr>';
	    echo '<tr>';
	    echo '<td colspan="2">';

	    echo '<input type="hidden" id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" value="' . esc_attr($this->value) . '" />';

	    echo '<div id="font-tabs">' . PHP_EOL;
	    echo '<ul>' . PHP_EOL;

	    foreach(array_values($ranges) as $index => $range){
		    echo '<li><a href="#tabs-' . ($index + 1) . '">' . $range . '</a></li>' . PHP_EOL;
	    }

	    echo '</ul>' . PHP_EOL;


	    $x = $y  = 0;

	    $current_character = '';
	    $tab_index = 0;

	    foreach($list as $i => $item){

		    $character = $item->name{0};

		    if($character != $current_character){
			    if(in_array($character, array_keys($ranges))){
				    $tab_index++;
				    if($current_character != ''){
					    echo '</ul>' . PHP_EOL;
					    echo '<div class="clear"></div>' . PHP_EOL;
					    echo '</div>' . PHP_EOL;
				    }
				    echo '<div id="tabs-' . $tab_index . '">' . PHP_EOL;
				    echo '<ul class="google-fonts-list">' . PHP_EOL;
			    }
			    $current_character = $character;
		    }

		    echo '<li class="font-item" data-font="' . $item->family . ':' . $item->variant . '">' . PHP_EOL;
		    echo '<div class="thumb" style="background: url(' . $fonts_image . ') -'.($x * 300).'px -' . ($y * 40) . 'px;"></div>' . PHP_EOL;
		    echo '<div class="meta">' . PHP_EOL;
		    echo '<span class="font-name">' . PHP_EOL;
		    echo '<span class="font-family">' . $item->family . '</span>' . PHP_EOL;
		    echo '<span class="font-variant">' . $item->variant_name . '</span>' . PHP_EOL;
		    echo '</span>' . PHP_EOL;
		    echo '<a class="font-toggle" href="#">' . 'Activate' . '</a>' . PHP_EOL;
		    echo '<div class="clear"></div>' . PHP_EOL;
		    echo '</div>' . PHP_EOL;
		    echo '</li>' . PHP_EOL;

		    $x++;

		    if($x >= 16){
			    $x = 0;
			    $y++;
		    }

	    }

	    echo '</ul>' . PHP_EOL;
	    echo '<div class="clear"></div>' . PHP_EOL;

	    echo '</div>' . PHP_EOL;

    }

}
