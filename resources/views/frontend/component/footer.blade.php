
<div class="customer-banner">
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
                    <div class="customer-banner-item uk-flex uk-flex-middle">
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
<footer class="footer">
  <div class="uk-container uk-container-center">
    <div class="footer-upper">
      <div class="uk-grid uk-grid-medium">
        <div class="uk-width-large-1-3">
          <div class="footer-company">
            <div class="footer-contact">
              <div class="heading-6">
                <span>{{ $system['homepage_company'] }}</span>
              </div>
              <p class="address">Văn Phòng : {{ $system['contact_address'] }}</p>
              {{-- <p class="address">Nhà Máy : {{ $system['contact_official'] }}</p> --}}
              <p class="phone">Hotline: {{ $system['contact_hotline'] }}</p>
              <p class="email">Email: {{ $system['contact_email'] }}</p>
            </div>
          </div>
        </div>
        <div class="uk-width-large-2-3">
          <div class="footer-container">
            <div class="uk-grid uk-grid-medium">
                @foreach($menu['footer-menu'] as $key => $val)
                   @php
                       $name = $val['item']->languages->first()->pivot->name;
                   @endphp
              <div class="uk-width-large-1-3">
                <div class="footer-menu">
                  <div class="heading">{{ $name }}</div>
                  @if(count($val['children']))
                  <ul class="uk-list uk-clearfix">
                    @foreach($val['children'] as $item)
                    @php
                        $name = $item['item']->languages->first()->pivot->name;
                        $canonical = write_url($item['item']->languages->first()->pivot->canonical);
                    @endphp
                    <li>
                      <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                    </li>
                    @endforeach
                  </ul>
                  @endif
                </div>
              </div>
              @endforeach
              <div class="uk-width-large-1-3">
                <div class="footer-menu">
                  <div class="heading">Theo dõi chúng tôi trên</div>
                  <div class="social-footer">
                    <div class="social-item facebook">
                      <a href="{{ $system['social_facebook'] }}" title="">Facebook</a>
                    </div>
                    <div class="social-item youtube">
                      <a href="{{ $system['social_youtube'] }}" title="">Youtube</a>
                    </div>
                    <div class="social-item zalo">
                      <a href="" title="">Zalo</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright" style="padding: 15px 0">
    <div class="uk-text-center"> Copyright {{ $system['homepage_company'] }} 2025. Thiết kế bởi HT Việt Nam </div>
  </div>
</footer>