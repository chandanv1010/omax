@extends('mobile.homepage.layout')
@section('content')
<div class="product-catalogue page-wrapper">
    @if (!empty($productCatalogue->image))
        <div class="product-banner">
            <img src="{{ image($productCatalogue->image) }}" alt="">
            @include('frontend.component.breadcrumb', [
                'model' => $productCatalogue,
                'breadcrumb' => $breadcrumb,
            ])
        </div>
    @endif
    <div class="product-catalogue-wrapper">
        <div class="uk-container uk-container-center">
            {{-- @if (!is_null($menu['main-menu_array']))
                @foreach ($menu['main-menu_array'] as $key => $val)
                    @if ($key !== 2) @continue @endif
                    <ul class="children">
                        @foreach ($val['children'] as $key2 => $item)
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
            <h1 class="page-heading" style="text-align: center;">Sản Phẩm</h1>
                <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-column uk-flex-center uk-flex-middle tabs tabs-mobile"
                            uk-tab="connect: #product-switcher">
                            <li class="item uk-active"><a href="#">Phụ kiện</a></li>
                            <li class="item"><a href="#">Tủ bếp Inox cao cấp</a></li>
                            <li class="item"><a href="#">Cửa Thép chống cháy</a></li>
                            <li class="item"><a href="#">Cửa kính chống cháy</a></li>
                            <li class="item"><a href="#">Cửa thép ván gỗ</a></li>
                </ul>
            @if (!is_null($children))
                <ul class="children">
                    @foreach ($children as $key => $item)
                        @php
                            $name = $item->languages->first()->pivot->name;
                            $canonical = write_url($item->languages->first()->pivot->canonical);
                        @endphp
                        <li>
                            <a href="{{ $canonical }}" title="{{ $name }}"
                                class="{{ $item->languages->first()->pivot->canonical == $productCatalogue->canonical ? 'active' : '' }}">{{ $name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="uk-flex uk-flex-between uk-flex-middle" style="width: 100%">
                <h1 class="page-heading">{{ $productCatalogue->languages->first()->pivot->name }}</h1>
            <div class="owl-nav-custom">
                <button class="owl-prev-custom">‹</button>
                <button class="owl-next-custom">›</button>
            </div>
            </div>
            
        </div>
    </div>
    <div class="panel-body mb30">
        <div class="uk-container uk-container-center mt20">
            <div class="wrapper ">
                <div class="gray-box mb20">
                    <h1 class="heading-2"><span></span></h1>
                </div>
                @if (!is_null($products))
                    <div class="product-list">
                        <div class="owl-carousel owl-theme product-carousel">
                            @foreach ($products as $product)
                                @include('frontend.component.p-item', ['product' => $product])
                            @endforeach
                        </div>


                    </div>

                    <div class="uk-flex uk-flex-center">
                        @include('frontend.component.pagination', ['model' => $products])
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-center">
        <div class="description">
            {!! $productCatalogue->languages->first()->pivot->description !!}
        </div>
    </div>
</div>
@endsection