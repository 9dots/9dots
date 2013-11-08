<?php
/*
Template Name: Right Sidebar Page
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
			<div class="single-page-left-content left"> <!-- Right Sidebar -->
				<div class="post-content clearfix">
					<?php the_content(); ?>
				</div>
				<div class="bravo-comments">
					<?php comments_template( '', true ); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>  <!--  Get Right Sidebar -->
		</div>
	</section>
<?php endwhile; ?>
<?php get_footer(); ?><!-- Footer --> 				