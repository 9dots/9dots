<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;
global $comment;

if(!isset($comment)){
	$comment = null;
}

$rating = esc_attr( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div class="comment-author vcard">
		<div class="avatar"><?php echo get_avatar( $comment, array(32, 32)); ?></div>
		<div class="author">
			<?php comment_author_link(); ?>
			<?php if ( get_option('woocommerce_review_rating_verification_label') == 'yes' ): ?>
				<?php if ( woocommerce_customer_bought_product($comment->comment_author_email, $GLOBALS['comment']->user_id, $post->ID ) ): ?>
					<?php echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> '; ?>
				<?php endif; ?>
			<?php endif; ?>
			</div>
		<div class="date">
			<a href="<?php htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __('%1$s at %2$s', 'woocommerce'), get_comment_date(),  get_comment_time()); ?></a>
		</div>
		<div class="clearboth"></div>
	</div>
	
	
	<div id="comment-<?php comment_ID(); ?>" class="comment-body">
		<div class="comment-text">
			<?php if ( get_option('woocommerce_enable_review_rating') == 'yes' ) : ?>
				<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'woocommerce' ), $rating) ?>">
					<span style="width:<?php echo ( intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo intval( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) ); ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ($comment->comment_approved == '0') : ?>
				<p class="meta"><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>
			<?php endif; ?>

				<div itemprop="description" class="description"><?php comment_text(); ?></div>
				<div class="clear"></div>
			</div>
		<div class="clear"></div>
	</div>
