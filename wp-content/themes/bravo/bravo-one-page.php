<?php
/*
Template Name: Single Page
*/
?>
<?php 
get_header();
	while(have_posts()): the_post();
		$content = apply_filters('the_content', get_post_meta(get_the_ID(),'_be_pb_content',true));
		echo $content;
	endwhile;	
get_footer(); 
?>