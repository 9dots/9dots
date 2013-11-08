<?php
/*
 *  The Default template for displaying a Page.
 * 
 *
*/
?>
<?php get_header(); 

while(have_posts()): the_post(); ?>
	<section class="section background-black">
		<div class="content-area">
			<?php get_template_part('page','title'); ?>
		</div>
	</section>
	<section class="section">
		<div class="content-area clearfix">
			<div class="clearfix">
				<?php the_content(); ?>
			</div>
			<div class="bravo-comments">
				<?php comments_template( '', true ); ?>
			</div>	
		</div>
	</section>
<?php endwhile; ?>
<?php get_footer(); ?><!-- Footer --> 