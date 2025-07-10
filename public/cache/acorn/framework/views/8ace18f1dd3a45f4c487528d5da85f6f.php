<?php
    global $product;
?>

<div class="product-card">
    <a href="<?php echo the_permalink(); ?>" class="image">
        <?php echo get_the_post_thumbnail(); ?>

    </a>

    <h3 class="title">
        <a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
    </h3>
    <div class="descr"><?php echo get_the_excerpt(); ?></div>

    <div class="flex gap-[27px] justify-center mb-[25px]">
        <?php if($product->is_on_sale()): ?>
            <div class="product-original-price">
                <?php echo wc_price($product->get_regular_price()); ?> 
            </div>
            <div class="product-sale-price">
                <?php echo wc_price($product->get_sale_price()); ?>

            </div>
        <?php else: ?>
            <div class="product-price">
                <?php echo wc_price($product->get_price()); ?> 
            </div>
        <?php endif; ?>
    </div>

    <?php
        do_action('woocommerce_after_shop_loop_item');
    ?>
</div><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/partiales/product-card.blade.php ENDPATH**/ ?>