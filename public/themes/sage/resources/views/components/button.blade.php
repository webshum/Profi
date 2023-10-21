@php $target = !empty($target) ? "target=_blank" : '';  @endphp
<a href="{{ $url }}" class='{{ $class }}' {{ $target  }}>
    <span>{{ $title }}</span>
</a>