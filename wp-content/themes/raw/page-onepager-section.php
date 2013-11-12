<?php
/*
Template Name: Page Section
*/
get_header();
?>
	<div class="main-column">
		<div id="sections">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
				<?php get_template_part("parts/one-page/section"); ?>
			<?php endwhile; endif; ?>
		</div>
	</div>
<?php get_footer(); ?>