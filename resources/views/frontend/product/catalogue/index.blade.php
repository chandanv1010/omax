@extends('frontend.homepage.layout')
@section('content')
    @php
    $breadcrumbImage = !empty($productCatalogue->album) ? json_decode($productCatalogue->album, true)[0] : asset('userfiles/image/system/breadcrumb.png');
    @endphp
    <div class="product-catalogue page-wrapper">
        <div class="project-banner">
            <span class="image img-cover"><img src="{{ $breadcrumbImage }}" alt=""></span>
            @include('frontend.component.breadcrumb', [
                'model' => $productCatalogue,
                'breadcrumb' => $breadcrumb,
            ])
        </div>
        <div class="panel-body mb30">
            <div class="uk-container uk-container-center mt20">
                <div class="wrapper ">
                    <div class="gray-box mb20">
                        <h1 class="heading-2"><span></span></h1>
                    </div>
                    @if (!is_null($products))
                    <div class="uk-grid uk-grid-medium">
                        @foreach ($products as $product)
                        <div class="uk-width-medium-1-2 uk-width-large-1-4 mb20">
                            @include('frontend.component.p-item', ['product' => $product])
                        </div>
                         @endforeach
                    </div>
                    @endif
                    <div class="uk-flex uk-flex-center">
                        @include('frontend.component.pagination', ['model' => $products])
                    </div>
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
