<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Paws
 * 
 */  ?>
<div class="sidebar widgets last"> <!-- Right Sidebar -->
	<?php
		if ( is_active_sidebar( 'right-sidebar' ) ) :
		dynamic_sidebar( 'right-sidebar' );
		endif;
	?>
</div>