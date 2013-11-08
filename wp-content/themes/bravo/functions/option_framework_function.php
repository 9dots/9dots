<?php
    require_once(get_template_directory() .'/bravo-options.php');
    
    function hexa_to_rgb($color)
    {
        if ($color[0] == '#')
            $color = substr($color, 1);

        if (strlen($color) == 6)
            list($r, $g, $b) = array($color[0].$color[1],
                                     $color[2].$color[3],
                                     $color[4].$color[5]);
        elseif (strlen($color) == 3)
            list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
        else
            return false;

        $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

        return array($r, $g, $b);
    }
    function alpha_level($opacity){
       $alpha_value =  dechex(floor($opacity*255));
       return $alpha_value;
    }
    function get_font($font_family){
        $font = explode('/', $font_family);
        $font_type = $font[0];
        $font_name = $font[1];
        $assign_font = array();

        if($font_type == 'google'){
            $google_font = explode(':',$font_name);
            $assign_font['name'] = $google_font[0];
            if($font_weight = filter_var($google_font[1], FILTER_SANITIZE_NUMBER_INT))
                $assign_font['weight'] =  $font_weight;
            
            if(strstr($google_font[1],'italic'))
                $assign_font['style'] = 'italic';
            
            return $assign_font;

              
        }
        else{
            $assign_font['name'] = $font_name;
            return $assign_font;
        }
        
    }
?>