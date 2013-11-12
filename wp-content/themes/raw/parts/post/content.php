<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<header>
		<?php if (is_single()): ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else: ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		<?php echo __("Posted by", WAVE_TEXT_DOMAIN); ?>
		<?php the_author_posts_link(); ?>
		|
		<?php the_category(', '); ?>
		|
		<?php the_time('F d, Y'); ?>
	</header>
	<?php if (has_post_thumbnail()): ?>
		<div class="entry-thumb">
			<img src="<?php echo wave_get_post_thumb_url(get_the_ID(), 814, 400); ?>" alt=""/>
		</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php if (is_single()): ?>
			<?php the_content(__("Continue reading ", WAVE_TEXT_DOMAIN)); ?>
		<?php else: ?>
			<?php the_excerpt(); ?>
			<a class="button small" href="<?php the_permalink() ?>"><?php _e("Read More", WAVE_TEXT_DOMAIN) ?></a>
		<?php endif; ?>
	</div>
	<?php if (is_single()): ?>
		<div class="entry-tags">
			<?php the_tags(); ?>
		</div>
		<div class="entry-pagination">
			<?php wp_link_pages(array('before'         => __('Pages: ', WAVE_TEXT_DOMAIN),
			                          'next_or_number' => 'number'
			)); ?>
		</div>
		<div class="entry-navigation">
			<?php previous_post_link('%link', __('<i class="icon icon-angle-left"></i>&nbsp;&nbsp;Previous Post')); ?>
			<?php next_post_link('%link', __('Next Post&nbsp;&nbsp;<i class="icon icon-angle-right"></i>')); ?>
		</div>
	<?php endif; ?>
</article>