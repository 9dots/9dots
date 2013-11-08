<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Bravo
 * 
 */
?>
<?php 
get_header();
	?>
	<div class="content-area">
		<section class="section post error404 not-found">
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'bravo' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'bravo' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->
	</div>
	<?php
get_footer(); 
?>