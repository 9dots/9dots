<div id="header-top-wrapper">
	<div id="header-top">
		<div id="header-top-content">
			<div id="header-top-left">
				<?php if (wave_option('header_topbar_language_switcher_enabled', false)): ?>
					<?php do_action('icl_language_selector'); ?>
				<?php endif; ?>
				<?php if (has_nav_menu('header-top-left')): ?>
					<?php wp_nav_menu(array('theme_location'  => 'header-top-left',
					                        'menu_class'      => 'header-top-left',
					                        'container_class' => "header-top-left header-top-menu",
					                        'depth'           => 1
					)); ?>
				<?php endif; ?>
			</div>
			<div id="header-top-right">
				<?php if (has_nav_menu('header-top-right')): ?>
					<?php wp_nav_menu(array('theme_location'  => 'header-top-right',
					                        'menu_class'      => 'header-top-right',
					                        'container_class' => "header-top-right header-top-menu",
					                        'depth'           => 1
					)); ?>
				<?php endif; ?>
				<?php if (wave_option('header_topbar_social_media_icons_enabled', false)): ?>
					<ul class="socialmedia">
						<?php foreach (wave_get_active_social_media_channels() as $channel_id => $channel): ?>
							<li><a href="<?php echo $channel['url']; ?>" target="_blank"><i
										class="icon-<?php echo $channel_id; ?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php if (wave_option('style_header_topbar_line_enabled', false)): ?>
	<div id="header-top-line"></div>
<?php endif; ?>