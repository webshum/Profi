<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>
    <div id="vue"></div>
    <div id="app">
        <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>

    <script>
        window.onload = function() {
            jQuery(function($) {
                $('body').on('change', '.qty', function() {
                    console.log('click');
                    $('[name="update_cart"]').trigger('click');
                });
            });
        }
    </script>   

    <script type="module" src="http://localhost:5176/@vite/client"></script>
    <script type="module" src="http://localhost:5176/resources/scripts/vue.js"></script>
</body>
</html>
