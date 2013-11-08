		<?php
			global $bravo_options;
		?>
		<section class="section bottom-widget">
			<div class="content-area clearfix">
				<?php
					if ( is_active_sidebar( 'bottom-widget' ) ) :
						dynamic_sidebar( 'bottom-widget' );
					endif;
				?>
			</div>
		</section>
		<footer class="footer">
			<div class="content-area">
				<p><?php echo $bravo_options['copyright_text']; ?></p>
				<div class="bottom-widget-controller"><i class="icon-angle-up"></i></div>
			</div>
			
		</footer>
		<input type="hidden" id="ajax_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>" />
		<input type="hidden" id="template_url" value="<?php echo get_template_directory_uri(); ?>" />
		<?php wp_footer(); ?>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','<?php echo $bravo_options['google_analytics_code'];  ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
		<!-- Option Panel Custom JavaScript -->
		<script>
			jQuery(document).ready(function(){
				<?php echo stripslashes_deep(htmlspecialchars_decode($bravo_options['custom_js'],ENT_QUOTES));  ?>
			});
		</script>
		
    </body>
</html>