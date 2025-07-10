<?php echo $__env->make('partiales.what-painting', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('partiales.form-subscribe', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<footer id="footer" class="py-[90px]">
    <div class="center flex justify-between items-center gap-[50px]">
        <div class="col-4">
            <a href="/" class="footer-logo">
                <svg width="267" height="48"><use xlink:href="#logo"></use></svg>
            </a>
        </div>

        <div class="column">
            <?php if(!empty(get_field('address', 'options'))): ?>
                <p><?php echo get_field('address', 'options'); ?></p>
            <?php endif; ?>

            <?php if(!empty(get_field('phone', 'options'))): ?>
                <a class="mt-[5px] inline-block" href="tel:<?php echo get_field('phone', 'options'); ?>">
                    Tel. <?php echo get_field('phone', 'options'); ?>

                </a>
            <?php endif; ?>
        </div>
        
        <div class="column">
            <?php if(!empty(get_field('email', 'options'))): ?>
                <a href="mail:<?php echo get_field('email', 'options'); ?>">
                    E-Mail: <?php echo get_field('email', 'options'); ?>

                </a><br>
            <?php endif; ?>

            <?php if(!empty(get_field('website', 'options'))): ?>
                <a class="mt-[5px] inline-block" href="<?php echo get_field('website', 'options'); ?>">Web: <?php echo get_field('website', 'options'); ?></a>
            <?php endif; ?>
        </div>

        <div class="column">
            <?php if(!empty(get_field('delivery', 'options'))): ?>
                <p class="flex items-center">
                    <?php echo get_field('delivery', 'options'); ?>

                    <svg class="ml-[10px]" width="44" height="27"><use xlink:href="#delivery"></use></svg>
                </p>
            <?php endif; ?>
        </div>
    </div>
</footer>

<style>
    @media (max-width: 1300px) {
        .menu>ul>li>a {padding: 27px 15px;}
    }
    
    @media (max-width: 1100px) {
        #header {margin-right: 0 !important;}
        #header .logo svg {
            width: 160px;
            height: 30px;
        }
        
        .menu>ul>li>a {
            padding: 27px 7px;
            font-size: 13px;
        }
        
        #header .head-cart {margin-left: 10px;}
    }
    
    @media (max-width: 991px) {
        .home-gallery {padding: 70px 0;}
    }
    
    @media (max-width: 700px) {
        #header .logo svg {
            width: 250px;
            height: 45px;
        }
        .menu>ul>li>a {
            padding: 7px 15px;
            font-size: 20px;
        }
        .menu>ul .sub-menu a {font-size: 15px;}
        .menu .head-cart {margin-top: 15px;}
        .menu .head-cart svg {
            width: 40px;
            height: 40px;
        }
    }
</style>

<div class="popup-overlay"></div>
<?php echo $__env->make('layouts.popup-cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.popup-color', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.popup-success', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('components.sprite', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/footer.blade.php ENDPATH**/ ?>