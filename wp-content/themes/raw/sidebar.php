 <aside id="sidebar">
    <?php if (!function_exists('dynamic_sidebar') && !dynamic_sidebar('Sidebar Widgets')) : else : ?>
     	<?php get_search_form(); ?>
       	<h2><?php _e('Archives', WAVE_TEXT_DOMAIN); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	<h2><?php _e('Subscribe', WAVE_TEXT_DOMAIN); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)', WAVE_TEXT_DOMAIN); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)', WAVE_TEXT_DOMAIN); ?></a></li>
    	</ul>
	<?php endif; ?>
</aside>