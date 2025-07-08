<div id="header" class="pc-header uk-visible-large">
    <div class="uk-container uk-container-center">
        <div class="uk-flex uk-flex-middle uk-flex-space-between" style="margin: 0 20px;">
            <div class="logo" style="margin-bottom: 30px">
                <a href="" class="uk-flex uk-flex-middle">
                    <img src="{{ $system['homepage_logo'] }}" alt="">
                </a>
            </div>
            @include('frontend.component.navigation')
            <div class="header-widget">
                <div class="uk-flex uk-flex-middle">
                    <form action="{{ url('tim-kiem') }}">
                        <input type="text" name="keyword" value="" class="input-search"
                            placeholder="Nhập từ khóa ...">
                        <button type="submit" value="" name="" class="btn-search"><img
                                src="{{ asset('frontend/resources/img/search-interface-symbol.png') }}"
                                alt=""></button>
                    </form>
                    <a href="{{ write_url('gio-hang') }}" class="globe-icon">
                        <div class="uk-flex uk-flex-middle">
                            <i style="font-size:17px;" class="fa fa-shopping-cart mr10"></i>
                            <span>Giỏ hàng</span>
                        </div>
                    </a>
                    <a href="" class="contact-now">Liên Hệ ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-header uk-hidden-large">
    <div class="mobile-upper">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="mobile-logo">
                    <a href="." title="{{ $system['seo_meta_title'] }}">
                        <img src="{{ $system['homepage_logo'] }}" alt="Mobile Logo">
                    </a>
                </div>
                <div class="mobile-widget">
                    <div class="uk-flex uk-flex-middle">
                        <a href="{{ write_url('gio-hang') }}" class="uk-flex uk-flex-middle mr20">
                            <i style="font-size:30px;" class="fa fa-shopping-cart mr10"></i>
                        </a>
                        <a href="#mobileCanvas" class="mobile-menu-button" data-uk-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            width="100%" height="100%" preserveAspectRatio="none" 
                            viewBox="0 0 1536 1896.0833" class="" fill="rgb(218,34,41)"> <path d="M1536 1344v128q0 26-19 45t-45 19H64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19H64q-26 0-45-19T0 960V832q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19H64q-26 0-45-19T0 448V320q0-26 19-45t45-19h1408q26 0 45 19t19 45z"></path> </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-mobile">
        <form action="tim-kiem" class="uk-form form mobile-form">
            <div class="form-row">
                <input type="text" name="keyword" value="" class="input-text" placeholder="Từ khóa tìm kiếm...">
                <button name="btn-search" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<div id="mobileCanvas" class="uk-offcanvas offcanvas" >
    <div class="uk-offcanvas-bar" >
        @if(isset($menu['mobile']))
		<ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
			@foreach ($menu['mobile'] as $key => $val)
            @php
                $name = $val['item']->languages->first()->pivot->name;
                $canonical = write_url($val['item']->languages->first()->pivot->canonical, true, true);
            @endphp
			<li class="l1 {{ (count($val['children']))?'uk-parent uk-position-relative':'' }}">
                <?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'<a href="#" title="" class="dropicon"></a>':''; ?>
				<a href="{{ $canonical }}" title="{{ $name }}" class="l1">{{ $name }}</a>
				@if(count($val['children']))
				<ul class="l2 uk-nav-sub">
					@foreach ($val['children'] as $keyItem => $valItem)
                    @php
                        $name_2 = $valItem['item']->languages->first()->pivot->name;
                        $canonical_2 = write_url($valItem['item']->languages->first()->pivot->canonical, true, true);
                    @endphp
					<li class="l2">
                        <a href="{{ $canonical_2 }}" title="{{ $name_2 }}" class="l2">{{ $name_2 }}</a>
                    </li>
					@endforeach
				</ul>
				@endif
			</li>
			@endforeach
		</ul>
		@endif
	</div>
</div>