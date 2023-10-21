@extends('layouts.app')

@section('content')
    <div class="center">
        @php 
            do_action( 'woocommerce_before_main_content' );
        @endphp

        @while(have_posts())
            {!! the_post() !!}
            @php wc_get_template_part('content', 'single-product'); @endphp
        @endwhile

        @php
            do_action( 'woocommerce_after_main_content' );
        @endphp
    </div>
@endsection