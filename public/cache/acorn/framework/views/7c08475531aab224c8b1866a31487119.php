<?php 
    $faq = get_field('faq', 'options');
?>
            
<?php if(!isArrayEmpty($faq)): ?> 
        <div class="fancy-gallery py-[150px]">
            <div class="center">
                <?php if(!empty($faq['title'])): ?>
                <div class="text-center">
        			<h1 class="text-center animation anim-top animation-no">
        			    <?php echo $faq['title']; ?>

        			</h1>
        		</div>
        		<?php endif; ?>
        		
        		<?php if(!empty($faq['item'])): ?>
        		<div class="gallery-wrap">
        		    <?php $__currentLoopData = $faq['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		    <?php 
        		        $link = '';
        		        
        		        if (!empty($item['link']['url'])) $link = $item['link']['url'];
        		    ?>
        		    
        		    <a href="<?php echo $link; ?>" class="gallery-item">
        		        <?php if(!empty($item['image'])): ?>
        		        <img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['image']['alt']; ?>">
        		        <?php endif; ?>
        		        
        		        <?php if(!empty($item['title'])): ?>
        		        <div class="item-overlay"><?php echo $item['title']; ?></div>
        		        <?php endif; ?>
        		    </a>
        		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		</div>
        		<?php endif; ?>
            </div>
        </div>
    <?php endif; ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/partiales/what-painting.blade.php ENDPATH**/ ?>