<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

<!-- TAB -->
<?php if (!isArrayEmpty(get_field('tab'))) : ?>
    <div class="product-tab">
        <ul class="controls">
            <?php foreach(get_field('tab') as $key => $tab) : ?>
                <li data-index="<?= $key ?>"><?= $tab['name']; ?></li>
            <?php endforeach; ?>
        </ul>

        <div class="hero"></div>

        <div class="contents">
            <?php foreach(get_field('tab') as $key => $tab) : ?>
                <div data-index="<?= $key ?>"><?= $tab['content']; ?></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
<!-- // TAB -->

<!-- SECTION 1 -->
<?php if(!isArrayEmpty(get_field('section_1'))) : ?>
    <?php $section = get_field('section_1'); ?>
    <div class="home-gallery py-[118px]">
        <div class="center">
            <?php if(!empty($section['title'])) : ?>
                <h2 class="title text-center animated">
                    <?= $section['title'] ?>
                </h2>
            <?php endif; ?>

            <?php if(!empty($section['subtitle'])) : ?>
                <h2 class="subtitle text-center animated">
                    <?= $section['subtitle'] ?>
                </h2>
            <?php endif; ?>

            <?php if(!empty($section['column'])) : ?>
                <div class="grid grid-cols-2 gap-[20px] mt-[50px]">
                    <?php foreach($section['column'] as $column) : ?>
                        <?php $url = (!empty($column['url'])) ? $column['url'] : '#'; ?>
                        <a href="<?= $url ?>" class="card">
                            <?php if(!empty($column['title'])) : ?>
                                <div class="descr animated scale-down">
                                    <?= $column['title'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if(!empty($column['image'])) : ?>
                            <div class="image">
                                <img src="<?= $column['image']['url'] ?>" alt="<?= $column['image']['alt'] ?>">
                            </div>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<!-- // SECTION 1 -->

<!-- SECTION 2 -->
<?php if (!isArrayEmpty(get_field('section_2'))) : ?>
<div class="product-info grid grid-cols-2 gap-5">
    <?php $section = get_field('section_2'); ?>
    <div class="content">
        <?php if (!empty($section['title'])) : ?>
            <h3 class="title animated"><?= $section['title'] ?></h3>
        <?php endif; ?>

        <?php if (!empty($section['content'])) : ?>
            <div class="grid grid-cols-2 mt-[50px]">
                <?php foreach($section['content'] as $content) : ?>
                    <div>
                        <?php if (!empty($content['title'])) : ?>
                            <h4 class="animated scale-down"><?= $content['title'] ?></h4>
                        <?php endif; ?>

                        <?php if (!empty($content['text'])) : ?>
                            <div class="animated scale-down"><?= $content['text'] ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($section['image'])) : ?>
        <div class="image">
            <img src="<?= $section['image']['url'] ?>" alt="<?= $section['image']['alt'] ?>">
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<!-- // SECTION 2 -->

<!-- PRODUCT SLIDER -->
<?php if (!isArrayEmpty(get_field('slider'))) : ?>
<div class="product-slider py-[150px]">
    <?php $slider = get_field('slider'); ?>

    <?php if (!empty($slider['title'])) : ?>
        <h2 class="title animated"><?= $slider['title']; ?></h2>
    <?php endif; ?>

    <?php if (!empty($slider['subtitle'])) : ?>
        <p class="subtitle animated"><?= $slider['subtitle']; ?></p>
    <?php endif; ?>

    <?php if (!empty($slider['slide'])) : ?>
        <div class="splide mt-[40px]">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach($slider['slide'] as $key => $slide) : ?>
                        <li class="splide__slide">
                            <div class="slide">
                                <?php if (!empty($slide['image'])) : ?>
                                    <div class="image">
                                        <img src="<?= $slide['image']['url'] ?>" alt="<?= $slide['image']['alt'] ?>">
                                    </div>
                                <?php endif; ?>

                                <div class="descr">
                                    <?php if (!empty($slide['title'])) : ?>
                                        <h3 class="animated">
                                            <?= $slide['title']; ?>        
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($slide['text'])) : ?>
                                        <?= $slide['text']; ?>  
                                    <?php endif; ?>
                                </div>

                                <div class="number">
                                    <span><?= $key += 1; ?></span> <span>/<?= count($slider['slide']) ?></span>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>
<!-- // PRODUCT SLIDER -->