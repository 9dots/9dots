</div>
</div>
<footer id="footer">
	<div id="footer-widgets">
		<div class="container">
			<?php dynamic_sidebar('Footer'); ?>
			<div class="clearboth"></div>
		</div>
	</div>
	<div id="copyright" class="container">
		<?php if (wave_option('footer_copyright_text')): ?>
			<div class="source-org vcard copyright">
				<?php echo wave_option('footer_copyright_text'); ?>
			</div>
		<?php endif; ?>
		<?php if (has_nav_menu('footer')): ?>
			<?php wp_nav_menu(array(
				'theme_location' => 'footer',
				'container_id'   => "footer-menu",
				'depth'          => 1
			)); ?>
		<?php endif; ?>
		<ul class="socialmedia">
			<?php foreach (wave_get_active_social_media_channels() as $channel_id => $channel): ?>
				<li>
					<a href="<?php echo $channel['url']; ?>" target="_blank"><i class="icon-<?php echo $channel_id; ?>"></i></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="clearboth"></div>
	</div>
</footer>
<script>
jQuery('body').append(jQuery('<style type="text/css">').text('<?php Wave_Dynamic::print_css(); ?>'));
</script>
</div>
<?php wave_custom_js(); ?>
<?php wp_footer(); ?>
<?php do_action("wave_after_footer"); ?>
</body>
</html><?php do_action('wave_after_html'); ?>