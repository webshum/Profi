{{-- 
Template Name: Blog
--}}

@php($posts = new WP_Query(['post_type' => 'post']))

@extends('layouts.app')

@section('content')

<div class="blog">
    <div class="home-gallery py-[118px]">
        <div class="center">
            <h2 class="title text-center animated mb-5">{!! the_title() !!}</h2>

            {!! the_content() !!}

            @if($posts->have_posts())
                <div class="grid grid-cols-2 gap-[20px] mt-[50px] js-blog">
                    @while($posts->have_posts())
                        @php($posts->the_post())

                        <a href="{{ the_permalink() }}" class="card">
                            <div class="descr animated scale-down">
                                {!! the_title() !!}
                            </div>

                            @if(!empty(get_field('background')))
                            <div class="image">
                                <img src="{{ get_field('background')['url'] }}" alt="{{ get_field('background')['alt'] }}">
                            </div>
                            @endif
                        </a>
                    @endwhile
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let page = 2;
    let loading = false;

    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.querySelector('.js-blog').offsetHeight - 200 && !loading) {
            loading = true;

            fetch(ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=lazy_load_posts&page=${page}`,
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === 'end') {
                    console.log('Більше постів немає.');
                } else {
                    document.querySelector('.js-blog').insertAdjacentHTML('beforeend', data);
                    page++;
                    loading = false;
                }
            })
            .catch(error => {
                console.error('Помилка завантаження:', error);
            });
        }
    });
});
</script>

@endsection