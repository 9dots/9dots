<?php
	class BE_Widget_Recent_Posts extends WP_Widget {

		function __construct() {
			$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site",'bravo') );
			parent::__construct('recent-posts', __('Recent Posts','bravo'), $widget_ops);
			$this->alt_option_name = 'widget_recent_entries';

			add_action( 'save_post', array(&$this, 'flush_widget_cache') );
			add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
			add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
		}

		function widget($args, $instance) {
			$cache = wp_cache_get('widget_recent_posts', 'widget');

			if ( !is_array($cache) )
				$cache = array();

			if ( ! isset( $args['widget_id'] ) )
				$args['widget_id'] = $this->id;

			if ( isset( $cache[ $args['widget_id'] ] ) ) {
				echo $cache[ $args['widget_id'] ];
				return;
			}

			ob_start();
			extract($args);

			$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts','bravo') : $instance['title'], $instance, $this->id_base);
			$number = absint($instance['number']);
			if ( empty( $number ) )
				$number = 3;

			 query_posts(array('posts_per_page' => $number,'numberposts'=>$number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
			if (have_posts()) :
	?>
			<?php echo $before_widget; ?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>
			<div class="widget">
			<ul class="recent-posts">
			<?php  while (have_posts()) : the_post(); ?>
			<li class="clearfix recent-post">
				<div class="recent-post-image left">
					<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
						<?php 
							if(get_the_post_thumbnail(get_the_ID(),"recent-post-widget")) {
								echo get_the_post_thumbnail(get_the_ID(),"recent-post-widget");
							}
							else {
								echo '<img src="'.get_bloginfo('template_url').'/img/placeholder.png" alt="Empty"/>';
							} ?>
					</a>
				</div>
				<div class="recent-post-content left">
					<p><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php echo trim_content(get_the_title(),100); ?></a></p>
					<span class="recent-post-time"><?php echo get_the_date( "F j, Y" );?></span>  |  <a href="<?php the_permalink() ?>/#comments" class="recent-post-comment-count"><span><?php echo get_comments_number(); ?> <?php _e('Comments','bravo'); ?></span></a>
				</div>
			</li>
			<?php endwhile; ?>
			</ul>
			</div>
			<?php echo $after_widget; ?>
	<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_query();

			endif;

			$cache[$args['widget_id']] = ob_get_flush();
			wp_cache_set('widget_recent_posts', $cache, 'widget');
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = (int) $new_instance['number'];
			$this->flush_widget_cache();

			$alloptions = wp_cache_get( 'alloptions', 'options' );
			if ( isset($alloptions['widget_recent_entries']) )
				delete_option('widget_recent_entries');

			return $instance;
		}

		function flush_widget_cache() {
			wp_cache_delete('widget_recent_posts', 'widget');
		}

		function form( $instance ) {
			$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
			$number = isset($instance['number']) ? absint($instance['number']) : 5;
	?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','bravo'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

			<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','bravo'); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
	<?php
		}
	}
	register_widget('BE_Widget_Recent_Posts');
?>