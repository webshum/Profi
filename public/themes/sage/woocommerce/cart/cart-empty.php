<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
// do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
    <div class="head">
        <?php esc_attr_e( 'Кошик', 'cart_title' ); ?>      
    </div>

    <div class="empty-cart text-center">
        <h3><?php _e('Ваш кошик порожній', 'sage'); ?></h3>
        <p><?php _e('Перейдіть на сторінку продукту та оберіть те, що вам потрібно', 'sage'); ?></p>

        <svg width="98" height="88" viewBox="0 0 98 88" fill="none">
            <path d="M26.473 31.5652C27.0869 31.5652 29.4164 31.2401 29.7415 30.6442L43.014 2.5462C43.2134 2.13806 43.2516 1.66976 43.1211 1.23467C42.9906 0.799585 42.7009 0.429672 42.3097 0.198683C41.8995 0.000825509 41.4296 -0.0346859 40.9942 0.0992643C40.5589 0.233214 40.1903 0.52673 39.9622 0.920997L24.9381 29.019C24.7402 29.4293 24.7047 29.8992 24.8386 30.3345C24.9726 30.7698 25.2661 31.1385 25.6604 31.3665C25.9096 31.5018 26.1895 31.5702 26.473 31.5652Z" fill="#848484"/>
            <path d="M71.5276 31.5652C71.8164 31.5663 72.1013 31.4982 72.3583 31.3665C72.7494 31.1355 73.0391 30.7656 73.1697 30.3305C73.3002 29.8954 73.2619 29.4271 73.0625 29.019L58.0565 0.920969C57.9984 0.647712 57.8777 0.391661 57.7038 0.172957C57.53 -0.0457477 57.3078 -0.22114 57.0547 -0.339425C56.8017 -0.45771 56.5246 -0.515661 56.2453 -0.50872C55.966 -0.501779 55.6922 -0.430135 55.4453 -0.299423C55.1984 -0.168712 54.9852 0.0175023 54.8224 0.244571C54.6597 0.47164 54.5518 0.733372 54.5074 1.00918C54.4629 1.28498 54.4831 1.56734 54.5662 1.83404C54.6494 2.10074 54.7933 2.34451 54.9866 2.54618L68.2772 30.6984C68.6203 31.2401 70.9137 31.5652 71.5276 31.5652Z" fill="#848484"/>
            <path d="M96.2664 28.0981H1.80579C0.848719 28.0981 0 29.4705 0 31.168C0 32.8654 0.776488 34.31 1.80579 34.31H4.42418L16.5229 84.222C16.5826 85.1977 17.0116 86.1142 17.7227 86.785C18.4338 87.4559 19.3736 87.8308 20.3512 87.8335H77.6488C78.6277 87.8351 79.5699 87.4617 80.282 86.7899C80.994 86.1182 81.4217 85.1993 81.4771 84.222L93.5939 34.31H96.2664C97.2235 34.31 98.0722 32.9377 98.0722 31.2222C98.0722 29.5067 97.2235 28.0981 96.2664 28.0981ZM17.173 35.3213H22.5904L24.5587 55.8531H19.5567L17.173 35.3213ZM22.157 78.2087L20.1887 61.2524H25.0643L26.6895 78.2087H22.157ZM31.7457 35.3213H37.1631L38.0479 55.8531H33.0278L31.7457 35.3213ZM34.4544 78.2087L33.3709 61.2524H38.2465L38.9869 78.2087H34.4544ZM51.2663 78.2087H46.7337L46.5712 61.2524H51.4468L51.2663 78.2087ZM51.501 55.8531H46.517L46.3184 35.3213H51.7358L51.501 55.8531ZM63.5637 78.1184H59.0311L59.7535 61.1621H64.6291L63.5637 78.1184ZM65.0083 55.7628H59.9882L60.8911 35.231H66.3085L65.0083 55.7628ZM75.843 78.1184H71.3105L72.9538 61.1621H77.8294L75.843 78.1184ZM78.4433 55.7628H73.4774L75.4638 35.231H80.8811L78.4433 55.7628Z" fill="#848484"/>
        </svg>

        <button class="popup-close button"><?php _e('Показати продукт', 'sage'); ?></button>

    </div>

    <div class="foot">
        <div class="popup-close">
            <span><?php _e('Продовжити покупки', 'sage'); ?></span>
        </div>
    </div>

	<!-- <p class="return-to-shop">
		<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
			?>
		</a>
	</p> -->
<?php endif; ?>
