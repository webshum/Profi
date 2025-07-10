<!doctype html>
<html <?php (language_attributes()); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php (do_action('get_header')); ?>
    <?php (wp_head()); ?>

    <?php echo $__env->make('layouts.headcode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  </head>

  <body <?php (body_class()); ?>>
    <?php (wp_body_open()); ?>

    <div id="app">
      <?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <main id="main-wrapper" class="main" id="vue">
        <?php echo $__env->yieldContent('content'); ?>
      </main>

      <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php (do_action('get_footer')); ?>
    <?php (wp_footer()); ?>

    <script src="https://cdn.pulse.is/livechat/loader.js" data-live-chat-id="65d8735a68d99605b809d068" async></script>
  </body>
</html>
<?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/app.blade.php ENDPATH**/ ?>