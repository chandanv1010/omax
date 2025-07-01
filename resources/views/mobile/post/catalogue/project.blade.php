@extends('mobile.homepage.layout')
@section('content')
    <div class="post-catalogue">
        @if (!empty($postCatalogue->image))
            <div class="project-banner">
                <img src="{{ image($postCatalogue->image) }}" alt="">
                @include('frontend.component.breadcrumb', [
                    'model' => $postCatalogue,
                    'breadcrumb' => $breadcrumb,
                ])
            </div>
        @endif

        <div class="uk-container uk-container-center">
            <div class="project-container project-mobile">


                <h1 class="heading-6"><span>{{ $postCatalogue->name }}</span></h1>

                <ul class="uk-tab uk-container uk-container-center uk-flex-column uk-flex uk-flex-center uk-flex-middle tabs tabs-mobile"
                            uk-tab="connect: #product-switcher">
                            <li class="item uk-active"><a href="#">Khu độ thị , tòa nhà</a></li>
                            <li class="item"><a href="#">Trụ sở văn phòng</a></li>
                            <li class="item"><a href="#">Trường học, bệnh viện</a></li>
                            <li class="item"><a href="#">Khách sạn , TT thương mại</a></li>
                            <li class="item"><a href="#">Nhà máy , khu công nghiệp</a></li>
                </ul>
                <div class="project-list">
                    @if (!is_null($posts))
                        <div class="uk-grid uk-grid-medium">
                            @foreach ($posts as $key => $post)
                                @php
                                    $name = $post->languages->first()->pivot->name;
                                    $description = $post->languages->first()->pivot->description;
                                    $image = image($post->image);
                                    $canonical = write_url($post->languages->first()->pivot->canonical);
                                @endphp
                                <div class="uk-width-medium-1-2 uk-width-large-1-3 project-item">
                                    <div class="project-item-1">
                                        <a href="{{ $canonical }}" class="image img-cover"><img src="{{ $image }}"
                                                alt="{{ $name }}"></a>
                                        <div class="info">
                                            <h3 class="title"><a href="{{ $canonical }}"
                                                    title="{{ $name }}">{{ $name }}</a></h3>
                                            <div class="description">
                                                {!! $description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @include('frontend.component.pagination', ['model' => $posts])
                </div>
            </div>
        </div>

    </div>
@endsection
