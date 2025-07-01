@extends('frontend.homepage.layout')
@section('content')
    
    <div class="post-catalogue page-wrapper intro-wrapper">
        @if (!empty($postCatalogue->image))
        <div class="project-banner">
            <img src="{{ image($postCatalogue->image) }}" alt="">
            @include('frontend.component.breadcrumb', [
                'model' => $postCatalogue,
                'breadcrumb' => $breadcrumb,
            ])
        </div>
    @endif
        <div class="product-catalogue-wrapper">
            <div class="uk-container uk-container-center">
                @if(isset($postCatalogue->children) && !is_null($postCatalogue->children) )
                    <ul class="children">
                        @foreach($postCatalogue->children as $key => $item)
                            @php
                                $name = $item->short_name;
                                $canonical = write_url($item->languages->first()->pivot->canonical);
                            @endphp
                            <li>
                                <a href="{{ $canonical }}" title="{{ $name }}" class="{{ $item->languages->first()->pivot->canonical == $postCatalogue->canonical ? 'active' : '' }}">{{ $name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <h1 class="page-heading">{{ $postCatalogue->languages->first()->pivot->name }}</h1>
                <ul class="uk-tab uk-container uk-container-center uk-flex uk-flex-center uk-flex-middle tabs"
                uk-tab="connect: #product-switcher">
                <li class="item uk-active"><a href="#">Mới nhất</a></li>
                <li class="item"><a href="#">Tên thị trường</a></li>
                <li class="item"><a href="#">Tin Công ty</a></li>
                <li class="item"><a href="#">Tin tuyển dụng</a></li>
            </ul>

            </div>
        </div>
        <div class="post-container">
            <div class="uk-container uk-container-center" style="padding-top:20px;padding-bottom:20px;">
                <div class="wrapper mb20">
                    <div class="uk-grid uk-grid-medium">
                        @foreach($posts as $keyPost => $post)
                        @php
                            $name = $post->languages->first()->pivot->name;
                            $canonical = write_url($post->languages->first()->pivot->canonical);
                            $image = thumb($post->image, 600, 400);
                            $description = cutnchar(strip_tags($post['description']), 150);
                            $cat = $post->post_catalogues[0]->languages->first()->pivot->name;
                        @endphp
                        <div class="uk-width-medium-1-3 mb20">
                            <div class="news-item">
                                <a href="{{ $canonical }}" title="{{ $name }}" class="image img-cover img-zoomin">
                                    <div class="skeleton-loading"></div>
                                    <img class="lazy-image" data-src="{{ $image }}" alt="{{ $name }}">
                                </a>
                                <div class="info">
                                    <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }} </a></h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="uk-text-center">
                        @include('frontend.component.pagination', ['model' => $posts])
                    </div>    
                </div>
                <div class="description">
                    {!! $postCatalogue->languages->first()->pivot->description !!}
                </div>
                <div class="mt--80">
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
                                <button class="seeMore">
                                    <a href="video.html">
                                        Xem Thêm
                                    </a>
                                </button>
                                

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
                </div>
            </div>
        </div>
    </div>
@endsection

