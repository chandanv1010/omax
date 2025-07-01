@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
@endphp
@if (count($slides[$slideKeyword]['item']))
    <div class="owl-carousel owl-theme home-slider">
        @foreach ($slides[$slideKeyword]['item'] as $key => $slide)
            @include('frontend.component.slide-item.slide-' . $loop->iteration, ['slide' => $slide])
        @endforeach
    </div> 
@endif
