<?php get_header(); ?>
	<div id="content">
		<div class="box box-loop">
			<div class="column">
				<header class="archive-header">
					<h1 class="archive-title"><?php printf(__('Tag: %s', WAVE_TEXT_DOMAIN), '<span>' . single_cat_title('', false) . '</span>'); ?></h1>
					<?php if (category_description()): ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
					<?php endif; ?>
				</header>
				<div class="three_fourth">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php get_template_part('content', get_post_format()); ?>
					<?php endwhile; endif; ?>
					<div class="clearboth"></div>
				</div>
				<div class="one_fourth last">
					<div id="sidebar">
						<ul>
							<?php dynamic_sidebar('Blog Sidebar'); ?>
						</ul>
						<div class="clearboth"></div>
					</div>
				</div>
				<div class="clearboth"></div>
				<div class="navigation">
					<div
						class="prev-posts"><?php next_posts_link('<i class="icon-angle-left"></i> ' . __('Older Posts', WAVE_TEXT_DOMAIN)); ?></div>
					<div
						class="next-posts"><?php previous_posts_link(__('Newer Posts', WAVE_TEXT_DOMAIN) . ' <i class="icon-angle-right"></i>'); ?></div>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>