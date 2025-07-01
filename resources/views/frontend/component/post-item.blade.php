@php
    $name = $post->languages[0]->name;
    $canonical = write_url($post->languages[0]->canonical);
    $image = thumb(image($post->image), 600, 400);
    $price = getPrice($product);
@endphp
<li class="uk-active">
<div class="uk-width-medium-1-2 uk-width-large-1-3 post-item">
    <a href="{{ $canonical }}" title="{{ $name }}" class="image img-cover img-zoomin">
        <div class="skeleton-loading"></div>
        <img class="lazy-image" data-src="{{ $image }}" alt="{{ $name }}">
    </a>
    <div class="info">
        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
    </div>
</div>
</li>

