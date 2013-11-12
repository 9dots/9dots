<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php get_template_part("parts/portfolio/project"); ?>
<?php endwhile; endif; ?>
<?php wave_navigation(); ?>
<?php get_footer(); ?>