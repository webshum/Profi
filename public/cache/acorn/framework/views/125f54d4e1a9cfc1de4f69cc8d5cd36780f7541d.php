<?php $__env->startSection('content'); ?>
    <?php
        if ( is_singular( 'product' ) ) {
            woocommerce_content();
        }else{
            woocommerce_get_template( 'archive-product.php' );
        }
    ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/index.blade.php ENDPATH**/ ?>