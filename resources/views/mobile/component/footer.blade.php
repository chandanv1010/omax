@if (
!request()->routeIs('tin-tuc*') && !(request()->is('*tin-tuc*'))

&&

!request()->routeIs('video*') && !(request()->is('*video*'))
)
<div class="customer-banner customer-banner-mobile">
    @if (isset($widgets['customer-banner']))
        <div class="uk-container uk-container-center customer-banner-content">
            <div class="customer-banner uk-container uk-container-center">
                <h3 class="customer-banner-title">{{ $widgets['customer-banner']->name }}</h3>
                @if (isset($widgets['customer-banner']->description))
                    @foreach ($widgets['customer-banner']->description as $value)
                        <div class="customer-banner-description">{!! $value !!}</div>
                    @endforeach
                @endif
            </div>
            <!-- Carousel customer-banner -->
            <div class="customer-banners">
                @if (isset($widgets['customer-banner']->album))
                    <div class="customer-banner-item uk-flex uk-flex-middle uk-flex-column">
                        @foreach ($widgets['customer-banner']->album as $val)
                            <div class="customer-banner-image">
                                <img src="{{ $val }}" alt="{{ $widgets['customer-banner']->name }}">
                            </div>
                        @endforeach
                    </div>

                @endif

            </div>
        </div>
    @endif
</div>
@endif

<footer class="footer footer-mobile">
    <div class="panel-official">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-large">
                <div class="uk-width-large-1-3">
                    <div class="official-item">
                        <div class="footer-logo">
                            <img src="{{ $system['homepage_logo'] }}" alt="{{ $system['homepage_logo'] }}">
                            <h3 class="footer-title">Công ty cổ phần Lecmax Việt Nam</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row uk-clearfix">
                                <span class="value">{{ $system['contact_office'] }}</span>
                                <span class="value">{{ $system['contact_hotline'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="value">{{ $system['contact_office'] }}</span>
                                <span class="value">{{ $system['contact_hotline'] }}</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="value">{{ $system['contact_office'] }}</span>
                                 <span class="value">{{ $system['contact_hotline'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-width-large-1-3">
                    <div class="official-item">
                        <div class="panel-head">
                           Chính sách
                        </div>
                        <div class="panel-body">
                            <div class="row uk-clearfix">
                                <span class="label"></i>Chính sách bảo mật:</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"></i>Chính sách thanh toán: </span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"></i>Chính sách bảo hành: </span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"></i>Chính sách đổi trả:</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label"></i>Chính sách bảo hiểm:</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-1-3">
                    <div class="official-item">
                        <div class="panel-head">
                            Kết nối với chúng tôi
                        </div>
                        <div class="panel-body">
                            <div class="row uk-clearfix">
                                <span class="label">Link Facebook:</span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label">Link Yotube: </span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label">Link Zalo: </span>
                            </div>
                            <div class="row uk-clearfix">
                                <span class="label">Link Khác: </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="copyright">
        <div class="uk-container uk-container-center">
            <div class="uk-text-center">
                {{ $system['homepage_copyright']}}
            </div>
        </div>
    </div>

</footer>