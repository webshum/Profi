<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );
        ?>

        <?php if (!isArrayEmpty(get_field('color'))) : ?>
	        <input type="hidden" name="color_name" value="<?= get_field('color')[0]['title'] ?>">
	        <input type="hidden" name="color_image" value="<?= get_field('color')[0]['image']['url'] ?>">
	    <?php endif; ?>

       <!--  <div class="number-input">
        	<div class="inner">
	            <?php
	    		woocommerce_quantity_input(
	    			array(
	    				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
	    				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
	    				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
	    			)
	    		);
	            ?>
	            <div onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">
	                <svg width="11" height="6"><use xlink:href="#arr"></use></svg>
	            </div>
	            <div onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus">
	                <svg width="11" height="6"><use xlink:href="#arr"></use></svg>
	            </div>
	        </div>

	        <?php 
	        	$count = 0; 

	        	if (!empty(get_field('consumption', 'options'))) {
	        		$count = get_field('consumption', 'options');
	        	}
	        ?>

			<p data-count="<?= $count ?>"><?= __('Розхід на к-сть квадратів', 'sage') ?> <span><?= $count ?></span></p>
        </div> -->

        <?php
		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

</div>

<?php endif; ?>
