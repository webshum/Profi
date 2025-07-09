@extends('layouts.app')

@section('content')
    @if(!isArrayEmpty(get_field('section_1'))) 
        @php $section = get_field('section_1') @endphp
        <div class="home-banner">
            <div class="center gird grid-cols-2">
                <div class="content">
                @if(!empty($section['content']['title']))
                    <h1 class="title animated">
                        {!! $section['content']['title'] !!}
                    </h1>
                @endif

                @if(!empty($section['content']['text']))
                    <div class="descr animated">
                        {!! $section['content']['text'] !!}
                    </div>
                @endif

                @if(!empty($section['content']['button']))
                    @include('components.button', [
                        'class' => 'button button-white',
                        'url' => $section['content']['button']['url'],
                        'title' => $section['content']['button']['title'],
                        'target' => $section['content']['button']['target']
                    ])
                @endif
                </div>

                @if(!empty($section['image']))
                <div class="image">
                    <div class="hidden s-991 text-center">
                        @if(!empty($section['content']['title']))
                            <h1 class="title">
                                {!! $section['content']['title'] !!}
                            </h1>

                            @if(!empty($section['content']['text']))
                                <div class="descr">
                                    {!! $section['content']['text'] !!}
                                </div>
                            @endif
                        @endif
                    </div>

                    <img src="{{ $section['image']['url'] }}" alt="{{ $section['image']['alt'] }}">

                    <div class="hidden s-991 text-center">
                        @if(!empty($section['content']['button']))
                            @include('components.button', [
                                'class' => 'button',
                                'url' => $section['content']['button']['url'],
                                'title' => $section['content']['button']['title'],
                                'target' => $section['content']['button']['target']
                            ])
                        @endif
                    </div>  
                </div>
                @endif
            </div>
        </div>
    @endif
    
    @if(!isArrayEmpty(get_field('faq'))) 
        <div class="fancy-gallery py-[150px]">
            <div class="center">
                @if (!empty(get_field('faq')['title']))
                <div class="text-center">
        			<h1 class="text-center animation anim-top animation-no">
        			    {!! get_field('faq')['title'] !!}
        			</h1>
        		</div>
        		@endif
        		
        		@if (!empty(get_field('faq')['item']))
        		<div class="gallery-wrap">
        		    @foreach(get_field('faq')['item'] as $item)
        		    @php 
        		        $link = '';
        		        
        		        if (!empty($item['link']['url'])) $link = $item['link']['url'];
        		    @endphp
        		    
        		    <a href="{!! $link !!}" class="gallery-item">
        		        @if (!empty($item['image']))
        		        <img src="{!! $item['image']['url'] !!}" alt="{!! $item['image']['alt'] !!}">
        		        @endif
        		        
        		        @if (!empty($item['title']))
        		        <div class="item-overlay">{!! $item['title'] !!}</div>
        		        @endif
        		    </a>
        		    @endforeach
        		</div>
        		@endif
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('section_2'))) 
        @php $section = get_field('section_2') @endphp
        <div class="home-accordeon py-[150px]">
            <div class="center grid gap-[70px]">
                <div class="content">
                    <svg class="ic" width="139" height="150"><use xlink:href="#star"></use></svg>
                    @if(!empty($section['content']['title']))
                        <h2 class="title animated">
                            {!! $section['content']['title'] !!}
                        </h2>
                    @endif

                    @if(!empty($section['content']['description']))
                        <div class="descr mt-[20px] animated">
                            {!! $section['content']['description'] !!}
                        </div>
                    @endif

                    @if(!empty($section['content']['accordeon']))
                        <ul class="accordeon mt-[40px]">
                            @foreach($section['content']['accordeon'] as $value)
                                <li class="item-accordeon animated">
                                    @if(!empty($value['title']))
                                        <div class="btn-accordeon">
                                            <span>{!! $value['title'] !!}</span>
                                            <svg width="16" height="27"><use xlink:href="#arr-big"></use></svg>
                                        </div>
                                    @endif
                                    
                                    @if(!empty($value['text']))
                                        <div class="content-accordeon">
                                            <div class="inner-accordeon">
                                                {!! $value['text'] !!}
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>   
                    @endif 
                </div>
                
                @if(!empty($section['image']))
                    <div class="image">
                        <img src="{{ $section['image']['url'] }}" alt="{{ $section['image']['alt'] }}">
                    </div>
                @endif 
            </div>
        </div>
    @endif

    <div class="home-products py-[78px]">
        <div class="center grid gap-[10px] items-center">
            @if(!isArrayEmpty(get_field('section_3'))) 
                @php $section = get_field('section_3') @endphp
                <div class="content">
                    @if(!empty($section['title']))
                        <h2 class="title animated">{!! $section['title'] !!}</h2>
                    @endif

                    @if(!empty($section['description']))
                        <div class="descr mt-[20px] animated">{!! $section['description'] !!}</div>
                    @endif
                </div>
            @endif

            @php
                $products = new WP_Query([
                    'post_type' => 'product',
                    'posts_per_page' => 2
                ]);
            @endphp

            @if($products->have_posts())
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @while($products->have_posts())
                                @php $products->the_post() @endphp
                                <li class="splide__slide">
                                    @include('partiales.product-card')
                                </li>
                            @endwhile

                            @php wp_reset_postdata() @endphp
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if(!isArrayEmpty(get_field('section_4'))) 
        @php 
            $section = get_field('section_4');
            $background = (!empty($section['background'])) ? $section['background']['url'] : '';
        @endphp

        <div class="home-slide">
            <div class="center">
                @if(!empty($section['title']))
                    <h2 class="title animated">
                        <span>{!! $section['title'] !!}</span>
                        <svg width="30" height="100"><use xlink:href="#arr-big-2"></use></svg>
                    </h2>
                @endif
            </div>

            <div class="image hidden s-700">
                <img src="{!! bloginfo('template_url') !!}/resources/images/bg-home-slide.jpg" alt="">
            </div>
            
            <div class="background" style="background-image: url({!! $background !!});">
                @if(!empty($section['description']))
                    <div class="center animated">{!! $section['description'] !!}</div>
                @endif
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('section_5'))) 
        @php $section = get_field('section_5'); @endphp
        <div class="home-gallery py-[118px]">
            <div class="center">
                @if(!empty($section['title']))
                    <h2 class="title text-center animated">{!! $section['title'] !!}</h2>
                @endif

                @if(!empty($section['subtitle']))
                    <p class="subtitle text-center animated">{!! $section['subtitle'] !!}</p>
                @endif

                @if(!empty($section['column']))
                    <div class="grid grid-cols-2 gap-[20px] mt-[50px]">
                        @foreach($section['column'] as $column)
                            @php $url = (!empty($column['url'])) ? $column['url'] : '#'; @endphp
                            <a href="{{ $url }}" class="card">
                                @if(!empty($column['title']))
                                <div class="descr animated scale-down">{!! $column['title'] !!}</div>
                                @endif

                                @if(!empty($column['image']))
                                <div class="image">
                                    <img src="{!! $column['image']['url'] !!}" alt="{!! $column['image']['alt'] !!}">
                                </div>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('section_6'))) 
        @php $section = get_field('section_6'); @endphp

        <div class="home-slider py-[150px]">
            <div class="center">
                @if(!empty($section['title']))
                    <h2 class="title animated">{!! $section['title'] !!}</h2>
                @endif

                @if(!isArrayEmpty($section['slider']))
                    <div class="splide mt-[50px]">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($section['slider'] as $slide)
                                    <li class="splide__slide">
                                        @if (!empty($slide['slide']['image']['link']))
                                            @php
                                                if (!empty($slide['slide']['link']['url'])) {
                                                    $link = $slide['slide']['link']['url'];
                                                } else {
                                                    $link = '';
                                                }

                                                $target = (!empty($slide['slide']['link']['target'])) ? "target='_blank'" : ''
                                            @endphp
                                            <a href="{!! $link !!}" {{ $target }}>
                                                <img src="{!! $slide['slide']['image']['url'] !!}" alt="{!! $slide['slide']['image']['alt'] !!}">
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if(!empty($section['button']))
                    <div class="mt-[50px] text-center">
                        @include('components.button', [
                            'class' => 'button',
                            'url' => $section['button']['url'],
                            'title' => $section['button']['title'],
                            'target' => $section['button']['target']
                        ])
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
