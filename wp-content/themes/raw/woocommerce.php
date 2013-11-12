<?php get_header(); ?>
<?php

$inline = new Wave_Inline('#main-content section.');

if (get_post_meta(wave_get_the_id(), "background_color", true)) {
	$inline->css('background-color', get_post_meta(wave_get_the_id(), "background_color", true));
}

if (get_post_meta(wave_get_the_id(), "background_image", true)) {
	$inline->css('background-image', 'url(' . wp_get_attachment_url(get_post_meta(wave_get_the_id(), "background_image", true)) . ')');
}

?>
	<section class="page-section <?php echo $inline->ueid(); ?>">
		<div class="column">
			<?php if (is_singular('product')): ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php woocommerce_get_template_part('content', 'single-product'); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php wave_page_title('h1'); ?>
				<?php do_action('woocommerce_archive_description'); ?>
				<?php if (have_posts()) : ?>
					<?php do_action('woocommerce_before_shop_loop'); ?>
					<?php woocommerce_product_loop_start(); ?>
					<?php woocommerce_product_subcategories(); ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php woocommerce_get_template_part('content', 'product'); ?>
					<?php endwhile; ?>
					<?php woocommerce_product_loop_end(); ?>
					<?php do_action('woocommerce_after_shop_loop'); ?>
				<?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after'  => woocommerce_product_loop_end(false)))) : ?>
					<?php woocommerce_get_template('loop/no-products-found.php'); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</section>
	<div class="clearboth"></div>
<?php get_footer(); ?>