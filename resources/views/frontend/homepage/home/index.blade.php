@extends('frontend.homepage.layout')
@php
    $slideKeyword = 'banner-1';
    $slideKeyword2 = 'banner-2';
    $slideKeyword3 = 'banner-3';
    $slideKeyword4 = 'background-banner';
@endphp

@section('content')
    @if (isset($slides) && !empty($slides))
        <div class="banner-header">
            <div class="uk-flex uk-flex-beetween uk-flex-middle">
                <div class="uk-width-1-3 banner-header-left">
                    <div class="uk-banner-header-content">
                        <h1 class="banner-header-title">
                            {{ $slides[$slideKeyword]['item'][0]['name'] }}
                        </h1>
                        <p class="banner-header-description">
                            {{ $slides[$slideKeyword]['item'][0]['description'] }}
                        </p>
                    </div>
                </div>
                <div class="uk-width-2-3 banner-header-right">
                    <div class="banner-header-image">
                        <img src="{{ $slides[$slideKeyword]['item'][0]['image'] }}" alt="Store Image">
                    </div>
                </div>
            </div>
        </div>

        <div class="banner-middle">
            <img src="{{ $slides[$slideKeyword2]['item'][0]['image'] }}" alt="Store Image">
        </div>

        <div class="product-container">
            @if (isset($widgets['cate-home-product']))
                <div class="panel-product">
                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $widgets['cate-home-product']->name }}</h2>
                    </div>
                    <div class="panel-body">
                        <div class="owl-carousel owl-theme cate-product-carousel uk-container uk-container-center">
                            @foreach ($widgets['cate-home-product']->object as $cat)
                            @php
                                $nameC = $cat->languages->name;
                                $canonicalC = write_url($cat->languages->canonical);
                                $image = $cat->image;
                            @endphp
                                <div class="product-item">
                                    <a href="{{ $canonicalC }}" title="{{ $nameC }}" class="image img-cover img-zoomin">
                                        <div class="skeleton-loading"></div>
                                        <img class="lazy-image" data-src="{{ $image }}" alt="{{ $nameC }}">
                                    </a>
                                    <div class="info">
                                        <h3 class="title"><a href="{{ $canonicalC }}" title="{{ $nameC }}">{{ $nameC }}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
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


        <div class="post">
            @if (isset($widgets['post']))
                @foreach ($widgets['post']->object as $cat)
                    @php
                        $nameF = $widgets['post']->name;
                    @endphp

                    <div class="panel-product post">

                        <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-3">{{ $nameF }}</h2>
                        </div>

                        <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs"
                            uk-tab="connect: #product-switcher">
                            <li class="uk-active"><a href="#">Khu độ thị , tòa nhà</a></li>
                            <li><a href="#">Trụ sở văn phòng</a></li>
                            <li><a href="#">Trường học, bệnh viện</a></li>
                            <li><a href="#">Khách sạn , TT thương mại</a></li>
                            <li><a href="#">Nhà máy , khu công nghiệp</a></li>
                        </ul>

                        @if ($cat->posts)
                            <ul class="panel-body uk-flex uk-flex-middle uk-flex-wrap uk-container uk-container-center uk-switcher"
                                id="product-switcher">
                                @foreach ($cat->posts as $keyPost => $post)
                                    @include('frontend/component/post-item', [
                                        'posts' => $post,
                                    ])
                                @endforeach
                            </ul>
                        @endif
                    </div> <!-- Closing the panel-product post div -->
                @endforeach
            @endif
        </div>


        <div class="video-content">
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

        <div class="news-content">
            @if (isset($widgets['news']))
                @foreach ($widgets['news']->object as $cat)
                    @php
                        $nameF = $widgets['news']->name;
                    @endphp

                    <div class="panel-product news">

                        <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-3">{{ $nameF }}</h2>
                        </div>
                        <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs"
                            uk-tab="connect: #news-switcher">
                            <li class="uk-active"><a href="#">Mới Nhất</a></li>
                            <li><a href="#">Tin thị trường</a></li>
                            <li><a href="#">Tin công ty</a></li>
                            <li><a href="#">Tin tuyển dụng</a></li>
                        </ul>

                        @if ($cat->posts)
                            <ul class="panel-body uk-flex uk-flex-middle uk-flex-wrap uk-container uk-container-center uk-switcher"
                                id="news-switcher">
                                @foreach ($cat->posts as $keyPost => $post)
                                    @include('frontend/component/post-item', [
                                        'post' => $post,
                                    ])
                                @endforeach
                            </ul>
                        @endif
                    </div> <!-- Closing the panel-product feature-product div -->
                @endforeach
            @endif
        </div>


        <div class="certificate-section">
            @if (isset($slides[$slideKeyword4]))
                <img src="{{ $slides[$slideKeyword4]['item'][0]['image'] }}" alt="">
            @endif
            <div class="uk-container uk-container-center certificate-info">
                <div class="video-info uk-container uk-container-center">
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
    @endif
@endsection
