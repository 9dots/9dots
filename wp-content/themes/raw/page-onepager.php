<?php
/*
Template Name: One Pager
*/

get_header();

$args = array(
	'post_type'   => "page",
	'post_parent' => get_the_ID(),
	'order'       => "ASC",
	'orderby'     => "menu_order"
);

query_posts($args);
?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<?php get_template_part("parts/one-page/section"); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>