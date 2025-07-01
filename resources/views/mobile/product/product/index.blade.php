@php
    $name = $product->name;
    $canonical = write_url($product->canonical);
    $image = image($product->image);
    $price = getPrice($product);
    $catName = $productCatalogue->name;
    $review = getReview($product);
    
    $description = $product->description;
    $content = $product->content;
    $attributeCatalogue = $product->attributeCatalogue;
    $gallery = json_decode($product->album);
@endphp

@extends('mobile.homepage.layout')
@section('content')
<div class="product-container-mobile">
    @if (!empty($productCatalogue->image))
    <div class="product-banner">
        <img src="{{ image($productCatalogue->image) }}" alt="">
        @include('frontend.component.breadcrumb', [
            'model' => $product,
            'breadcrumb' => $breadcrumb,
        ])
    </div>
@endif
    <div class="uk-container uk-container-center">
        <div class="panel-head">
            {{-- @if(!is_null($menu['main-menu_array']))
                @foreach($menu['main-menu_array'] as $key => $val)
                    @if($key !== 2 ) @continue @endif
                    <ul class="children">
                        @foreach($val['children'] as $key2 => $item)
                            @php
                                $name = $item['item']->languages->first()->pivot->name;
                                $canonical = write_url($item['item']->languages->first()->pivot->canonical);
                            @endphp
                        <li>
                            <a href="{{ $canonical }}" title="{{ $name }}" class="{{ $item['item']->languages->first()->pivot->canonical == $productCatalogue->canonical ? 'active' : '' }}">{{ $name }}</a>
                        </li>
                        @endforeach
                    </ul>
                @endforeach
            @endif --}}
            @if(!is_null($children))
                <ul class="children">
                    @foreach($children as $key => $item)
                        @php
                            $name = $item->languages->first()->pivot->name;
                            $canonical = write_url($item->languages->first()->pivot->canonical);
                        @endphp
                        <li>
                            <a href="{{ $canonical }}" title="{{ $name }}" class="{{ $item->languages->first()->pivot->canonical == $productCatalogue->canonical ? 'active' : '' }}">{{ $name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

           
        </div>
        <div class="uk-container uk-container-center">
        <div class="panel-body uk-flex uk-flex-beetween uk-flex-column uk-flex-center">
            <div class="thumbnail-section uk-flex uk-flex-column uk-flex-middle">
                <div class="vertical-carousel owl-carousel owl-theme" id="thumbnailCarousel">
         
                    @foreach ($gallery as $key => $val)
                
                    <div class="owl-item">
                        <div class="thumbnail-item active" data-image="{{ $val }}">
                            <img src="{{ $val }}" alt="Tay nắm cửa 1">
                        </div>
                    </div>
                    @endforeach    
                </div>
                 <!-- Main Image Section -->
                <div class="main-image-section">
                    <img src="{{ $image }}" alt="Tay nắm cửa chính" class="main-image" id="mainImage">
                <div class="zoom-overlay">1160 Hug × 670 Hug</div>
                </div>

            </div>
            
           
            
            <!-- Product Info Section -->
            <div class="product-info">
                <h1 class="product-detail-name ">{{ $product->name }}</h1>
                <p class="product-description">
                    Hệ cửa sổ mở quay trong của Omax có khả năng tích hợp hai chế độ Quay - Lật được phát minh bởi nhà sáng lập Omax, đây là dòng sản phẩm làm nên thương hiệu của Roto trên toàn thế giới.
                </p>
                
                <div class="features-section">
                    <h4>Phụ kiện</h4>
                    <ul class="features-list">
                        <li>Đóng mở tự phụ kiện thứ 1</li>
                        <li>Đóng mở tự phụ kiện thứ 2</li>
                        <li>Đóng mở tự phụ kiện thứ 3</li>
                    </ul>
                    
                    <h4>Ứng dụng</h4>
                    <ul class="features-list">
                        <li>Đóng mở tự phụ kiện thứ 1</li>
                        <li>Đóng mở tự phụ kiện thứ 2</li>
                        <li>Đóng mở tự phụ kiện thứ 3</li>
                    </ul>
                </div>
                
                <div class="social-share">
                    <a href="#" class="social-btn facebook">f</a>
                    <a href="#" class="social-btn google">G</a>
                    <a href="#" class="social-btn twitter">t</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="product-related">
        <div class="uk-container uk-container-center">
            <div class="panel-product">
                <div class="main-heading">
                    <div class="panel-head">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-1"><span>Sản phẩm liên quan</span></h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body list-product">
                    @if(count($productRelated))
                        <div class="uk-grid uk-grid-medium">
                            @foreach($productRelated as $index => $item)
                                @if($item->id != $product->id)
                                    @if($index > 6) @break @endif
                                    <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-3 mb20">
                                        @include('frontend.component.p-item', ['product' => $item])
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection