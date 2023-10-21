<header id="header">
    <div class="center">
        <a href="/" class="logo">
            <svg width="267" height="48"><use xlink:href="#logo"></use></svg>
        </a>

        <button class="btn-menu hidden s-700">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="menu">
            <ul>
                <li><a href="#">Blog</a></li>
                <li>
                    <a href="#">
                        Product
                        <svg width="11" height="6"><use xlink:href="#arr"></use></svg>
                    </a>
                    <ul class="drop">
                        <li><a href="#">Wood special oil</a></li>
                        <li><a href="#">Wood special oil 2</a></li>
                    </ul>
                </li>
            </ul>

            <a href="<?php echo e(wc_get_cart_url()); ?>" class="head-cart">
                <svg width="23" height="19"><use xlink:href="#cart"></use></svg>
                <span>
                    <?php echo WC()->cart->get_cart_contents_count(); ?>

                </span>
            </a>
        </nav>
    </div>
</header><?php /**PATH /Users/serhi/Sites/Profi/public/themes/sage/resources/views/layouts/header.blade.php ENDPATH**/ ?>