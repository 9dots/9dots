<?php

class Wave_Widget_RecentPosts extends WP_Widget
{

	public function __construct() {

		$args = array('description' => __("A Portfolio Widget", WAVE_TEXT_DOMAIN));

		parent::__construct("wave_widget_recent_posts", WAVE_THEME_NAME . " - Recent Posts", $args);
	}

	public function widget($args, $instance) {
		
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] . $args['after_title'];
		echo  '<ul class="wave-widget-recent-posts">';
		
		$query = new WP_Query(array('posts_per_page' => $instance['number'], 'post_type' => "post"));
		
		if($query->have_posts()){
			while($query->have_posts()){
				
				$query->the_post();
				
				echo  '<li>';
				
				echo '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
				
				if($instance['show-thumb'] == "1"){
					echo '<div class="thumb">';
					if(has_post_thumbnail()){
						echo get_the_post_thumbnail(get_the_ID(), array(32, 32));
					}
					echo '</div>';
				}
				
				echo '<span class="title">' . get_the_title() . '</span>';
				echo '<br />';
				echo '<span class="date">' . get_the_date() . '</span>';
				
				echo '</a>';
				
				echo '</li>';
				
			}
		}
		
		echo  '</ul>';
		echo '<div class="clearboth"></div>';
		echo $args['after_widget'];
		
		wp_reset_postdata();
		
	}

	public function form($instance) {
		
		if(empty($instance['title'])){
			$instance['title'] = __('Recent Posts', WAVE_TEXT_DOMAIN);
		}
		
		if(empty($instance['number'])){
			$instance['number'] = 5;
		}
		
		if(empty($instance['show-thumb'])){
			$instance['show-thumb'] = true;
		}
		
		echo  '<p>';
		echo  '<label for="' . $this->get_field_id('title') . '">' . __('Title', WAVE_TEXT_DOMAIN) . '</label>';
		echo  '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $instance['title'] . '" />';
		echo  '<p>';
		
		echo  '<p>';
		echo  '<label for="' . $this->get_field_name('number') . '">' . __('Number of projects to show: ', WAVE_TEXT_DOMAIN) . '</label>';
		echo  '<input type="text" size="3" value="' . $instance['number'] . '" name="' . $this->get_field_name('number') . '" id="' . $this->get_field_id('number') . '" />';
		echo  '</p>';
		
		
		echo  '<p>';
		echo  '<input id="' . $this->get_field_id('show-thumb') . '" name="' . $this->get_field_name('show-thumb') . '" type="checkbox" value="1" ' . checked('1', $instance['show-thumb'], false) . ' />';
		echo  '<label for="' . $this->get_field_name('show-thumb') . '"> ' .  __('Show Thumb', WAVE_TEXT_DOMAIN) . '</label>';
		echo  '</p>';
		
	}

	public function update($new_instance, $old_instance) {
		
		$instance = array();
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['show-thumb'] = $new_instance['show-thumb'];
		
		return $instance;
		
	}

}
