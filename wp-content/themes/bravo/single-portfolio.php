<?php get_header(); 

while(have_posts()): the_post(); 
	$is_parallax = get_post_meta(get_the_ID(),'post_title_parallax',true);
	$background_image = get_post_meta(get_the_ID(),'post_bg_image',true);
	$background_pattern = get_post_meta(get_the_ID(),'post_bg_pattern',true);
	$background_color = get_post_meta(get_the_ID(),'post_bg_color',true);
	$background_color = !empty($background_color) ? $background_color : '#000';

	$background_repeat = get_post_meta(get_the_ID(),'post_bg_repeat',true);
	$background_repeat = !empty($background_repeat) ? $background_repeat : 'repeat';

	$background_attachment = get_post_meta(get_the_ID(),'post_bg_attachment',true);
	$background_attachment = !empty($background_attachment) ? $background_attachment : 'scroll';

	$background_position = get_post_meta(get_the_ID(),'post_bg_position',true);
	$background_position = !empty($background_position) ? $background_position : 'left top';

	if(isset($is_parallax) && $is_parallax == 1){
		$class = 'parallax';
		$background_attachment = 'fixed';
	}
		
	else {
		$class = 'no-parallax';
		$background_attachment = 'scroll';
	}	
	
	if(empty($background_image)){
		if(!empty($background_pattern)){
			$style = 'background:'.$background_color.' url('.$background_pattern.') '.$background_repeat.' '.$background_attachment.' '.$background_position;
		}
		else{
			$style = 'background:'.$background_color;
		}
	}
	else{
		$src = wp_get_attachment_image_src($background_image,'full');
		$style = 'background:'.$background_color.' url('.$src[0].') '.$background_repeat.' '.$background_attachment.' '.$background_position;
	}
	//echo $style;
?>
		<section class="section background-black <?php echo $class; ?>" style="<?php echo $style; ?>;padding:<?php echo get_post_meta(get_the_ID(),'post_title_padding',true); ?>px 0;">
			<div class="content-area">
				<h1 class="text-align-center color-white single-blog-title"><?php echo get_the_title(get_the_ID()); ?></h1>
				<hr class="white" />
				<div class="text-align-center color-white single-blog-detail"><?php previous_post_link('<span class="mini-arrow">&larr;</span> %link'); echo '<span class="link-sep">|</span>'; next_post_link('%link <span class="mini-arrow">&rarr;</span>'); ?></div>
			</div>
		</section>
	<?php
//	$content = apply_filters('the_content', get_post_meta(get_the_ID(),'_be_pb_content',true));
//	echo $content;
	?>
	<section class="section <?php echo $class; ?>">
		<div class="content-area clearfix">
			<div><?php the_content(); ?></div>
			<div class="rp-sep separator grey"></div>
			<div class="related-posts"><?php bravo_portfolio_related_posts(get_the_ID()); ?></div>
		</div>
	</section>
<?php endwhile; ?>

<?php get_footer(); ?><!-- Footer -->
