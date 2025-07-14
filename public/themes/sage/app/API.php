<?php

add_action('rest_api_init', function () {
    register_rest_route('myshop/v1', '/submit-order', [
        'methods'  => 'POST',
        'callback' => 'handle_vue_order',
        'permission_callback' => '__return_true'
    ]);
});

function handle_vue_order(WP_REST_Request $request) {
    $data = $request->get_json_params();
    $order = wc_create_order();
    $colors = $data['colors'] ?? [];

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $product = $cart_item['data'];
        $quantity = $cart_item['quantity'];
        $order_item_id = $order->add_product($product, $quantity);

        if (isset($colors[$cart_item_key])) {
            $color = $colors[$cart_item_key];

            if (!empty($color['color_name'])) {
                wc_add_order_item_meta($order_item_id, 'Color', sanitize_text_field($color['color_name']));
            }

            if (!empty($color['color_image'])) {
                $image_url = esc_url_raw($color['color_image']);
                wc_add_order_item_meta($order_item_id, 'Image', "<img width='50' height='20' src='{$image_url}'>");
            }
        }
    }

    $order->set_address([
        'first_name' => $data['name'],
        'phone'      => $data['phone'],
        'email'      => 'no-reply@example.com',
    ], 'billing');

    $order->update_meta_data('np_region', $data['region']);
    $order->update_meta_data('np_city', $data['city']);
    $order->update_meta_data('np_warehouse', $data['warehouse']);

    $order->set_customer_note( $data['order_comments'] ?? '' );

    $order->calculate_totals();
    $order->update_status('processing');
    $order->save();

    $order_id = $order->get_id();
    $order_key = $order->get_order_key();

    WC()->mailer()->emails['WC_Email_New_Order']->trigger($order_id);
    WC()->cart->empty_cart();

    return new WP_REST_Response([
        'status' => 'success',
        'order_id' => $order_id,
        'order_key' => $order_key,
        'redirect_url' => "order-received/{$order_id}/?key={$order_key}&utm_nooverride=1",
        'data' => $data
    ]);
}

add_action('woocommerce_admin_order_data_after_billing_address', function($order){
    echo '<p><strong>Регіон:</strong> ' . esc_html($order->get_meta('np_region')) . '</p>';
    echo '<p><strong>Місто:</strong> ' . esc_html($order->get_meta('np_city')) . '</p>';
    echo '<p><strong>Відділення:</strong> ' . esc_html($order->get_meta('np_warehouse')) . '</p>';
});

add_action('woocommerce_email_after_order_table', function($order, $sent_to_admin, $plain_text, $email){
    if ( $email->id === 'new_order' && $sent_to_admin ) {
        echo '<h2>Дані Нової Пошти</h2>';
        echo '<p><strong>Регіон:</strong> ' . esc_html($order->get_meta('np_region')) . '</p>';
        echo '<p><strong>Місто:</strong> ' . esc_html($order->get_meta('np_city')) . '</p>';
        echo '<p><strong>Відділення:</strong> ' . esc_html($order->get_meta('np_warehouse')) . '</p>';
    }
}, 20, 4);

add_action('woocommerce_email_after_order_table', function($order, $sent_to_admin, $plain_text, $email) {
    if ($email->id !== 'new_order') return;

    echo '<h3>Кольори товарів:</h3>';
    foreach ($order->get_items() as $item) {
        $color = wc_get_order_item_meta($item->get_id(), 'Color', true);
        $image = wc_get_order_item_meta($item->get_id(), 'Image', true);

        if ($color) {
            echo '<p><strong>' . esc_html($item->get_name()) . '</strong><br>';
            echo 'Колір: ' . esc_html($color) . '<br>';
            if ($image) echo $image;
            echo '</p>';
        }
    }
}, 20, 4);