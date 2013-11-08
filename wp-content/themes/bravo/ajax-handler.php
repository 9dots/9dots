<?php
/**
 * Ajax Request handler for bravo
 */

	######### CONTACT FORM HANDLER ##########
	function contact_authentication() {
		$contact_name = $_POST['contact_name'];
		$contact_email = $_POST['contact_email'];
		$contact_website = $_POST['contact_website'];
		$contact_comment = $_POST['contact_comment'];
		if(empty($contact_name) || empty($contact_email) || empty($contact_comment)) {
			$result['status']="error";
			$result['data']= __('All fields are required','bravo');
		}
		else if(!preg_match ('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/', $contact_email)) {
			$result['status']="error";
			$result['data']=__('Please enter a valid email address','bravo');
		}
		else if(!empty($contact_name) && !empty($contact_email) && !empty($contact_comment)) {
			global $bravo_options;
			if(!empty($bravo_options['mail_id']))
				$to=$bravo_options['mail_id'];
			else
				$to=get_settings('admin_email');
			$subject=__('Enquiry From Website','bravo');
			$from = $contact_email;
			$headers = "From:" . $from;
			$message = "Name: ".$contact_name."\nEmail: ".$contact_email." \nWebsite: ".$contact_website." \nMessage: ".$contact_comment;
			mail($to,$subject,$message,$headers);
			$result['status']="sucess";
			$result['data']=__('Your message was sent sucessfully','bravo');
		}
		header('Content-type: application/json');
		echo json_encode($result);
		die();
	}
	######### BLOG ##########
	function get_blog() {
		extract($_POST);
		$output = '';
		$args = array(
		  'paged' => $blog_paged,
		);
		if(!(is_category() || is_archive() || is_tag() || is_search())) {
			query_posts($args);
		}
		if( have_posts() ) :
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
							$poster = '';
							if(has_post_thumbnail()){
								$id = get_post_thumbnail_id(get_the_ID());
								$img_src = wp_get_attachment_image_src( $attachment_id, 'blog-posts');
								$poster = 'poster="'.$img_src[0].'"';
							}
							$output .='<video  class="custom-video" src="'.$url.'" '.$poster.' controls="controls"></video>';
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
						$output .='<div class="home-slider flex-loading clearfix">';
						$output .='<div class="flexslider blog-flexslider">';
						$output .='<ul class="slides">';
						foreach ( $attachments as $attachment_id ) {
							$output .='<li>';
							$attach_img=wp_get_attachment_image_src($attachment_id, 'blog-posts');
							$output .='<img src="'.$attach_img[0].'" />';
							$output .='</li>';
						}
						$output .='</ul>';
						$output .='</div>';
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
					// $output .='<span class="blog-detail-sep"> | </span>';
					// $output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
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
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-posts');
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
		endif;
		echo $output;
	}
	function get_fullscreen_slider_slides() {
		extract($_POST);
		$result=array();
		if(empty($category))
			$tax_query = '';
		else
			$tax_query = array( array('taxonomy' => 'slider_categories',  'field' => 'slug', 'terms' => explode(',', $category), 'operator' => 'IN')  );
		$args = array(
			'post_type'=>'slider',
			'tax_query' => $tax_query,
			'posts_per_page' => -1
		);
		$flex_slides = new WP_Query($args);
		while ( $flex_slides->have_posts() ) :$flex_slides->the_post();
			if (has_post_thumbnail(get_the_ID()) ) { // check if the post has a Post Thumbnail assigned to it.
				$attachment_id = get_post_thumbnail_id(get_the_ID());
				$attachment_info=wp_get_attachment_image_src( $attachment_id,'full');
				$attachment_url = $attachment_info[0];
			}
			$temp_array=array();
			$temp_array['image']=$attachment_url;
			$temp_array['title'] ='<div class="slidecontent">'.apply_filters('the_content', get_the_content(get_the_ID())).'</div>';
			if(get_post_meta(get_the_ID(),'bravo-more-link',true)) {
				$temp_array['title'].='<a class="uppercase read-more-btn" href="'.get_post_meta(get_the_ID(),'bravo-more-link',true).'">'.__('Continue Reading','bravo').'</a>';
			}
			$temp_array['thumb']=$attachment_url;
			$temp_array['url']=$attachment_url;
			array_push($result,$temp_array);
		endwhile;
		wp_reset_query();
		header('Content-type: application/json');
		echo json_encode($result);
		die();
	}
	function get_musiclist() {
		$result=array();
		$args = array(
			'post_type'=>'music',
			'posts_per_page' => -1
		);
		$music = new WP_Query($args);
		while ( $music->have_posts() ) :$music->the_post();
			$attachment_id = get_post_thumbnail_id(get_the_ID());
			$attachment = wp_get_attachment_image_src( $attachment_id,'music-player');
			$mp3 = get_post_meta(get_the_ID(),'song_url');
			$song_url = '';
			if(!empty($mp3) && is_array($mp3)){
				$song_url = wp_get_attachment_url($mp3[0]);
			}
			$temp_array=array();
			$temp_array['mp3']= $song_url;
			$temp_array['title']=get_the_title(get_the_ID());
			$temp_array['duration']=get_post_meta(get_the_ID(),'duration',true);
			$temp_array['cover']=$attachment[0];
			array_push($result,$temp_array);
		endwhile;
		wp_reset_query();
		header('Content-type: application/json');
		echo json_encode($result);
		die();
	}


	add_action( 'wp_ajax_nopriv_contact_authentication', 'contact_authentication' );
	add_action( 'wp_ajax_contact_authentication', 'contact_authentication' );
	add_action( 'wp_ajax_nopriv_get_blog', 'get_blog' );
	add_action( 'wp_ajax_get_blog', 'get_blog' );
	add_action( 'wp_ajax_nopriv_get_fullscreen_slider_slides', 'get_fullscreen_slider_slides' );
	add_action( 'wp_ajax_get_fullscreen_slider_slides', 'get_fullscreen_slider_slides' );
	add_action( 'wp_ajax_nopriv_get_musiclist', 'get_musiclist' );
	add_action( 'wp_ajax_get_musiclist', 'get_musiclist' );
?>