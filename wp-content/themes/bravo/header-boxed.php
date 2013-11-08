	<?php global $bravo_options; 
		if(isset($bravo_options['sticky_header']) && $bravo_options['sticky_header']=='on')
			$sticky_header = 'sticky';
		else
			$sticky_header ='';
	?>
	<header class="header <?php echo $sticky_header; ?> boxed">
			<div class="content-area clearfix">
				<div class="logo">
					<a href="<?php echo site_url(); ?>"> <img src="<?php echo $bravo_options['logo']; ?>" alt="" /></a>
				</div>
				<?php
				if(is_category() || is_archive() || is_tag() || is_search() || is_single())
					$menu_type ='redirect';
				else
					$menu_type ='render';
				$defaults = array(
						'container'       => 'nav',
						'theme_location' => 'header',
						'menu'=>'header', 
						'container_class' => 'clearfix', 
						'container_id'    => 'navigation',
						'menu_id'      => 'menu',
						'menu_class'      => 'clearfix  '.$menu_type,
						'fallback_cb'     => 'false'
					);
					wp_nav_menu( $defaults );
				?> <!-- End Navigation -->
			</div>
		</header>