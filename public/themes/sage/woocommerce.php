<?php get_header(); ?>

<div class="main">
	<div class="center">
		<?php 
			$page = get_page_by_path( 'shop' );
			$field = get_field_object('banner', $page->ID);
		?>

		<?php if (!empty($field['value']['url'])) : ?>
			<header class="woocommerce-products-header d-none">
				<img src="<?= $field['value']['url']; ?>" alt="<?= $field['value']['alt']; ?>">
			</header>
		<?php endif; ?>

		<?php 
			if ( is_singular( 'product' ) ) {
				woocommerce_content(); 
			}else{
			 	woocommerce_get_template( 'archive-product.php' );
			}
		?>
	</div>
</div>

<?php get_footer(); ?>