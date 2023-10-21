<?php echo $__env->make('partiales.form-subscribe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('components.sprite', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/footer.blade.php ENDPATH**/ ?>