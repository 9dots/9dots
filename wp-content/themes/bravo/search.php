<?php get_header(); ?>
	<section class="section background-black">
		<div class="content-area">
			<?php get_template_part('page','title'); ?>
		</div>
	</section>
	<section class="section blog_module">
		<div class="content-area">
			<?php
				$output = '';
				if(isset($_GET['s']) && !empty($_GET['s'])) { 
					if( have_posts() ) {
						$output .='<div class="blog-posts-wrap"><div class="blog-posts clearfix centered-width">';
						while (have_posts() ) : the_post();
							$format = get_post_format();
							switch ($format) {
								case "image":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-posts');
									$url = $thumb['0'];
									if($url) {
										$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
										$output .='<img src="'.$url.'" />';
										$output .='</a>';
									}
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title text-align-center"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
									$output .='<p class="text-align-center">';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
								case "video":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									//$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
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
									//$output .='</a>';
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
									$output .='<p>';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='<hr />';
									$output .='<div class="blog-post-content">';
									$output .= get_the_excerpt();
									$output .='</div>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
									case "audio":
										$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
										$output .='<div class="image-wrap">';
										$url=get_post_meta(get_the_ID(),'audio_url',true);
										if(!empty($url)) {
											$output .='<audio class="audio" src="'.$url.'" controls="controls"></audio>';
										}
										$output .='</div>';
										$output .='<div class="blog-post-content-area-wrap">';
										$output .='<div class="blog-post-content-area">';
										$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
										$output .='<p>';
										$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
										$output .='<span class="blog-detail-sep"> | </span>';
										$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
										$output .='</p>';
										$output .='<hr />';
										$output .='<div class="blog-post-content">';
										$output .= get_the_excerpt();
										$output .='</div>';
										$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
										$output .='</div>';
										$output .='</div>';
										$output .='</div>';
										break;
								case "gallery":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									$args = array(
										'post_type' => 'attachment',
										'numberposts' => -1,
										'post_status' => null,
										'post_parent' => get_the_ID()
									);
									$attachments = get_post_meta(get_the_ID(),'gal_post_format');
									
									if(!empty($attachments)) {
										$output .='<div class="flexslider blog-flexslider">';
										$output .='<ul class="slides">';
										foreach ( $attachments as $attachment_id ) {
											$output .='<li>';
											$attach_img=wp_get_attachment_image_src($attachment_id, 'full');
											$output .='<img src="'.$attach_img[0].'" />';
											$output .='</li>';
										}
										$output .='</ul>';
										$output .='</div>';
									}
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
									$output .='<p>';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='<hr />';
									$output .='<div class="blog-post-content">';
									//$content = get_the_content(get_the_ID());
									$output .= get_the_excerpt(); //get_the_content(get_the_ID());
									$output .='</div>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
								case "quote":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).' quote">';
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title text-align-center"><a href="'.get_permalink(get_the_ID()).'">"'.get_post_meta(get_the_ID(),'quote_title',true).'"</a></h6>';
									$output .='<p class="quote-author text-align-center"><a href="'.get_post_meta(get_the_ID(),'quote_author_link',true).'">'.get_post_meta(get_the_ID(),'quote_author',true).'</a></p>';
									$output .='<p class="text-align-center">';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
								case "link":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title text-align-center"><a href="'.get_post_meta(get_the_ID(),'link_url',true).'" target="_blank">'.get_the_title().'</a></h6>';
									$output .='<p class="text-align-center">';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;					
								case "aside":
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<p>';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='</p>';
									$output .='<hr />';
									$output .='<div class="blog-post-content">';
									$output .= get_the_excerpt();
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
								default :
									$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
									$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()));
									$url = $thumb['0'];
									if($url) {
										$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
										$output .='<img src="'.$url.'" />';
										$output .='</a>';
									}
									$output .='<div class="blog-post-content-area-wrap">';
									$output .='<div class="blog-post-content-area">';
									$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
									$output .='<p>';
									$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
									$output .='<span class="blog-detail-sep"> | </span>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
									$output .='</p>';
									$output .='<hr />';
									$output .='<div class="blog-post-content">';

									$output .= get_the_excerpt();
									$output .='</div>';
									$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
									$output .='</div>';
									$output .='</div>';
									$output .='</div>';
									break;
							}
							
						endwhile;
						$output .='</div>';
						$count_posts = wp_count_posts('post');
					}
					else
						$output .='<h4>'.__('Apologies, but no results were found. Perhaps searching with a different query will help find a related post.','bravo').'</h4>';
				}
				else
					echo '<h4> '.__('Sorry, Please enter a search query','bravo').'</h4>';
				wp_reset_query();
				echo $output;
			?>
		</div>
	</section>
<?php get_footer(); ?><!-- Footer -->