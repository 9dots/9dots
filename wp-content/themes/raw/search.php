<?php get_header(); ?>
	<div id="content">
		<div class="box box-loop">
			<div class="column">
				<?php if (!is_home()): ?>
					<header class="archive-header">
						<h1 class="archive-title">
							<?php echo __('Results For', WAVE_TEXT_DOMAIN); ?>
							<span>&quot;<?php the_search_query(); ?>&quot;</span>
						</h1>
						<?php if (category_description()): ?>
							<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					</header>
				<?php endif; ?>
				<div>
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php get_template_part('content', get_post_format()); ?>
					<?php endwhile; endif; ?>
					<div class="clearboth"></div>
				</div>
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