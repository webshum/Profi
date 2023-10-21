<?php $__env->startSection('content'); ?>
    <?php if(!isArrayEmpty(get_field('section_1'))): ?> 
        <?php $section = get_field('section_1') ?>
        <div class="home-banner">
            <div class="center gird grid-cols-2">
                <div class="content h-991">
                <?php if(!empty($section['content']['title'])): ?>
                    <h1 class="title animated">
                        <?php echo $section['content']['title']; ?>

                    </h1>
                <?php endif; ?>

                <?php if(!empty($section['content']['text'])): ?>
                    <div class="descr animated">
                        <?php echo $section['content']['text']; ?>

                    </div>
                <?php endif; ?>

                <?php if(!empty($section['content']['button'])): ?>
                    <?php echo $__env->make('components.button', [
                        'class' => 'button button-white',
                        'url' => $section['content']['button']['url'],
                        'title' => $section['content']['button']['title'],
                        'target' => $section['content']['button']['target']
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                </div>

                <?php if(!empty($section['image'])): ?>
                <div class="image">
                    <div class="hidden s-991 text-center">
                        <?php if(!empty($section['content']['title'])): ?>
                            <h1 class="title">
                                <?php echo $section['content']['title']; ?>

                            </h1>

                            <?php if(!empty($section['content']['text'])): ?>
                                <div class="descr">
                                    <?php echo $section['content']['text']; ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <img src="<?php echo e($section['image']['url']); ?>" alt="<?php echo e($section['image']['alt']); ?>">

                    <div class="hidden s-991 text-center">
                        <?php if(!empty($section['content']['button'])): ?>
                            <?php echo $__env->make('components.button', [
                                'class' => 'button',
                                'url' => $section['content']['button']['url'],
                                'title' => $section['content']['button']['title'],
                                'target' => $section['content']['button']['target']
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>  
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('section_2'))): ?> 
        <?php $section = get_field('section_2') ?>
        <div class="home-accordeon py-[150px]">
            <div class="center grid gap-[70px]">
                <div class="content">
                    <svg class="ic" width="139" height="150"><use xlink:href="#star"></use></svg>
                    <?php if(!empty($section['content']['title'])): ?>
                        <h2 class="title animated">
                            <?php echo $section['content']['title']; ?>

                        </h2>
                    <?php endif; ?>

                    <?php if(!empty($section['content']['description'])): ?>
                        <div class="descr mt-[20px] animated">
                            <?php echo $section['content']['description']; ?>

                        </div>
                    <?php endif; ?>

                    <?php if(!empty($section['content']['accordeon'])): ?>
                        <ul class="accordeon mt-[40px]">
                            <?php $__currentLoopData = $section['content']['accordeon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item-accordeon animated">
                                    <?php if(!empty($value['title'])): ?>
                                        <div class="btn-accordeon">
                                            <span><?php echo $value['title']; ?></span>
                                            <svg width="16" height="27"><use xlink:href="#arr-big"></use></svg>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if(!empty($value['text'])): ?>
                                        <div class="content-accordeon">
                                            <div class="inner-accordeon">
                                                <?php echo $value['text']; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>   
                    <?php endif; ?> 
                </div>
                
                <?php if(!empty($section['image'])): ?>
                    <div class="image">
                        <img src="<?php echo e($section['image']['url']); ?>" alt="<?php echo e($section['image']['alt']); ?>">
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    <?php endif; ?>

    <div class="home-products py-[78px]">
        <div class="center grid gap-[10px] items-center">
            <?php if(!isArrayEmpty(get_field('section_3'))): ?> 
                <?php $section = get_field('section_3') ?>
                <div class="content">
                    <?php if(!empty($section['title'])): ?>
                        <h2 class="title animated"><?php echo $section['title']; ?></h2>
                    <?php endif; ?>

                    <?php if(!empty($section['description'])): ?>
                        <div class="descr mt-[20px] animated"><?php echo $section['description']; ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php
                $products = new WP_Query([
                    'post_type' => 'product',
                    'posts_per_page' => 2
                ]);
            ?>

            <?php if($products->have_posts()): ?>
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php while($products->have_posts()): ?>
                                <?php $products->the_post() ?>
                                <li class="splide__slide">
                                    <?php echo $__env->make('partiales.product-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </li>
                            <?php endwhile; ?>

                            <?php wp_reset_postdata() ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(!isArrayEmpty(get_field('section_4'))): ?> 
        <?php 
            $section = get_field('section_4');
            $background = (!empty($section['background'])) ? $section['background']['url'] : '';
        ?>

        <div class="home-slide">
            <div class="center">
                <?php if(!empty($section['title'])): ?>
                    <h2 class="title animated">
                        <span><?php echo $section['title']; ?></span>
                        <svg width="30" height="100"><use xlink:href="#arr-big-2"></use></svg>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="image hidden s-700">
                <img src="<?php echo bloginfo('template_url'); ?>/resources/images/bg-home-slide.jpg" alt="">
            </div>
            
            <div class="background" style="background-image: url(<?php echo $background; ?>);">
                <?php if(!empty($section['description'])): ?>
                    <div class="center animated"><?php echo $section['description']; ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('section_5'))): ?> 
        <?php $section = get_field('section_5'); ?>
        <div class="home-gallery py-[118px]">
            <div class="center">
                <?php if(!empty($section['title'])): ?>
                    <h2 class="title text-center animated"><?php echo $section['title']; ?></h2>
                <?php endif; ?>

                <?php if(!empty($section['subtitle'])): ?>
                    <p class="subtitle text-center animated"><?php echo $section['subtitle']; ?></p>
                <?php endif; ?>

                <?php if(!empty($section['column'])): ?>
                    <div class="grid grid-cols-2 gap-[20px] mt-[50px]">
                        <?php $__currentLoopData = $section['column']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $url = (!empty($column['url'])) ? $column['url'] : '#'; ?>
                            <a href="<?php echo e($url); ?>" class="card">
                                <?php if(!empty($column['title'])): ?>
                                <div class="descr animated scale-down"><?php echo $column['title']; ?></div>
                                <?php endif; ?>

                                <?php if(!empty($column['image'])): ?>
                                <div class="image">
                                    <img src="<?php echo $column['image']['url']; ?>" alt="<?php echo $column['image']['alt']; ?>">
                                </div>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!isArrayEmpty(get_field('section_6'))): ?> 
        <?php $section = get_field('section_6'); ?>

        <div class="home-slider py-[150px]">
            <div class="center">
                <?php if(!empty($section['title'])): ?>
                    <h2 class="title animated"><?php echo $section['title']; ?></h2>
                <?php endif; ?>

                <?php if(!empty($section['slider'])): ?>
                    <div class="splide mt-[50px]">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php $__currentLoopData = $section['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="splide__slide">
                                        <img src="<?php echo $slide['slide']['url']; ?>" alt="<?php echo $slide['slide']['alt']; ?>">
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($section['button'])): ?>
                    <div class="mt-[50px] text-center">
                        <?php echo $__env->make('components.button', [
                            'class' => 'button',
                            'url' => $section['button']['url'],
                            'title' => $section['button']['title'],
                            'target' => $section['button']['target']
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/front-page.blade.php ENDPATH**/ ?>