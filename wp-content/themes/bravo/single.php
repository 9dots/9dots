<?php
/*
 *  The template for displaying a Blog Post.
 * 
 *
*/
?>
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
	$format = get_post_format();
	if($format == 'quote'){
		$title = get_post_meta(get_the_ID(),'quote_title',true);
	}
	else{
		$title = get_the_title(get_the_ID());
	}
?>
		<section class="section background-black <?php echo $class; ?>" style="<?php echo $style; ?>;padding:<?php echo get_post_meta(get_the_ID(),'post_title_padding',true); ?>px 0px;">
			<div class="content-area">
				<h1 class="text-align-center color-white single-blog-title"><?php echo $title; ?></h1>
				<?php 
				if($format == 'quote')
					echo '<p class="quote-author text-align-center color-white"><a href="'.get_post_meta(get_the_ID(),'quote_author_link',true).'">'.get_post_meta(get_the_ID(),'quote_author',true).'</a></p>';
				?>
				<hr class="white" />
				<div class="text-align-center color-white single-blog-detail"><span class="post-labels"><?php the_time(get_option( 'date_format' )); ?></span><span class="backslash"> | </span><span class="post-labels"><?php _e('Posted under','bravo'); ?></span><?php beat_get_the_category_list(get_the_ID()); ?> </div>
			</div>
		</section>
		<section class="section <?php echo $class; ?>">
			<div class="content-area clearfix">
				<div class="single-page-left-content left"> <!-- Right Sidebar -->
					<div class="post-content clearfix">
						<?php
							
							$output ='';
							switch ($format) {
								case "image":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									if(has_post_thumbnail()){
										echo get_the_post_thumbnail( get_the_ID(), 'single-blog' );
									}
									break;								
								case "gallery":
									$attachments = get_post_meta(get_the_ID(),'gal_post_format');
									if(!empty($attachments)) {
										$output .='<div class="home-slider flex-loading clearfix"><i class="icon-cog icon-spin"></i>';
										$output .='<div class="flexslider blog-flexslider">';
										$output .='<ul class="slides">';
										foreach ( $attachments as $attachment_id ) {
											$output .='<li>';
											$attach_img=wp_get_attachment_image_src($attachment_id, 'single-blog');
											$output .='<img src="'.$attach_img[0].'" />';
											$output .='</li>';
										}
										$output .='</ul>';
										$output .='</div>';
										$output .='</div>';
									}
									echo $output;
								break;

								case "audio":
									$output .='<div class="image-wrap">';
									$url=get_post_meta(get_the_ID(),'audio_url',true);
									if(!empty($url)) {
										$output .='<audio class="audio" src="'.$url.'" controls="controls"></audio>';
									}
									$output .='</div>';
									echo $output;
									break;

								case "video":
									$output .='<div class="image-wrap">';
									$url=get_post_meta(get_the_ID(),'video_url',true);
									if(!empty($url)) {
										$videoType=be_video_type($url);
										if($videoType == "youtube") {
											if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
												$video_id = $match[1];
											}
											$output.='<iframe width="940" height="450" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0" allowfullscreen></iframe>';
										}
										elseif($videoType == "vimeo") {
											sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
											$output.='<iframe src="http://player.vimeo.com/video/'.$video_id.'" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
										}
										else{
											$output .='<video  class="custom-video" src="'.$url.'" controls="controls"></video>';
										}
									}
									$output .='</div>';
									echo $output;
									break;										
							}			
						?>

						<?php the_content();
						$args = array(
						    	'before'           => '<div class="pages_list">' . __('Pages:','bravo'),
								'after'            => '</div>',
								'link_before'      => '',
						    	'link_after'       => '',
								'next_or_number'   => 'number',
								'nextpagelink'     => __('Next page','bravo'),
								'previouspagelink' => __('Previous page','bravo'),
								'pagelink'         => '%',
								'echo'             => 1 );
						wp_link_pages( $args );
						?>
					</div>
					<div class="rp-sep separator grey"></div>
					<div class="related-posts">
						<?php bravo_related_posts(get_the_ID()); ?>
					</div>
					<div class="rp-sep separator grey"></div>
					<div class="bravo-comments">
							<?php comments_template( '', true ); ?>
					</div> <!--  End Page Comments --> 
				</div>
				<?php get_sidebar(); ?>  <!--  Get Right Sidebar -->
			</div>
		</section>
<?php endwhile; ?>

<?php get_footer(); ?><!-- Footer -->