<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main-wrapper" class="main">
    <?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/app.blade.php ENDPATH**/ ?>