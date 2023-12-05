<?php ($posts = new WP_Query(['post_type' => 'post'])); ?>



<?php $__env->startSection('content'); ?>

<div class="blog">
    <div class="home-gallery py-[118px]">
        <div class="center">
            <h2 class="title text-center animated mb-5"><?php echo the_title(); ?></h2>

            <?php echo the_content(); ?>


            <?php if($posts->have_posts()): ?>
                <div class="grid grid-cols-2 gap-[20px] mt-[50px]">
                    <?php while($posts->have_posts()): ?>
                        <?php ($posts->the_post()); ?>

                        <a href="<?php echo e(the_permalink()); ?>" class="card">
                            <div class="descr animated scale-down">
                                <?php echo the_title(); ?>

                            </div>

                            <?php if(!empty(get_field('background'))): ?>
                            <div class="image">
                                <img src="<?php echo e(get_field('background')['url']); ?>" alt="<?php echo e(get_field('background')['alt']); ?>">
                            </div>
                            <?php endif; ?>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/blog.blade.php ENDPATH**/ ?>