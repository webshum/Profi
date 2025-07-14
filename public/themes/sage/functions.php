<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Check to array empty
|--------------------------------------------------------------------------
*/
function isArrayEmpty($array) {
    if (empty($array)) {
        return true;
    }
    
    foreach ($array as $value) {
        if (is_array($value)) {
            if (!isArrayEmpty($value)) {
                return false;
            }
        } else {
            if (!empty($value)) {
                return false;
            }
        }
    }
    
    return true;
}

/*
|--------------------------------------------------------------------------
| Page options
|--------------------------------------------------------------------------
*/
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/*
|--------------------------------------------------------------------------
| Ajax cart
|--------------------------------------------------------------------------
*/

add_action('wp_ajax_get_cart', 'get_cart');
add_action('wp_ajax_nopriv_get_cart', 'get_cart');

function get_cart() {
    echo do_shortcode('[woocommerce_cart]');
    die();
}

add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');

function get_cart_count() {
    echo WC()->cart->get_cart_contents_count();
    die();
}

// Оновлення кількості товару в кошику через AJAX
function update_cart_qty() {
    if (isset($_POST['item_key']) && isset($_POST['quantity'])) {
        $item_key = sanitize_text_field($_POST['item_key']);
        $quantity = intval($_POST['quantity']);
        
        $cart_item = WC()->cart->get_cart_item($item_key);
        
        if ($cart_item) {
            WC()->cart->set_quantity($item_key, $quantity);

            WC()->cart->calculate_totals();
            
            $new_subtotal = wc_price($cart_item['data']->get_price() * $quantity);
            
            echo json_encode(array(
                'cart_total' => WC()->cart->get_cart_total(),
                'cart_count' => WC()->cart->get_cart_contents_count(),
                'product_subtotal' => $new_subtotal,
            ));
        } else {
            echo json_encode(array(
                'error_message' => 'Товар не знайдено в кошику.',
            ));
        }
    }
    die();
}


add_action('wp_ajax_update_cart_qty', 'update_cart_qty');
add_action('wp_ajax_nopriv_update_cart_qty', 'update_cart_qty');

// Видалення товару з кошика через AJAX
function remove_cart_item() {
    if (isset($_POST['item_key'])) {
        $item_key = sanitize_text_field($_POST['item_key']);

        WC()->cart->remove_cart_item($item_key);
        
        echo json_encode(array(
            'cart_total' => WC()->cart->get_cart_total(),
            'cart_count' => WC()->cart->get_cart_contents_count(),
        ));
    }
    die();
}

add_action('wp_ajax_remove_cart_item', 'remove_cart_item');
add_action('wp_ajax_nopriv_remove_cart_item', 'remove_cart_item');

// Застосування купону до кошика через AJAX
function apply_coupon() {
    if (isset($_POST['coupon_code'])) {
        $coupon_code = sanitize_text_field($_POST['coupon_code']);
        
        if (WC()->cart->apply_coupon($coupon_code)) {
            echo json_encode(array(
                'cart_total' => WC()->cart->get_cart_total(),
                'cart_count' => WC()->cart->get_cart_contents_count(),
                'coupon_message' => 'Купон "' . $coupon_code . '" було застосовано.',
            ));
        } else {
            echo json_encode(array(
                'error_message' => 'Неможливо застосувати купон "' . $coupon_code . '".',
            ));
        }
    }
    die();
}

add_action('wp_ajax_apply_coupon', 'apply_coupon');
add_action('wp_ajax_nopriv_apply_coupon', 'apply_coupon');

// Функція для видалення купона з корзини через AJAX
function remove_coupon() {
    if (isset($_POST['coupon_code'])) {
        $coupon_code = sanitize_text_field($_POST['coupon_code']);
        
        WC()->cart->remove_coupon($coupon_code);
        
        if (!WC()->cart->has_discount($coupon_code)) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }
    die();
}

add_action('wp_ajax_remove_coupon', 'remove_coupon');
add_action('wp_ajax_nopriv_remove_coupon', 'remove_coupon');


/*
|--------------------------------------------------------------------------
| Remove actions
|--------------------------------------------------------------------------
*/
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/*
|--------------------------------------------------------------------------
| Remove tab
|--------------------------------------------------------------------------
*/
add_filter( 'woocommerce_product_tabs', 'remove_description_tab', 11 );
 
function remove_description_tab( $tabs ) {
    unset( $tabs['description'] );
    return $tabs;
}

/*
|--------------------------------------------------------------------------
| ADD CONTENT AFTER TITLE
|--------------------------------------------------------------------------
*/
function add_after_title_content() {
    global $product;
    ?>

    <div class="meta-description">
        <?= $product->get_short_description(); ?>
    </div>

    <div class="choise-color btn-popup" data-popup="color">
        <?php if (!isArrayEmpty(get_field('color'))) : ?>
            <div class="view-color">
                <img src="<?= get_field('color')[0]['image']['url'] ?>" alt="">
            </div>
        <?php endif; ?>

        <a href="#"><?php _e('Змінити колір', 'sage'); ?></a>
    </div>

    <?php
}

add_action('woocommerce_single_product_summary', 'add_after_title_content', 5);

add_action('woocommerce_before_add_to_cart_button', function () {
    $color = get_field('color');
    if (!empty($color)) {
        $color_name = $color[0]['title'] ?? '';
        $color_image = $color[0]['image']['url'] ?? '';

        echo '<input type="hidden" name="color_name" value="' . esc_attr($color_name) . '">';
        echo '<input type="hidden" name="color_image" value="' . esc_url($color_image) . '">';
    }
});

/*
|--------------------------------------------------------------------------
| ADD CUSTOM FIELDS TO CART AND ORDER
|--------------------------------------------------------------------------
*/
function custom_field_in_cart($cart_item_data, $product_id) {
    $color_name = isset($_POST['color_name']) ? sanitize_text_field($_POST['color_name']) : '';
    $color_image = isset($_POST['color_image']) ? sanitize_text_field($_POST['color_image']) : '';

    if (!empty($color_name)) {
        $cart_item_data['color_name'] = $color_name;
    }

    if (!empty($color_image)) {
        $cart_item_data['color_image'] = $color_image;
    }

    return $cart_item_data;
}

add_filter('woocommerce_add_cart_item_data', 'custom_field_in_cart', 10, 2);

function save_custom_field_to_order($item_id, $values, $cart_item_key) {
    if (isset($values['color_name'])) {
        wc_add_order_item_meta($item_id, 'Color name', $values['color_name']);
    }

    if (isset($values['color_image'])) {
        wc_add_order_item_meta($item_id, 'Color image', "<img width='50' height='20' src='{$values['color_image']}'>");
    }
}

add_action('woocommerce_add_order_item_meta', 'save_custom_field_to_order', 10, 3);
/*
|--------------------------------------------------------------------------
| AJAX FORM
|--------------------------------------------------------------------------
*/
function javascript_variables(){ ?>
    <script type="text/javascript">
        const ajax_url = '<?php echo admin_url( "admin-ajax.php" ); ?>';
        const ajax_nonce = '<?php echo wp_create_nonce( "secure_nonce_name" ); ?>';
    </script><?php
}
add_action ( 'wp_head', 'javascript_variables' );

add_action('wp_ajax_send', 'send_form');
add_action('wp_ajax_nopriv_send', 'send_form');

function send_form() {
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    $to = get_option('admin_email');
    $subject = 'Консультація з сайту profiproteсt.com.ua';
    $body = 'Name: ' . $_POST['name'] . '<br>';
    $body .= 'Tel: ' . $_POST['tel'] . '<br>';
    $headers = ['Content-Type: text/html; charset=UTF-8'];
     
    wp_mail( $to, $subject, $body, $headers );
 
    echo 'Done!';
    wp_die();
}

/*
|--------------------------------------------------------------------------
| Remove fields at page woocommerce checkout
|--------------------------------------------------------------------------
*/
add_filter('woocommerce_checkout_fields', 'checkout_fields');

function checkout_fields($fields){
    // remove billing fields
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_phone']);
   
    // remove shipping fields 
    unset($fields['shipping']['shipping_first_name']);    
    unset($fields['shipping']['shipping_last_name']);  
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    
    $fields['billing']['billing_email']['default'] = 'admin@admin.com';
    return $fields;
}

/*
|--------------------------------------------------------------------------
| Remove cupon from checkout
|--------------------------------------------------------------------------
*/
add_filter('woocommerce_coupons_enabled', '__return_false');

/*
|--------------------------------------------------------------------------
| Ajax load blog
|--------------------------------------------------------------------------
*/
function lazy_load_posts() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $args = array(
        'post_type'      => 'post', 
        'posts_per_page' => 4,     
        'paged'          => $paged, 
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <a href="<?php the_permalink() ?>" class="card">
                <div class="descrn">
                    <?php the_title() ?>
                    <?php echo $paged; ?>
                </div>

                <?php if(!empty(get_field('background'))) : ?>
                    <div class="image">
                        <img src="<?php echo get_field('background')['url'] ?>" alt="<?php echo get_field('background')['alt'] ?>">
                    </div>
                <?php endif; ?>
            </a>
            <?php
        }
    } else {
        echo 'end'; 
    }

    wp_die(); 
}
add_action('wp_ajax_lazy_load_posts', 'lazy_load_posts');          
add_action('wp_ajax_nopriv_lazy_load_posts', 'lazy_load_posts');  

add_action('init', function() {
    require_once get_theme_file_path('resources/php-translations/wpml-register-strings.php');
});

add_action('init', function () {
    load_plugin_textdomain('woocommerce', false, WP_LANG_DIR . '/plugins/');
});


add_filter( 'woocommerce_dropdown_variation_attribute_options_args', function( $args ) {
    if ( empty( $args['selected'] ) && ! empty( $args['options'] ) ) {
        $args['selected'] = $args['options'][0];
    }
    return $args;
});