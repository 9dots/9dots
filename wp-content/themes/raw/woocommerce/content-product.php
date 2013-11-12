<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>


    <?php
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
    do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>

    <div class="catalog-image">
    <a href="<?php the_permalink(); ?>">
		    <?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */


            ?>
            <div class="product-image">
            <?php echo woocommerce_get_product_thumbnail(); ?>
            </div>
            <div class="product-image">
            <?php

            $attachment_ids = $product->get_gallery_attachment_ids();
            $attachment_image = "";

            if(!empty($attachment_ids)){
                $attachment_id = $attachment_ids[0];
                $attachment_image = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class' => "secondary-thumb"));
                echo $attachment_image;
            }

            if(empty($attachment_image)){
                echo woocommerce_get_product_thumbnail();
            }

		    ?>
        </div>
    </a>
        </div>

     <a href="<?php the_permalink(); ?>">

		<h3><?php the_title(); ?></h3>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	</a>

    <div class="product-buttons">
        <?php woocommerce_get_template('loop/add-to-cart.php'); ?>
        <a href="<?php the_permalink(); ?>" class="show_details_button"><?php _e('Show details', WAVE_TEXT_DOMAIN); ?></a>
        <div class="clearboth"></div>
    </div>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>