@php
    $name = $product->name;
    $canonical = write_url($product->canonical);
    $image = image($product->image);
    $price = getPrice($product);
    $catName = $productCatalogue->name;
    $review = getReview($product);
    $description = $product->description;
    $attributeCatalogue = $product->attributeCatalogue;
    $gallery = json_decode($product->album);
    $iframe = $product->iframe;

    // dd($product);

@endphp
<div class="info">
    <div class="popup mb30">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-3-5">
                @if(!is_null($gallery))
                    <div class="popup-gallery">
                        <div class="uk-grid uk-grid-medium">
                            <div class="uk-width-medium-1-6">
                                <div class="gallery-left">
                                    <div class="swiper-container-thumbs">
                                        <div class="swiper-wrapper pic-list">
                                            <?php foreach($gallery as $key => $val){  ?>
                                                <div class="swiper-slide">
                                                    <span  class="image img-cover"><img src="{{  image($val) }}" alt="<?php echo $val ?>"></span>
                                                </div>
                                            <?php }  ?>
                                        </div>
                                    </div>
                                    <div class="video-techincal">
                                        <a href="#my-video" data-uk-modal class="vt-item image img-scaledown"><img src="{{ asset('frontend/resources/img/video.webp') }}" alt=""></a>
                                        <a href="#my-description" data-uk-modal class="vt-item image img-scaledown"><img src="{{ asset('frontend/resources/img/info.png') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-5-6">
                                <div class="pd-img">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper big-pic">
                                            <?php foreach($gallery as $key => $val){  ?>
                                            <div class="swiper-slide" data-swiper-autoplay="2000">
                                                <a href="{{ image($val) }}" data-uk-lightbox="{group:'my-group'}" class="image img-cover"><img src="{{ image($val) }}" alt="<?php echo $val ?>"></a>
                                            </div>
                                            <?php }  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @php
                            $slideKeyword = App\Enums\SlideEnum::COMMIT;
                        @endphp
                        @if(isset($slides[$slideKeyword]) && count($slides[$slideKeyword]['item']))
                            <div class="commit">
                                <div class="uk-grid uk-grid-small">
                                    @foreach($slides[$slideKeyword]['item'] as $key => $val )
                                        <div class="uk-width-small-1-2">
                                            <div class="commit-item">
                                                <a href="" class="image img-cover">
                                                    <img src="{{ $val['image'] }}" alt="">
                                                </a>
                                                <div class="txt">
                                                    <p>{{ $val['name'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif --}}
                    </div>
                @endif
            </div>
            <div class="uk-width-large-2-5">
                <div class="popup-product">
                    <h1 class="title product-main-title"><span>{{ $name }}</span></h1>
                    <div class="sku mb10">
                        <span>MÃ SP : {{ $product->code }}</span>
                    </div>
                    {{-- <div class="product-promotion mb10">
                        <div class="title">
                            <i class="fa fa-gift"></i>
                            <span>Khuyến mãi</span>
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="">
                                        <i class="fa fa-gift"></i>
                                        <span>{{ $system['text_9'] }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-gift"></i>
                                        <span>{{ $system['text_10'] }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <p>{{ $system['text_11'] }}</p>
                    </div> --}}
                    <div class="product-description mb15">
                        {!! $product->languages->first()->pivot->description !!}
                    </div>
                    {{-- <div class="product-contact">
                        <div class="uk-grid uk-grid-small">
                            <div class="uk-width-small-1-2">
                                <a href="#modal-form" data-uk-modal class="ct" style="padding:20px 0;text-transform:uppercase;font-weight:600">
                                    <p>Nhận báo giá</p>
                                </a>
                            </div>
                            <div class="uk-width-small-1-2">
                                <a href="tel:{{ $system['contact_hotline_hn']  }}" class="ct">
                                    <p>{{ $system['text_1'] }}</p>
                                    <p class="phone"> {{ $system['contact_hotline_hn'] }}</p>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="panel-product-detail">
            {!! $product->content !!}
            <div class="product-content-more">
                <button class="view-all">
                    Xem thêm <i class="fa fa-caret-down"></i>
                </button>
                <button class="view-hide hide">
                    Ẩn bớt
                    <i class="fa fa-caret-up"></i>
                 </button>
            </div>
        </div>
    </div>
    {{-- <div class="product-related mb30">
        <div class="uk-container uk-container-center">
            <div class="panel-product">
                <div class="main-heading">
                    <div class="panel-head">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-1"><span>Sản phẩm tương tự</span></h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body list-product">
                    @if(count($productCatalogue->products))
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($productCatalogue->products as $index => $product)
                                    <div class="swiper-slide">
                                        @include('frontend.component.product-item', ['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    <div class="product-related product-view mb40">
        <div class="uk-container uk-container-center">
            <div class="panel-product">
                <div class="main-heading">
                    <div class="panel-head">
                        <div class="uk-flex uk-flex-middle uk-flex-space-between">
                            <h2 class="heading-1"><span>Sản phẩm đã xem</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($widgets['recommend']))
        <div class="panel-recommend">
            <div class="panel-head">
                <h2 class="heading-1">
                    {{ $widgets['recommend']->name }}
                </h2>
            </div>
            @if(isset($widgets['recommend']->object))
                <div class="panel-body">
                    <div class="uk-grid uk-grid-small">
                        @foreach($widgets['recommend']->object as $k => $v)
                            <div class="uk-width-medium-1-4 mb6">
                                @php 
                                    $name = $v->languages->first()->pivot->name;
                                    $canonical = write_url($v->languages->first()->pivot->canonical);
                                @endphp
                                <a href="{{ $canonical }}" class="recommend-item"><span>{{ $name }}</span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

<input type="hidden" class="productName" value="{{ $product->name }}">
<input type="hidden" class="attributeCatalogue" value="{{ json_encode($attributeCatalogue) }}">
<input type="hidden" class="productCanonical" value="{{ write_url($product->canonical) }}">

<div id="modal-form" class="uk-modal">
    <div class="uk-modal-dialog custom-modal">
        <a class="uk-modal-close uk-close"></a>
        <h2>Hãy cho biết sản phẩm mà bạn quan tâm</h2>
        <form class="uk-form">
        <div class="uk-form-row">
            <label for="full-name">Họ Tên</label>
            <div class="uk-form-controls">
                <input type="text" id="full-name" placeholder="Nhập họ tên">
                <span class="error-message fullname-error"></span>
            </div>
        </div>
        <div class="uk-form-row">
            <label for="phone">Số Điện Thoại</label>
            <div class="uk-form-controls">
                <input type="tel" id="phone" placeholder="Nhập số điện thoại">
                <span class="error-message phone-error"></span>
            </div>
        </div>
        <div class="uk-form-row">
            <label for="product-name">Yêu cầu</label>
            <div class="uk-form-controls">
                <input type="text" id="request" placeholder="Yêu Cầu">
                <span class="error-message request-error"></span>
            </div>
        </div>
        <button type="submit" class="btn-sb">Gửi</button>
        </form>
    </div>
</div>


<!-- This is the modal -->
<div id="my-video" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="modal-content">
            {!! $iframe !!}
        </div>
    </div>
</div>


<div id="my-description" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="modal-content">
            <h2 class="heading-1 span">Thông số kỹ thuật</h2>
            {!! $description !!}
        </div>
    </div>
</div>