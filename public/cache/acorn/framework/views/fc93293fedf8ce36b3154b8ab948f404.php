<div class="subscribe">
    <div class="center grid grid-cols-2">
        <div class="content pr-[130px]">
            <div class="relative z-10">
                <?php if(!empty(get_field('title_form_subscribe', 'options'))): ?>
                    <h2 class="title animated">
                        <?php echo get_field('title_form_subscribe', 'options'); ?>

                    </h2>
                <?php endif; ?>

                <?php if(!empty(get_field('subtitle_form_subscribe', 'options'))): ?>
                    <p class="mt-[20px] animated">
                        <?php echo get_field('subtitle_form_subscribe', 'options'); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>

        <form action="#" class="form-subscribe pl-[130px]" name="subscribe">
            <div class="relative z-10">
                <label class="field-input">
                    <div class="label"><?php echo e(__('Ім\'я', 'sage')); ?></div>
                    <input type="text" name="name" placeholder="<?php echo e(__('Ваше ім\'я', 'sage')); ?>" required>
                </label>

                <label class="field-input">
                    <div class="label"><?php echo e(__('Тел.', 'sage')); ?></div>
                    <input type="tel" name="tel" required placeholder="<?php echo e(__('Ваше тел.', 'sage')); ?>">
                </label>

                <button type="submit" class="button"><?php echo e(__('Відправити', 'sage')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/partiales/form-subscribe.blade.php ENDPATH**/ ?>