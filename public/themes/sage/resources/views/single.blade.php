@extends('layouts.app')

@section('content')
<div class="single-post">
    <div class="single-home">
        <div class="center">
            <div class="content animated">
                {!! the_content() !!}
            </div>

            <div class="image animated scale-down">
                {{ the_post_thumbnail() }}
            </div>
        </div>
    </div>

    @if(!isArrayEmpty(get_field('text_column')))
        @php($column = get_field('text_column'))
        <div class="single-column pt-[45px] pb-[30px]">
            <div class="center">
                @if(!empty($column['title']))
                    <h2 class="title text-center animated">{!! $column['title'] !!}</h2>
                @endif

                @if(!empty($column['text']))
                <div class="grid grid-cols-2 gap-[80px] mt-[50px]">
                    @foreach($column['text'] as $content)
                        <div>
                            @if(!empty($content['heading']))
                                <h3 class="animated">{!! $content['heading'] !!}</h3>
                            @endif

                            @if(!empty($content['content']))
                                <div class="content animated">{!! $content['content'] !!}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
                @endif

                @if(!empty(get_field('background')))
                <div class="background mt-[60px]">
                    <img src="{{ get_field('background')['url'] }}" alt="{{ get_field('background')['alt'] }}">
                </div>
                @endif
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('tab')))
        @php($tab = get_field('tab'))

        <div class="product-tab">
            <div class="center">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list controls">
                            @foreach(get_field('tab') as $key => $tab)
                                <li class="splide__slide" data-index="{{ $key }}">
                                    {!! $tab['name'] !!}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="contents">
                    @foreach(get_field('tab') as $key => $tab)
                        <div data-index="{{ $key }}">
                            {!! $tab['content'] !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('text_gallery')))
        @php($content = get_field('text_gallery'))

        <div class="text-gallery py-[150px]">
            <div class="center">
                @if(!empty($content['title']))
                    <h2 class="title text-center animated">
                        {!! $content['title'] !!}
                    </h2>
                @endif

                @if(!empty($content['subtitle']))
                    <p class="subtitle text-center animated">
                        {!! $content['subtitle'] !!}
                    </p>
                @endif

                <div class="grid mt-[50px]">
                    @if(!empty($content['image']))
                        <div class="image animated scale-up">
                            <img src="{{ $content['image']['url'] }}" alt="{{ $content['image']['alt'] }}">
                        </div>
                    @endif

                    @if(!empty($content['text']))
                        <div class="content">
                            @foreach($content['text'] as $content)
                                <div>
                                    @if(!empty($content['heading']))
                                        <h3 class="animated">{!! $content['heading'] !!}</h3>
                                    @endif

                                    @if(!empty($content['content']))
                                        <div class="animated">{!! $content['content'] !!}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('accordeon')))
        @php($accordeon = get_field('accordeon'))

        <div class="single-accordeon">
            <div class="center">
                <div>
                    @if(!empty($accordeon['title']))
                        <h2 class="title animated">
                            {!! $accordeon['title'] !!}
                        </h2>
                    @endif

                    @if(!empty($accordeon['item']))
                        <ul class="accordeon mt-[35px]">
                            @foreach($accordeon['item'] as $item)
                                <li class="item-accordeon animated">
                                    @if(!empty($item['title']))
                                        <div class="btn-accordeon">
                                            <span>{!! $item['title'] !!}</span>
                                            <svg width="14" height="8">
                                                <use xlink:href="#arr"></use>
                                            </svg>
                                        </div>
                                    @endif
                                
                                    @if(!empty($item['content']))
                                        <div class="content-accordeon">
                                            <div class="inner-accordeon">
                                                {!! $item['content'] !!}
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>  
                    @endif 
                </div>

                @if(!empty($accordeon['image']))
                    <div class="image animated scale-up">
                        <img src="{{ $accordeon['image']['url'] }}" alt="{{ $accordeon['image']['alt'] }}">
                    </div> 
                @endif
            </div>
        </div>
    @endif

    @if(!isArrayEmpty(get_field('section')))
        @php($section = get_field('section'))
        <div class="section text-center py-[80px]">
            @if(!empty($section['title']))
                <h2 class="title animated mb-[20px]">
                    {!! $section['title'] !!}
                </h2>
            @endif

            @if(!empty($section['subtitle']))
                <p class="subtitle animated">
                    {!! $section['subtitle'] !!}
                </p>
            @endif

            @if(!empty($section['button']))
                @include('components.button', [
                    'class' => 'button button-gray mt-[40px]',
                    'url' => $section['button']['url'],
                    'title' => $section['button']['title'],
                    'target' => $section['button']['target']
                ])
            @endif
        </div>
    @endif

    @if(!isArrayEmpty(get_field('project')))
        @php($project = get_field('project'))

        <div class="single-project">
            <div class="center">
                @if(!empty($project['title']))
                    <h2 class="title animated">
                        {!! $project['title'] !!}
                    </h2>
                @endif

                @if(!empty($project['item']))
                    <div class="gallery mt-[50px]">
                        @foreach($project['item'] as $item)
                            @if(!empty($item))
                                <div class="image animated scale-up">
                                    <img src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection