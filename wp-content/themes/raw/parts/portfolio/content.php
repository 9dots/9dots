<?php
$project_images = get_post_meta(get_the_ID(), "wave_project_images");
$project_attributes = get_the_terms(get_the_ID(), "project-attributes");
$project_url = get_post_meta(get_the_ID(), "wave_project_url", true);
?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	<header class="post-header">
		<?php if (is_archive()) : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		<span class="sub"><?php the_time('F d, Y'); ?></span>
	</header>
	<div class="three_fourth">
		<div class="portfolio-slideshow flexslider">
			<ul class="slides">
				<?php foreach ($project_images as $attachment_id): ?>
					<li><img src="<?php echo wave_get_thumb_url($attachment_id, 814, 400); ?>" width="814"
					         height="400"/></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php if (!is_archive()) : ?>
		<div class="entry-navigation">
			<?php previous_post_link('%link', __('<i class="icon icon-angle-left"></i>&nbsp;&nbsp;Previous Project')); ?>
			<?php next_post_link('%link', __('Next Project&nbsp;&nbsp;<i class="icon icon-angle-right"></i>')); ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="one_fourth last">
		<div id="sidebar">
			<ul>
				<li class="project-content">
					<div>
						<?php the_content(); ?>
					</div>
				</li>
				<?php if (!empty($project_attributes)): ?>
					<li class="project-attributes">
						<div>
							<ul class="project-attributes arrows">
								<?php foreach ($project_attributes as $attribute): ?>
									<li><i class="icon-chevron-sign-right"></i><?php echo $attribute->name; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</li>
				<?php endif; ?>
				<?php if (!empty($project_url)): ?>
					<li class="project-url">
						<a class="button small"
						   href="<?php echo $project_url; ?>"><?php _e("Visit Project", WAVE_TEXT_DOMAIN); ?></a>
					</li>
				<?php endif; ?>
			</ul>
			<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
</article>