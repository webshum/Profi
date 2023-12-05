<?php $__env->startSection('content'); ?>
<div class="page">
    <div class="center">
        <?php echo e(the_content()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/page.blade.php ENDPATH**/ ?>