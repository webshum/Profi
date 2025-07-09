@extends('layouts.app')

@section('content')
<div class="page">
    <div class="center">
        @if(have_posts())
          @while(have_posts())
              @php the_post(); @endphp
            {{ the_content() }}
          @endwhile
      @endif
    </div>
</div>
@endsection