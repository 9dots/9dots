<?php get_header(); ?>
	<section class="section background-black">
		<div class="content-area">
			<?php get_template_part('page','title'); ?>
		</div>
	</section>
	<section class="section blog_module">
		<div class="content-area">
			<?php echo do_shortcode('[blog]'); ?>
		</div>
	</section>
<?php get_footer(); ?><!-- Footer -->