@extends('frontend.homepage.layout')
@section('content')
    
    @php
        $breadcrumbImage = !empty($postCatalogue->album) ? json_decode($postCatalogue->album, true)[0] : asset('userfiles/image/system/breadcrumb.png');
    @endphp
    <div class="post-catalogue page-wrapper intro-wrapper">
         <div class="project-banner">
            <span class="image img-cover"><img src="{{ $breadcrumbImage }}" alt=""></span>
            @include('frontend.component.breadcrumb', [
                'model' => $postCatalogue,
                'breadcrumb' => $breadcrumb,
            ])
        </div>
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
                                <div class="uk-container uk-container-center">
                                    @if ($cat->posts)
                                    <div class="uk-grid uk-grid-medium">
                                        @foreach ($cat->posts as $keyPost => $post)
                                            <div class="uk-width-1-2 uk-width-small-1-2 uk-width-medium-1-3 mb20">
                                                @include('frontend/component/post-video', [
                                                    'posts' => $post,
                                                ])
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

