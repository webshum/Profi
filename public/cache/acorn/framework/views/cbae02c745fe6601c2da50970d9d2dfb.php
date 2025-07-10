<?php $__env->startSection('content'); ?>
<div class="page">
    <div class="center">
        <?php if(have_posts()): ?>
	        <?php while(have_posts()): ?>
	            <?php the_post(); ?>
	        	<?php echo e(the_content()); ?>

	        <?php endwhile; ?>
	    <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/page.blade.php ENDPATH**/ ?>