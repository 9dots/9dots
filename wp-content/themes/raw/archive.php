<?php get_header(); ?>
	<div id="content">
		<div class="box box-loop">
			<div class="column">
				<?php if (!is_home()): ?>
					<header class="archive-header">
						<h1 class="archive-title">
							<?php if (is_category()): ?>
								<?php _e('Archive for the', WAVE_TEXT_DOMAIN); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category', WAVE_TEXT_DOMAIN); ?>
							<?php elseif (is_tag()): ?>
								<?php _e('Posts Tagged', WAVE_TEXT_DOMAIN); ?> &#8216;<?php single_tag_title(); ?>&#8217;
							<?php elseif (is_day()): ?>
								<?php _e('Archive for', WAVE_TEXT_DOMAIN); ?> <?php the_time(__('F jS, Y', WAVE_TEXT_DOMAIN)); ?>
							<?php elseif (is_month()): ?>
								<?php _e('Archive for', WAVE_TEXT_DOMAIN); ?> <?php the_time(__('F, Y', WAVE_TEXT_DOMAIN)); ?>
							<?php elseif (is_year()): ?>
								<?php _e('Archive for', WAVE_TEXT_DOMAIN); ?> <?php the_time(__('Y', WAVE_TEXT_DOMAIN)); ?>
							<?php elseif (is_author()): ?>
								<?php _e('Author Archive', WAVE_TEXT_DOMAIN); ?>
							<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])): ?>
								<?php _e('Blog Archives', WAVE_TEXT_DOMAIN); ?>
							<?php else: ?>
								<?php post_type_archive_title(); ?>
							<?php endif; ?>
						</h1>
						<?php if (category_description()): ?>
							<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					</header>
				<?php endif; ?>
				<div class="<?php echo(wave_option('blog_sidebar_enable') ? "three_fourth" : "") ?>">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php get_template_part('parts/post/content'); ?>
					<?php endwhile; endif; ?>
					<div class="clearboth"></div>
				</div>
				<?php if (wave_option('blog_sidebar_enable')): ?>
					<div class="one_fourth last">
						<aside id="sidebar">
							<?php dynamic_sidebar('Blog Sidebar'); ?>
						</aside>
						<div class="clearboth"></div>
					</div>
				<?php endif; ?>
				<div class="clearboth"></div>
				<div class="navigation">
					<div class="prev-posts"><?php next_posts_link('<i class="icon-angle-left"></i>'); ?></div>
					<div class="next-posts"><?php previous_posts_link('<i class="icon-angle-right"></i>'); ?></div>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>