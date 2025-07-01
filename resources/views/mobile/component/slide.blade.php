@php
    $slideKeyword = 'mobile-slide';
@endphp
@if (count($slides[$slideKeyword]['item']))
    <div class="owl-carousel owl-theme mobile-slider">
        @foreach ($slides[$slideKeyword]['item'] as $key => $slide)
            @include('frontend.component.slide-item.slide-' . $loop->iteration, ['slide' => $slide])
        @endforeach
    </div>
@endif
