<div class="popup-overlay"></div>

<div class="popup-color popup">
    <button class="popup-close">
        <svg width="19" height="19"><use xlink:href="#cross"></use></svg>
    </button>
    <div class="inner">
		<h3>{{ __('Виберіть колір', 'sage') }}</h3>
    	<div class="wrap">
    		@if(!isArrayEmpty(get_field('color')))
	    		<div class="list">
	    			@foreach(get_field('color') as $color)
	    				<div class="item">
	    					@if(!empty($color['image']))
		    					<div class="image">
		    						<img src="{!! $color['image']['url'] !!}" alt="{!! $color['image']['alt'] !!}">
		    					</div>
		    				@endif

		    				@if(!empty($color['title']))
		    					<h4>{!! $color['title'] !!}</h4>
	    					@endif
	    				</div>
	    			@endforeach
	    		</div>

	    		<div class="view">
	    			<div class="image">
	    				<img src="{!! get_field('color')[0]['image']['url'] !!}" alt="{!! get_field('color')[0]['image']['alt'] !!}">
	    			</div>
	    			<a href="#" class="button popup-close"><span>{{ __('Готово', 'sage') }}</span></a>
	    		</div>
    		@endif
    	</div>
    </div>
</div>