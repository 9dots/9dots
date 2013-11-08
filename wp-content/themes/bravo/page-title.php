<header id="page-title">
	<h1 class="text-align-center color-white single-blog-title">
		<?php if(is_single()) { 
			 _e('Welcome to our Blog','bravo'); 
		} 
		elseif(is_category()) {
			echo __('Category: ','bravo').single_cat_title( '', false );
		}
		elseif(is_archive()) {
			if ( is_day() ) :
				printf( __( 'Daily Archives: <span>%s</span>', 'bravo' ), get_the_date() ); 
			elseif ( is_month() ) :
				printf( __( 'Monthly Archives: <span>%s</span>', 'bravo' ), get_the_date( 'F Y' ) ); 
			elseif ( is_year() ) : 
				printf( __( 'Yearly Archives: <span>%s</span>', 'bravo' ), get_the_date( 'Y' ) ); 
			else : 
				_e( 'Blog Archives', 'bravo' );
			endif; 
		}
		elseif(is_tag()){
			echo __('Articles Tagged with: ','bravo').single_tag_title( '', false );
		}
		elseif (is_search()) {
			echo __('Search Results for: ','bravo').get_search_query();
		}
		else {
			the_title();
		}  ?>
	</h1>
</header>  <!--  End  Page Title -->