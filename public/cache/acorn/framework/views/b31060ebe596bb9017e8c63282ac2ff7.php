<?php $__env->startSection('content'); ?>

<?php if(have_posts()): ?>
	        
<div class="single-post">
    <div class="center">
    <?php while(have_posts()): ?>
        <?php the_post(); ?>
            <?php echo the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
    </div>
        
    <!--<div class="single-home">-->
    <!--    <div class="center">-->
    <!--        <div class="content animated">-->
    <!--            <?php echo the_content(); ?>-->
    <!--        </div>-->

    <!--        <div class="image animated scale-down">-->
    <!--            <?php echo e(the_post_thumbnail()); ?>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <?php if(!isArrayEmpty(get_field('text_column'))): ?>
        <?php ($column = get_field('text_column')); ?>
        <div class="single-column pt-[45px] pb-[30px]">
            <div class="center">
                <?php if(!empty($column['title'])): ?>
                    <h2 class="title text-center animated"><?php echo $column['title']; ?></h2>
                <?php endif; ?>

                <?php if(!empty($column['text'])): ?>
                <div class="grid grid-cols-2 gap-[80px] mt-[50px]">
                    <?php $__currentLoopData = $column['text']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <?php if(!empty($content['heading'])): ?>
                                <h3 class="animated"><?php echo $content['heading']; ?></h3>
                            <?php endif; ?>

                            <?php if(!empty($content['content'])): ?>
                                <div class="content animated"><?php echo $content['content']; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <?php if(!empty(get_field('background'))): ?>
                <div class="background mt-[60px]">
                    <img src="<?php echo e(get_field('background')['url']); ?>" alt="<?php echo e(get_field('background')['alt']); ?>">
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('tab'))): ?>
        <?php ($tab = get_field('tab')); ?>

        <div class="product-tab">
            <div class="center">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list controls">
                            <?php $__currentLoopData = get_field('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="splide__slide" data-index="<?php echo e($key); ?>">
                                    <?php echo $tab['name']; ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="contents">
                    <?php $__currentLoopData = get_field('tab'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div data-index="<?php echo e($key); ?>">
                            <?php echo $tab['content']; ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('text_gallery'))): ?>
        <?php ($content = get_field('text_gallery')); ?>

        <div class="text-gallery py-[150px]">
            <div class="center">
                <?php if(!empty($content['title'])): ?>
                    <h2 class="title text-center animated">
                        <?php echo $content['title']; ?>

                    </h2>
                <?php endif; ?>

                <?php if(!empty($content['subtitle'])): ?>
                    <p class="subtitle text-center animated">
                        <?php echo $content['subtitle']; ?>

                    </p>
                <?php endif; ?>

                <div class="grid mt-[50px]">
                    <?php if(!empty($content['image'])): ?>
                        <div class="image animated scale-up">
                            <img src="<?php echo e($content['image']['url']); ?>" alt="<?php echo e($content['image']['alt']); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($content['text'])): ?>
                        <div class="content">
                            <?php $__currentLoopData = $content['text']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <?php if(!empty($content['heading'])): ?>
                                        <h3 class="animated"><?php echo $content['heading']; ?></h3>
                                    <?php endif; ?>

                                    <?php if(!empty($content['content'])): ?>
                                        <div class="animated"><?php echo $content['content']; ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('accordeon'))): ?>
        <?php ($accordeon = get_field('accordeon')); ?>

        <div class="single-accordeon">
            <div class="center">
                <div>
                    <?php if(!empty($accordeon['title'])): ?>
                        <h2 class="title animated">
                            <?php echo $accordeon['title']; ?>

                        </h2>
                    <?php endif; ?>

                    <?php if(!empty($accordeon['item'])): ?>
                        <ul class="accordeon mt-[35px]">
                            <?php $__currentLoopData = $accordeon['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item-accordeon animated">
                                    <?php if(!empty($item['title'])): ?>
                                        <div class="btn-accordeon">
                                            <span><?php echo $item['title']; ?></span>
                                            <svg width="14" height="8">
                                                <use xlink:href="#arr"></use>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                
                                    <?php if(!empty($item['content'])): ?>
                                        <div class="content-accordeon">
                                            <div class="inner-accordeon">
                                                <?php echo $item['content']; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>  
                    <?php endif; ?> 
                </div>

                <?php if(!empty($accordeon['image'])): ?>
                    <div class="image animated scale-up">
                        <img src="<?php echo e($accordeon['image']['url']); ?>" alt="<?php echo e($accordeon['image']['alt']); ?>">
                    </div> 
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('section_background'))): ?>
        <?php ($section = get_field('section_background')); ?>
        <div class="section-background">
            <div class="center">
                <?php if(!empty($section)): ?>
                    <img src="<?php echo $section['image']['url']; ?>" alt="<?php echo $section['image']['alt']; ?>">
                <?php endif; ?>

                <div class="box">
                    <div class="content">
                        <?php if(!empty($section['subtitle'])): ?>
                            <p class="subtitle"><?php echo $section['subtitle']; ?></p>
                        <?php endif; ?>

                        <?php if(!empty($section['title'])): ?>
                            <h2 class="title"><?php echo $section['title']; ?></h2>
                        <?php endif; ?>

                        <?php if(!empty($section['text'])): ?>
                            <div class="text"><?php echo $section['text']; ?></div>
                        <?php endif; ?>
                    </div>

                    <?php if(!empty($section['thumb'])): ?>
                        <div class="thumb">
                            <img src="<?php echo $section['thumb']['url']; ?>" alt="<?php echo $section['thumb']['alt']; ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('section'))): ?>
        <?php ($section = get_field('section')); ?>
        <div class="section text-center py-[80px]">
            <?php if(!empty($section['title'])): ?>
                <h2 class="title animated mb-[20px]">
                    <?php echo $section['title']; ?>

                </h2>
            <?php endif; ?>

            <?php if(!empty($section['subtitle'])): ?>
                <div class="subtitle animated">
                    <?php echo $section['subtitle']; ?>

                </div>
            <?php endif; ?>

            <?php if(!empty($section['button'])): ?>
                <?php echo $__env->make('components.button', [
                    'class' => 'button button-gray mt-[40px]',
                    'url' => $section['button']['url'],
                    'title' => $section['button']['title'],
                    'target' => $section['button']['target']
                ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('project'))): ?>
        <?php ($project = get_field('project')); ?>

        <div class="single-project">
            <div class="center">
                <?php if(!empty($project['title'])): ?>
                    <h2 class="title animated">
                        <?php echo $project['title']; ?>

                    </h2>
                <?php endif; ?>

                <?php if(!empty($project['item'])): ?>
                    <div class="gallery mt-[50px]">
                        <?php $__currentLoopData = $project['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($item)): ?>
                                <?php ($link = (!empty($item['link'])) ? $item['link']['url'] : ''); ?>
                                <?php ($target = (!empty($item['link']['target'])) ? "target='_blank'" : ''); ?>

                                <a href="<?php echo e($link); ?>" <?php echo e($target); ?> class="image animated scale-up">
                                    <img src="<?php echo e($item['image']['url']); ?>" alt="<?php echo e($item['image']['alt']); ?>">
                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/single.blade.php ENDPATH**/ ?>