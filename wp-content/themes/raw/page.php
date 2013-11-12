<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<?php get_template_part('parts/one-page/section'); ?>
<?php endwhile; endif; ?>
	<div class="clearboth"></div>
<?php get_footer(); ?>