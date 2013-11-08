<?php get_header(); ?>
	<section class="section background-black">
		<div class="content-area">
			<h1 class="color-white text-align-center"><?php bloginfo('name'); ?></h1>
		</div>
	</section>
	<section class="section blog_module">
		<div class="content-area">
			<?php echo do_shortcode('[blog]'); ?>
		</div>
	</section>
<?php get_footer(); ?><!-- Footer --> 