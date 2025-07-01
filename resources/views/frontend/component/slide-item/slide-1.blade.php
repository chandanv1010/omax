@if (!empty($slide))
    <div class="item">
        <div class="uk-position-relative uk-cover-container" style="min-height: 300px;">
            <img src="{{ $slide['image'] }}" alt="{{ $slide['alt']}}" uk-cover>
            <div class="uk-position-center uk-panel uk-light uk-text-center slide-content">
                <h1 class="uk-text-large uk-text-bold slide-title">
                    <img src="{{ asset($slide['name']) }}" alt="{{ $slide['alt'] }}">
                </h1>
                @if (!empty($slide['description']))
                    <p class="slide-description">{{ $slide['description'] }}</p>
                @endif
            </div>
        </div>
    </div>
@endif
