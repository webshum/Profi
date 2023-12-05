@include('partiales.form-subscribe')

<footer id="footer" class="py-[90px]">
    <div class="center flex justify-between items-center gap-[50px]">
        <div class="col-4">
            <a href="/" class="footer-logo">
                <svg width="267" height="48"><use xlink:href="#logo"></use></svg>
            </a>
        </div>

        <div class="column">
            @if(!empty(get_field('address', 'options')))
                <p>{!! get_field('address', 'options') !!}</p>
            @endif

            @if(!empty(get_field('phone', 'options')))
                <a class="mt-[5px] inline-block" href="tel:{!! get_field('phone', 'options') !!}">
                    Tel. {!! get_field('phone', 'options') !!}
                </a>
            @endif
        </div>
        
        <div class="column">
            @if(!empty(get_field('email', 'options')))
                <a href="mail:{!! get_field('email', 'options') !!}">
                    E-Mail: {!! get_field('email', 'options') !!}
                </a><br>
            @endif

            @if(!empty(get_field('website', 'options')))
                <a class="mt-[5px] inline-block" href="{!! get_field('website', 'options') !!}">Web: {!! get_field('website', 'options') !!}</a>
            @endif
        </div>

        <div class="column">
            @if(!empty(get_field('delivery', 'options')))
                <p class="flex items-center">
                    {!! get_field('delivery', 'options') !!}
                    <svg class="ml-[10px]" width="44" height="27"><use xlink:href="#delivery"></use></svg>
                </p>
            @endif
        </div>
    </div>
</footer>

<div class="popup-overlay"></div>
@include('layouts.popup-cart')
@include('layouts.popup-color')
@include('layouts.popup-success')
@include('components.sprite')