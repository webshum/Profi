@php 
    $faq = get_field('faq', 'options');
@endphp
            
@if(!isArrayEmpty($faq)) 
        <div class="fancy-gallery py-[150px]">
            <div class="center">
                @if (!empty($faq['title']))
                <div class="text-center">
        			<h1 class="text-center animation anim-top animation-no">
        			    {!! $faq['title'] !!}
        			</h1>
        		</div>
        		@endif
        		
        		@if (!empty($faq['item']))
        		<div class="gallery-wrap">
        		    @foreach($faq['item'] as $item)
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