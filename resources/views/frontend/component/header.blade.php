<div id="header" class="pc-header uk-visible-large">
    <div class="uk-flex uk-flex-middle uk-flex-space-between" style="margin: 0 20px;">
        <div class="logo" style="margin-bottom: 30px">
            <a href="" class="uk-flex uk-flex-middle">
                <img src="{{ $system['homepage_logo'] }}" alt="">
            </a>
        </div>
        @include('frontend.component.navigation')
        <div class="header-widget">
            <div class="uk-flex uk-flex-middle">
                <form action="{{ url('tim-kiem') }}.html">
                    <input type="text" name="" value="" class="input-search"
                        placeholder="Nhập từ khóa ...">
                    <button type="submit" value="" name="" class="btn-search"><img
                            src="{{ asset('frontend/resources/img/search-interface-symbol.png') }}"
                            alt=""></button>
                </form>
                <span class="globe-icon"><img src="{{ asset('frontend/resources/img/globe.png') }}"
                        alt=""></span>
                <a href="" class="contact-now">Liên Hệ ngay</a>
            </div>
        </div>
    </div>
</div>

@if(request()->is('/') || request()->is('home'))
@include('frontend.component.slide')
@endif
