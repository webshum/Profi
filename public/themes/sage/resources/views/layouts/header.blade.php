<header id="header">
    <div class="center">
        <a href="/" class="logo">
            <svg width="267" height="48"><use xlink:href="#logo"></use></svg>
        </a>

        <button class="btn-menu hidden">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="menu">
            {!! 
                wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'container' => ''
                ]) 
            !!}

            <a href="{{ wc_get_cart_url() }}" class="head-cart btn-popup" data-popup="cart">
                <svg width="23" height="19"><use xlink:href="#cart"></use></svg>
                <span>
                    {!! WC()->cart->get_cart_contents_count() !!}
                </span>
            </a>
        </nav>
    </div>
</header>