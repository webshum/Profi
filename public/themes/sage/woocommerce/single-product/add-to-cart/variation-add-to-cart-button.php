<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );
	?>

	<!-- <div class="number-input">
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

        <p data-count="<?= $count ?>">розхід на к-сть квадратів <span><?= $count ?></span></p>
	</div> -->

	<?php
	do_action( 'woocommerce_after_add_to_cart_quantity' );
	?>

	<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
