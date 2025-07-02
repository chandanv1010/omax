@extends('frontend.homepage.layout')
@section('content')
 @php
    $breadcrumbImage = !empty($productCatalogue->album) ? json_decode($productCatalogue->album, true)[0] : asset('userfiles/image/system/breadcrumb.png');
    @endphp
<div class="product-container">
    <div class="project-banner">
        <span class="image img-cover"><img src="{{ $breadcrumbImage }}" alt=""></span>
        @include('frontend.component.breadcrumb', [
            'model' => $productCatalogue,
            'breadcrumb' => $breadcrumb,
        ])
    </div>
    <div class="uk-container uk-container-center uk-container-1260 mt40">
        <div class="panel-body">
            @include('frontend.product.product.component.detail', [
                'product' => $product, 'productCatalogue' => $productCatalogue])
        </div>
    </div>
</div>
<div id="qrcode" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="qrcode-container">
            {!! $product->qrcode !!}
        </div>
    </div>
</div>
@endsection
