<div class="popup-overlay"></div>

<div class="popup-color popup">
    <button class="popup-close">
        <svg width="19" height="19"><use xlink:href="#cross"></use></svg>
    </button>
    <div class="inner">
		<h3><?php echo e(__('Виберіть колір', 'sage')); ?></h3>
    	<div class="wrap">
    		<?php if(!isArrayEmpty(get_field('color'))): ?>
	    		<div class="list">
	    			<?php $__currentLoopData = get_field('color'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    				<div class="item">
	    					<?php if(!empty($color['image'])): ?>
		    					<div class="image">
		    						<img src="<?php echo $color['image']['url']; ?>" alt="<?php echo $color['image']['alt']; ?>">
		    					</div>
		    				<?php endif; ?>

		    				<?php if(!empty($color['title'])): ?>
		    					<h4><?php echo $color['title']; ?></h4>
	    					<?php endif; ?>
	    				</div>
	    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    		</div>

	    		<div class="view">
	    			<div class="image">
	    				<img src="<?php echo get_field('color')[0]['image']['url']; ?>" alt="<?php echo get_field('color')[0]['image']['alt']; ?>">
	    			</div>
	    			<a href="#" class="button popup-close"><span><?php echo e(__('Готово', 'sage')); ?></span></a>
	    		</div>
    		<?php endif; ?>
    	</div>
    </div>
</div><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/popup-color.blade.php ENDPATH**/ ?>