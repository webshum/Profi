<?php $__env->startSection('content'); ?>
    <div class="center">
        <?php 
            do_action( 'woocommerce_before_main_content' );
        ?>

        <?php while(have_posts()): ?>
            <?php echo the_post(); ?>

            <?php wc_get_template_part('content', 'single-product'); ?>
        <?php endwhile; ?>

        <?php
            do_action( 'woocommerce_after_main_content' );
        ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/single-product.blade.php ENDPATH**/ ?>