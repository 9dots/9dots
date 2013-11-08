<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to be_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Bravo
 */
?>
	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php echo __('This post is password protected. Enter the password to view any comments.','bravo'); ?></p>
	</div><!-- #comments -->
	<?php
			return;
		endif;
	?>



	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title">
			<?php
				printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'bravo' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h4>
		<h6 class="sub-title light-bold light-bold-color"><?php _e('A comment is highly appreciated!','bravo'); ?></h6>
		<hr />

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e('Comment navigation','bravo'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments','bravo')); ?></div>
			<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;','bravo')); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'bravo_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
		<h1 class="assistive-text"><?php _e('Comment navigation','bravo'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments','bravo')); ?></div>
			<div class="nav-next"><?php next_comments_link( __('Newer Comments &rarr;','bravo')); ?></div>
		</nav>
		<?php endif; ?>

	<?php
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e('Comments are closed.','bravo'); ?></p>
	<?php endif; ?>
	<?php 
		$comments_args = array(
			// change the title of send button 
			'label_submit'=>__( 'Submit','bravo' ),
			// change the title of the reply section
			'title_reply'=>__( 'leave a comment','bravo' ),
			'comment_notes_before' => '<p class="comment-notes light-bold light-bold-color">' . __( 'A nice comment is very much appreciated!', 'bravo' ) . '</p><hr class="black" />',
			// remove "Text or HTML to be displayed after the set of comment fields"
			'comment_notes_after' => ''
			// redefine your own textarea (the comment body)
		);
	?>
	<?php comment_form($comments_args); ?>

</div><!-- #comments -->
