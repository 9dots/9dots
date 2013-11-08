<?php
class BE_twitter extends WP_Widget {
	function BE_twitter() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __('A list of your tweets','bravo') );
		$this->WP_Widget('twitter', __('Twitter','bravo'), $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? '' : apply_filters('title', $instance['title']);
		$id = empty($instance['id']) ? ' ' : apply_filters('id', $instance['id']);
		$count= empty($instance['count']) ? ' ' : apply_filters('count', $instance['count']);
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		$output="";
		$output .='<div class="widget"><ul class="tweet-lists">';
						$trends_url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=".$id."&count=".$count;
						$error = false;
						if ( false === ( $response = get_transient( 'tweets' ) ) ) {
							 $response = wp_remote_get($trends_url);
								if( is_wp_error( $response ) ) {
								 	$error = true;
								} 
								else {
									$response = json_decode($response['body'],true);
										if(empty($response['error'])){
										 	set_transient('tweets',$response,60*60*12);
										}
										else{
										    $error = true; 
										}
								}
						}
						if(is_array($response) && !$error){
							foreach($response as $status) {
								$tweets = explode(' ', $status['text']);
								foreach($tweets as $tweet) {
									//if(substr_compare($tweet, "http://", 0, 6)==0){
									if(preg_match("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i", $tweet)) {
										$tweet_link = '<a href="'.$tweet.'">'.$tweet.'</a>';
										$status['text'] = str_replace($tweet, $tweet_link,$status['text']);
									}
								}
								$output .='<li class="clearfix tweet-list">
											<p>'.$status['text'].'</p>
											<a href="https://twitter.com/'.$id.'/status/'.$status['id_str'].'" class="tweet-time">'.date('d M Y',strtotime($status['created_at'])).'</a>
											<span class="twitter_icon"><i class="icon-twitter"></i></span>
											</li>';
							}	
						}
						else {
							$output .= __('<li>Tweets not available at this time. Please Try again later</li>','bravo');
						}
						
						$output .='</ul></div>';
			echo $output;
			echo $after_widget;
		}
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['id'] = strip_tags($new_instance['id']);
			$instance['count'] = strip_tags($new_instance['count']);
			return $instance;
		}
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '','id' => '','count' => '' ) );
			$title = strip_tags($instance['title']);
			$id = strip_tags($instance['id']);
			$count = strip_tags($instance['count']);
			?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','bravo'); ?><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
				<p><label for="<?php echo $this->get_field_id('id'); ?>"><?php _e('Twitter ID','bravo'); ?><input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo esc_attr($id); ?>" /></label></p>
				<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Count','bravo'); ?><input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo esc_attr($count); ?>" /></label></p>
			<?php
		}
	}
	register_widget('BE_twitter');
?>