<?php

$parallax_enabled = get_post_meta(get_the_ID(), "enable_parallax", true) === "1";
$attributes = '';
$inline = new Wave_Inline('#main-content section.');

if (get_post_meta(get_the_ID(), "background_color", true)) {
	$inline->css('background-color', get_post_meta(get_the_ID(), "background_color", true));
}

if (get_post_meta(get_the_ID(), "background_image", true)) {
	if ($parallax_enabled) {
		$attributes .= ' data-parallax-background-ratio="0.7"';
		$attributes .= ' data-background-image="' . wp_get_attachment_url(get_post_meta(get_the_ID(), "background_image", true)) . '"';
		$attributes .= ' data-parallax-scale="true"';
	} else {
		$inline->css('background-image', 'url(' . wp_get_attachment_url(get_post_meta(get_the_ID(), "background_image", true)) . ')');
	}
}

?>
	<section class="page-section <?php echo $inline->ueid(); ?>"<?php echo $attributes; ?>
	         id="s-<?php wave_the_slug(); ?>">
		<div class="column">
			<?php wave_page_title(); ?>
			<?php the_content(); ?>
			<div class="clearboth"></div>
		</div>
	</section>
<?php if (get_post_meta(get_the_ID(), "enable_separator", true) === "1"): ?>
	<div
		class="full-width-separator <?php echo(get_post_meta(get_the_ID(), "enable_separator_parallax", true) === "1" ? " parallax" : ""); ?>"
		data-parallax-background-ratio="0.7"
		data-background-image="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), "separator_background", true)); ?>">
		<div
			class="content<?php echo(get_post_meta(get_the_ID(), "enable_separator_pattern", true) === "1" ? " pattern" : ""); ?>">
			<div class="column">
				<?php echo do_shortcode(wave_content_filter(get_post_meta(get_the_ID(), "separator_content", true))); ?>
			</div>
		</div>
	</div>
<?php endif; ?>