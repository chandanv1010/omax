@extends('frontend.homepage.layout')
@php
    $slideKeyword = 'banner-1';
    $slideKeyword2 = 'banner-2';
    $slideKeyword3 = 'banner-3';
    $slideKeyword4 = 'background-banner';
@endphp

@section('content')

    @include('frontend.component.slide')
    @if(isset($widgets['intro']))
    @foreach($widgets['intro']->object as $key => $val)
    @php
        $canonical = write_url($val->languages->canonical);
        $image = $val->image;
        $name = $val->languages->name;
        $description = $val->languages->description;
    @endphp
    <div class="panel-intro-container">
        <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle">
            <div class="uk-width-large-2-5">
                <div class="panel-body">
                    <h2 class="heading-10"><span>{{ $val->languages->name }}</span></h2>
                    <div class="description">
                        {!! $val->languages->description !!}
                    </div>
                    <div class="t-readmore">
                        <a href="{{ $canonical }}" title="{{ $name }}">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-3-5">
                <span href="{{ $canonical }}" title="{{ $name }}" class="image img-cover">
                    <div class="skeleton-loading img-zoomin"></div>
                    <img class="lazy-image img-zoomin" data-src="{{ $image }}" alt="{{ $name }}">
                </span>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    {{-- @dd($widgets['history']) --}}
    @if(isset($widgets['history']))
    @foreach($widgets['history']->object as $key => $val)
    <div class="panel-history mb30 mt30">
        <div class="uk-container uk-container-center">
            @if(isset($val->posts) && count($val->posts))
            @foreach($val->posts as $post)
            <div class="timeline-item">
                <div class="overlay">
                    <div class="title"><span>{{ $post->languages->first()->name }}</span></div>
                    <div class="description">
                        {!! $post->languages->first()->description !!}
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    @endforeach
    @endif

    <div class="product-container panel-category mt-[30px]">
        <div class="uk-container uk-container-center">
            @if (isset($widgets['cate-home-product']))
                <div class="panel-product">
                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $widgets['cate-home-product']->name }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="swiper-container">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-wrapper">
                                @foreach ($widgets['cate-home-product']->object as $cat)
                                @php
                                    $nameC = $cat->languages->name;
                                    $canonicalC = write_url($cat->languages->canonical);
                                    $image = $cat->image;
                                @endphp
                                <div class="swiper-slide">
                                    <div class="product-item">
                                        <a href="{{ $canonicalC }}" title="{{ $nameC }}" class="image img-cover img-zoomin">
                                            <div class="skeleton-loading"></div>
                                            <img class="lazy-image" data-src="{{ $image }}" alt="{{ $nameC }}">
                                        </a>
                                        <div class="info">
                                            <h3 class="title"><a href="{{ $canonicalC }}" title="{{ $nameC }}">{{ $nameC }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (isset($widgets['feature-product']))
        @foreach($widgets['feature-product']->object as $key => $val)
        <div class="product-container mb30 feature-product">
            <div class="panel-product feature-product">
                <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                    <h2 class="heading-3">{{ $widgets['feature-product']->name }}</h2>
                </div>
                @if(isset($val->childrens))
                <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs">
                    @foreach($val->childrens as $keyChild => $valChild)
                    @php
                        $catName = $valChild->languages->name;
                        $catCanonical = write_url($valChild->languages->canonical);
                    @endphp
                    <li><a href="{{ $catCanonical }}">{{ $catName }}</a></li>
                    @endforeach
                </ul>
                @endif
                <div class="uk-container uk-container-center">
                    @if ($val->products)
                    <div class="uk-grid uk-grid-medium">
                        @foreach ($val->products as $keyProduct => $product)
                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4 mb20">
                                @include('frontend/component/product-feature', [
                                    'product' => $product,
                                ])
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div> <!-- Closing the panel-product feature-product div -->
        </div>
        @endforeach
    @endif
    @if (isset($widgets['post']))
        @foreach ($widgets['post']->object as $cat)
            <div class="post">
                <div class="panel-product post">
                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $widgets['post']->name }}</h2>
                    </div>
                    @if(isset($cat->childrens))
                        <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs">
                            @foreach($cat->childrens as $keyChild => $valChild)
                            @php
                                $catName = $valChild->languages->name;
                                $catCanonical = write_url($valChild->languages->canonical);
                            @endphp
                            <li><a href="{{ $catCanonical }}">{{ $catName }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="uk-container uk-container-center">
                        @if ($cat->posts)
                        <div class="uk-grid uk-grid-medium">
                            @foreach ($cat->posts as $keyPost => $post)
                                <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 mb20">
                                    @include('frontend/component/post-item', [ 'posts' => $post ])
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div> <!-- Closing the panel-product post div -->
        
            </div>
        @endforeach
    @endif


    <div class="video-content mb30">
        @if (isset($widgets['video']))
            @foreach ($widgets['video']->object as $cat)
                <div class="video-info uk-container uk-container-center">
                    <h3 class="video-title">{{ $widgets['video']->name }}</h3>
                    @if (isset($widgets['video']->description))
                        @foreach ($widgets['video']->description as $value)
                            <div class="video-description">{!! $value !!}</div>
                        @endforeach
                    @endif
                </div>
                @if ($cat->posts)
                    <ul class="panel-body uk-flex uk-flex-middle uk-flex-wrap uk-container uk-container-center uk-switcher"
                        id="product-switcher">
                        @foreach ($cat->posts as $keyPost => $post)
                            @include('frontend/component/post-video', [
                                'posts' => $post,
                            ])
                        @endforeach
                    </ul>
                @endif
            @endforeach
        @endif
    </div>
    @if (isset($widgets['news']))
    @foreach ($widgets['news']->object as $cat)
        <div class="news-content">
            <div class="panel-product news">
                <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                    <h2 class="heading-3">{{ $widgets['news']->name }}</h2>
                </div>
                @if(isset($cat->childrens))
                    <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs">
                        @foreach($cat->childrens as $keyChild => $valChild)
                        @php
                            $catName = $valChild->languages->name;
                            $catCanonical = write_url($valChild->languages->canonical);
                        @endphp
                        <li><a href="{{ $catCanonical }}">{{ $catName }}</a></li>
                        @endforeach
                    </ul>
                @endif
                
                <div class="uk-container uk-container-center">
                    @if ($cat->posts)
                    <div class="uk-grid uk-grid-medium">
                        @foreach ($cat->posts as $keyPost => $post)
                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 mb20">
                                @include('frontend/component/post-item', [ 'posts' => $post ])
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div> <!-- Closing the panel-product feature-product div -->
            
        </div>
        @endforeach
    @endif

    <div class="certificate-section">
        @if (isset($slides[$slideKeyword4]))
            <img src="{{ $slides[$slideKeyword4]['item'][0]['image'] }}" alt="">
        @endif
        <div class="uk-container uk-container-center certificate-info">
            <div class="video-info uk-container uk-container-center mb30">
                <h3 class="certificate-title">Giấy chứng nhận</h3>
                <div class="certificate-description">Thông qua các dự án hợp tác với nhiều công ty trong và ngoài
                    nước, Bạn có thể kiểm tra công nghệ và ý tưởng độc đáo của Omax đã được trau dồi trong một thời gian
                    dài.</div>
            </div>
            <!-- Carousel certificate -->
            <div class="certificates-carousel owl-carousel owl-theme">
                @if (isset($slides[$slideKeyword3]))
                    @foreach ($slides[$slideKeyword3]['item'] as $val)
                        <div class="certificate-item">
                            <div class="certificate-image">
                                <img src="{{ $val['image'] }}" alt="">
                            </div>
                        </div>
                    @endforeach
                    <!-- Certificate 1 -->
                @endif
                <!-- Certificate 2 -->
            </div>
        </div>
    </div>
@endsection
