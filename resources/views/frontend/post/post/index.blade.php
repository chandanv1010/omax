@extends('frontend.homepage.layout')
@section('content')
@php
    $breadcrumbImage = !empty($postCatalogue->album) ? json_decode($postCatalogue->album, true)[0] : asset('userfiles/image/system/breadcrumb.png');
@endphp
<div class="post-detail">
    <div class="project-banner">
        <span class="image img-cover"><img src="{{ $breadcrumbImage }}" alt=""></span>
        @include('frontend.component.breadcrumb', [
            'model' => $postCatalogue,
            'breadcrumb' => $breadcrumb,
        ])
    </div>
    <div class="product-catalogue-wrapper post-container">
        <div class="uk-container uk-container-center">
            <h1 class="page-heading">{{ $post->languages->first()->pivot->name }}</h1>
            <div class="description">
                {!! $postCatalogue->languages->first()->pivot->description !!}
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="uk-container uk-container-center" style="padding-top:30px;padding-bottom:30px;">
            <div class="post-detail-container">
                <div class="post-content {{ $post->status_menu == 2 ? 'full' : '' }}">
                    <div class="description">
                        {!! $post->languages->first()->pivot->description !!}
                    </div>
                    <div class="content">
                        {!! $post->languages->first()->pivot->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    <div class="panel-news fix mb40">
        <div class="uk-container uk-container-center">
            <div class="panel-head uk-text-center mb30">
                <h2 class="heading-5"><span>Bài Viết liên quan</span></h2>
            </div>
            <div class="panel-body">
                <div class="uk-grid uk-grid-medium">
                    @foreach($asidePost as $key => $post)
                        @php
                            $name = $post->languages->first()->pivot->name;
                            $canonical = write_url($post->languages->first()->pivot->canonical);
                            $image = thumb($post->image, 600, 400);
                            $description = cutnchar(strip_tags($post->languages->first()->pivot->description), 250);
                        @endphp
                        <div class="uk-width-small-1-1 uk-width-medium-1-2 uk-width-medium-1-4">
                            <div class="post-item">
                                <a href="{{ $canonical }}" title="{{ $name }}" class="image img-cover img-zoomin">
                                    <img src="{{ $image }}" alt="{{ $name }}">
                                </a>
                                <div class="info" style="margin-top:10px;">
                                    <h3 class="title"><a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a></h3>
                                    <div class="description">
                                        {!! $description !!}
                                    </div>
                                    <div class="read">
                                        <a href="{{ $canonical }}" class="b-readmore">Xem thêm >></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>


document.addEventListener('DOMContentLoaded', function() {
    // Xử lý nút Ẩn/Hiện
    const tocToggle = document.querySelector('.tocToggle');
    const widgetToc = document.querySelector('.widget-toc');
    
    tocToggle.addEventListener('click', function(e) {
        e.preventDefault();
        widgetToc.classList.toggle('collapsed');
        
        if (widgetToc.classList.contains('collapsed')) {
            tocToggle.textContent = 'Hiện';
        } else {
            tocToggle.textContent = 'Ẩn';
        }
    });
    
    // Xử lý scroll đến nội dung khi click vào liên kết
    const tocLinks = document.querySelectorAll('.widget-toc a');
    
    tocLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Lấy id từ href của liên kết
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                // Scroll đến phần tử với hiệu ứng mượt
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
                
                // Thêm một chút padding để không bị che bởi header cố định (nếu có)
                // Điều chỉnh số 80 này tùy theo chiều cao của header của bạn
                window.scrollBy(0, -80);
                
                // Tùy chọn: Thêm hiệu ứng highlight tạm thời cho phần được scroll đến
                targetElement.classList.add('highlight-section');
                setTimeout(function() {
                    targetElement.classList.remove('highlight-section');
                }, 2000);
            }
        });
    });
});
</script>

@endsection
