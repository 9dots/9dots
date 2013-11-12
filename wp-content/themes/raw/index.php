<?php get_header(); ?>
	<div id="content">
		<div class="box box-loop">
			<div class="column">
				<header class="archive-header">
					<?php if (wave_is_posts_page()): ?>
						<h1 class="archive-title"><?php _e("Blog", WAVE_TEXT_DOMAIN); ?></h1>
					<?php else: ?>
						<h1 class="archive-title"><?php wp_title("", true); ?></h1>
					<?php endif; ?>
					<?php if (category_description()): ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
					<?php endif; ?>
				</header>
				<div class="<?php echo(!wave_option('blog_sidebar_enable') ? "three_fourth" : "") ?>">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php get_template_part('parts/post/content', get_post_format()); ?>
					<?php endwhile; endif; ?>
					<div class="clearboth"></div>
				</div>
				<?php if (!wave_option('blog_sidebar_enable')): ?>
					<div class="one_fourth last">
						<div id="sidebar">
							<ul>
								<?php dynamic_sidebar('Blog Sidebar'); ?>
							</ul>
							<div class="clearboth"></div>
						</div>
					</div>
				<?php endif; ?>
				<div class="clearboth"></div>
				<div class="navigation">
					<div class="prev-posts"><?php next_posts_link('<i class="icon-angle-left"></i> ' . __('Older Posts', WAVE_TEXT_DOMAIN)); ?></div>
					<div class="next-posts"><?php previous_posts_link(__('Newer Posts', WAVE_TEXT_DOMAIN) . ' <i class="icon-angle-right"></i>'); ?></div>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>