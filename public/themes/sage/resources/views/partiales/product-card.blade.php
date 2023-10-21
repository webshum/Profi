@php
    global $product;
@endphp

<div class="product-card">
    <a href="{!! the_permalink() !!}" class="image">
        {!! get_the_post_thumbnail() !!}
    </a>

    <h3 class="title">
        <a href="{!! the_permalink() !!}">{!! get_the_title() !!}</a>
    </h3>
    <div class="descr">{!! get_the_excerpt() !!}</div>

    <div class="flex gap-[27px] justify-center mb-[25px]">
        @if($product->is_on_sale())
            <div class="product-original-price">
                {!! wc_price($product->get_regular_price()) !!} 
            </div>
            <div class="product-sale-price">
                {!! wc_price($product->get_sale_price()) !!}
            </div>
        @else
            <div class="product-price">
                {!! wc_price($product->get_price()) !!} 
            </div>
        @endif
    </div>

    @php
        do_action('woocommerce_after_shop_loop_item');
    @endphp
</div>