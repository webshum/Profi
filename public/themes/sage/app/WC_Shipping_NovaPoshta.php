<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'woocommerce_shipping_init', 'nova_poshta_shipping_method_init' );

function nova_poshta_shipping_method_init() {
    class WC_Shipping_NovaPoshta extends WC_Shipping_Method {
        public function __construct() {
            $this->id                 = 'nova_poshta_shipping';
            $this->method_title       = __( 'Nova Poshta Shipping', 'woocommerce' );
            $this->method_description = __( 'Shipping Nova Poshta API', 'woocommerce' );

            $this->enabled            = 'yes';
            $this->title              = 'Нова Пошта';

            $this->init();
        }

        function init() {
            $this->init_form_fields();
            $this->init_settings();

            add_action( 'woocommerce_update_options_shipping_' . $this->id, [ $this, 'process_admin_options' ] );
        }

        public function calculate_shipping( $package = [] ) {
            $cost = 0;

            $rate = [
                'id'    => $this->id,
                'label' => $this->title,
                'cost'  => $cost,
                'calc_tax' => 'per_order',
            ];

            $this->add_rate( $rate );
        }
    }
}

add_filter( 'woocommerce_shipping_methods', function( $methods ) {
    $methods['nova_poshta_shipping'] = 'WC_Shipping_NovaPoshta';
    return $methods;
});

add_action('woocommerce_after_checkout_billing_form', function () {
    $product_colors = [];

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product_id = $cart_item['product_id'];

        if (isset($cart_item['color_name']) || isset($cart_item['color_image'])) {
            $product_colors[$cart_item_key] = [
                'product_id'   => $product_id,
                'color_name'   => $cart_item['color_name'] ?? '',
                'color_image'  => $cart_item['color_image'] ?? '',
            ];
        }
    }

    echo '<div id="np-checkout">';
    echo '<checkout :product-colors=\'JSON.parse(decodeURIComponent("' . rawurlencode(json_encode($product_colors)) . '"))\'></checkout>';
    echo '</div>';
});
