<?php get_header(); ?>
	<div id="content">
		<div class="box box-loop">
			<div class="column">
				<header class="archive-header">
					<h1 class="archive-title">ssSss
						<?php post_type_archive_title(); ?>
					</h1>
				</header>
				<div>
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php get_template_part('parts/portfolio/content'); ?>
					<?php endwhile; endif; ?>
					<div class="clearboth"></div>
				</div>
				<div class="clearboth"></div>
				<div class="navigation">
					<div class="prev-posts"><?php next_posts_link('<i class="icon-angle-left"></i> ' . __('Older Projects', WAVE_TEXT_DOMAIN)); ?></div>
					<div class="next-posts"><?php previous_posts_link(__('Newer Projects', WAVE_TEXT_DOMAIN) . ' <i class="icon-angle-right"></i>'); ?></div>
				</div>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>