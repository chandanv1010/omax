@extends('mobile.homepage.layout')
@php
    $slideKeyword = 'banner-1';
    $slideKeyword2 = 'banner-2';
    $slideKeyword3 = 'banner-3';
    $slideKeyword4 = 'background-banner';
@endphp
@section('content')
    <div id="mobile-container">
        @include('mobile.component.slide')
        @if(isset($widgets['intro']))
            <div class="panel-mobile-intro">
                <a href="{{ write_url('ve-chung-toi') }}">
                    <h2 class="heading-1"><span>{{ $widgets['intro']->name }}</span></h2>
                    <div class="description">
                        {!! $widgets['intro']->description[1] !!}
                    </div>
                </a>
            </div>
        @endif
        @if (isset($slides) && !empty($slides))
        <div class="banner-header-mobile-header">
            <div class="uk-flex uk-flex-beetween uk-flex-middle banner-mobile-header-flex">
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
    @endif
        
    <div class="product-container product-container-mobile">
        @if (isset($widgets['cate-home-product']))
            @foreach ($widgets['cate-home-product']->object as $cat)
          
                @php
                    $nameC = $widgets['cate-home-product']->name;
                    $canonicalC = write_url($cat->languages->canonical);
                @endphp
                <div class="panel-product">
                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $nameC }}</h2>
                    </div>
                    @if ($cat->products)
                        <div class="panel-body">
                            <div class="owl-carousel owl-theme cate-product-carousel uk-container uk-container-center">
                                @foreach ($cat->products as $keyProduct => $product)
                                    @include('frontend/component/product-item', [
                                        'product' => $product,
                                    ])
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
    </div>

    <div class="product-container">
        @if (isset($widgets['feature-product']))
            @foreach ($widgets['feature-product']->object as $cat)
                @php
                    $nameF = $widgets['feature-product']->name;
                @endphp
           
                <div class="panel-product feature-product feature-product-mobile">
                   
                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $nameF }}</h2>
                    </div>

                    <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-column uk-flex-center uk-flex-middle tabs tabs-mobile" uk-tab="connect: #product-switcher">
                        <li class="item uk-active"><a href="#">Phụ kiện</a></li>
                        <li class="item"><a href="#">Tủ bếp Inox cao cấp</a></li>
                        <li class="item"><a href="#">Cửa thép chống cháy</a></li>
                        <li class="item"><a href="#">Cửa kính chống cháy</a></li>
                        <li class="item"><a href="#">Cửa thép vân gỗ</a></li>
                    </ul>
                    
                    @if ($cat->products)
                        <ul class="panel-body uk-flex uk-flex-middle uk-flex-wrap uk-container uk-container-center uk-switcher" id="product-switcher">
                            @foreach ($cat->products as $keyProduct => $product)
                                @include('frontend/component/product-feature', [
                                    'product' => $product,
                                ])
                            @endforeach
                        </ul>
                    @endif
                </div> <!-- Closing the panel-product feature-product div -->
            @endforeach
        @endif
    </div>

    <div class="post post-mobile">
        @if (isset($widgets['post']))
        @foreach ($widgets['post']->object as $cat)
            @php
                $nameF = $widgets['post']->name;
            @endphp
       
            <div class="panel-product post">
               
                <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                    <h2 class="heading-3">{{ $nameF }}</h2>
                </div>

                <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-column uk-flex-middle tabs tabs-mobile" uk-tab="connect: #product-switcher">
                    <li class="item uk-active"><a href="#">Khu độ thị , tòa nhà</a></li>
                    <li class="item"><a href="#">Trụ sở văn phòng</a></li>
                    <li class="item"><a href="#">Trường học, bệnh viện</a></li>
                    <li class="item"><a href="#">Khách sạn , TT thương mại</a></li>
                    <li class="item"><a href="#">Nhà máy , khu công nghiệp</a></li>
                </ul>
                
                @if ($cat->posts)
                    <ul class="panel-body uk-flex uk-flex-middle uk-flex-wrap uk-container uk-container-center uk-switcher" id="product-switcher">
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


    <div class="video-content video-content-mobile">
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
                            @include('frontend/component/post-item', [
                                'post' => $post,
                            ])
                        @endforeach
                    </ul>
                @endif
            @endforeach
        @endif
    </div>


    <div class="news-content news-content-mobile">
        @if (isset($widgets['news']))
      
            @foreach ($widgets['news']->object as $cat)
                @php
                    $nameF = $widgets['news']->name;
                @endphp

                <div class="panel-product news">

                    <div class="panel-head uk-flex uk-flex-middle uk-flex-space-between">
                        <h2 class="heading-3">{{ $nameF }}</h2>
                    </div>
                    <ul class="uk-tab uk-container uk-container-center uk-flex-column uk-flex uk-flex-center uk-flex-middle tabs  tabs-mobile"
                        uk-tab="connect: #news-switcher">
                        <li class="item uk-active"><a href="#">Mới Nhất</a></li>
                        <li class="item"><a href="#">Tin thị trường</a></li>
                        <li class="item"><a href="#">Tin công ty</a></li>
                        <li class="item"><a href="#">Tin tuyển dụng</a></li>
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



    
    <div class="certificate-section certificate-mobile">
        @if (isset($slides[$slideKeyword4]))

        <img src="{{ $slides[$slideKeyword4]['item'][0]['image'] }}" alt="">
        @endif
        <div class="uk-container uk-container-center certificate-info">
            <div class="uk-container uk-container-center certificate-head">
                <h3 class="certificate-title">Giấy chứng nhận</h3>
                <div class="certificate-description">Thông qua các dự án hợp tác với nhiều công ty trong và ngoài nước, Bạn có thể kiểm tra công nghệ và ý tưởng độc đáo của Omax đã được trau dồi trong một thời gian dài.</div>
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

    
  

{{-- 
        @if(isset($widgets['services-1']))
            <div class="mobile-service-container">
                @foreach($widgets['services-1']->object as $key => $val)
                @php
                    $nameC = $val->languages->name;
                    $canonicalC = write_url($val->languages->canonical);
                    $descriptionC = $val->languages->description;
                @endphp
                <div class="panel-service-1">
                    <div class="uk-container uk-container-center">
                        <div class="panel-head">
                            <div class="top-heading">{{ $widgets['services-1']->name }}</div>
                            <h2 class="heading-5"><span>{{ $nameC }}</span></h2>
                            <div class="description">
                                {!! $descriptionC  !!}
                            </div>
                            <a class="readmore button-style" href="{{ $canonicalC }}">Xem thêm</a>
                        </div>
                        @if(isset($val->posts) && count($val->posts))
                            <div class="panel-body">
                                <div class="swiper-container">
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-wrapper">
                                        @foreach($val->posts as $keyPost => $post )
                                            @php
                                                $name = $post->languages[0]->name;
                                                $canonical = write_url($post->languages[0]->canonical);
                                                $image = thumb($post->image, 600, 400)
                                            @endphp
                                            <div class="swiper-slide">
                                                <div class="service-item">
                                                    <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                                    <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        @if(isset($widgets['video']))
            @foreach($widgets['video']->object as $key => $val)
                @php
                    $nameC = $val->languages->name;
                    $canonicalC = write_url($val->languages->canonical);
                @endphp
                <div class="panel-video">
                    <div class="uk-container uk-container-center">
                        <div class="panel-head">
                            <h2 class="heading-6">
                                <span>{{ $widgets['video']->name }}</span>
                                <span class="line"></span>
                            </h2>
                        </div>
                        @if($val->posts)
                            <div class="panel-body">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($val->posts as $keyPost => $post)
                                            @php
                                                if($keyPost > 4) break;
                                                $name = $post->languages[0]->name;
                                                $canonical = write_url($post->languages[0]->canonical);
                                                $video = $post->video;
                                            @endphp
                                            <div class="swiper-slide">
                                                <div class="video-item">
                                                    <a href="{{ $canonical }}" class="image img-cover">
                                                        {!! $video !!}
                                                    </a>
                                                    <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        @if(isset($widgets['projects-feature']))
            <div class="uk-container uk-container-center">
                <div class="post-featured project-featured index">
                    <h2 class="heading-6">
                        <span>{{ $widgets['projects-feature']->name }}</    span>
                    </h2>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($widgets['projects-feature']->object as $key => $val)
                                @php
                                    $name = $val->languages->name;
                                    $canonical = write_url($val->languages->canonical);
                                    $createdAt = $val->created_at;
                                    $image = thumb($val->image, 600, 400);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="post-feature-item">
                                        <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt="{{ $name }}"></a>
                                        <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(isset($widgets['news']))
            <div class="panel-news fix index">
                <div class="uk-container uk-container-center">
                    <div class="panel-head uk-text-center">
                        <h2 class="heading-6"><span>{{ $widgets['news']->name }}</span></h2>
                    </div>
                    <div class="panel-body">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($widgets['news']->object as $key => $val)
                                    @php
                                        if($keyPost > 2) break;
                                        $name = $post->languages->name;
                                        $canonical = write_url($post->languages->canonical);
                                        $image = thumb($post->image, 600, 400);
                                        $description = cutnchar(strip_tags($post['description']), 150);
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="news-item">
                                            <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}" alt=""></a>
                                            <div class="info">
                                                <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif --}}
    </div>

   
@endsection