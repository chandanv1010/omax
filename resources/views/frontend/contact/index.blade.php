@extends('frontend.homepage.layout')
@section('content')
    <div class="contact-page">
        <div class="mb30"><img src="{{ asset('frontend/resources/img/bg_temp.jpg') }}" alt=""></div>
        <div class="contact-page-container">
            <div class="uk-container uk-container-center">
                <div class="panel-head">
                    <h1 class="heading-10"><span>Thông tin liên hệ</span></h1>
                </div>
                <div class="panel-body">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-1-2 mb20">
                            <div class="contact-item">
                                <h2 class="heading-3">Hà Nội</h2>
                                <div class="info">
                                    <div>{{ $system['contact_office'] }}</div>
                                    <div>{{ $system['contact_hotline'] }}</div>
                                    <div>{{ $system['contact_technical_phone'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2 mb20">
                            <div class="contact-item">
                                <h2 class="heading-3">Hồ Chí Minh</h2>
                                <div class="info">
                                    <div>{{ $system['hcm_address'] }}</div>
                                    <div>{{ $system['hcm_hotline'] }}</div>
                                    <div>{{ $system['hcm_phone'] }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2">
                            <div class="contact-item">
                                <h2 class="heading-3">Nhà Máy</h2>
                                <div class="info">
                                    <div>{{ $system['nm_address'] }}</div>
                                    <div>{{ $system['nm_hotline'] }}</div>
                                    <div>{{ $system['nm_phone'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-iframe">
            {!! $system['contact_map'] !!}
        </div>
        <div class="contact-form">
            <div class="uk-container uk-container-center">
                <div class="panel-head">
                    <div class="heading-5"><span>Form liên hệ</span></div>
                </div>
                <div class="panel-body">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-1-2">
                            <div class="contact-form-group">
                                <div class="form-row">
                                    <input type="text" required class="input-text" name="fullname" placeholder="Họ và Tên (*)">
                                </div>
                                <div class="form-row">
                                    <input type="text" required class="input-text" name="phone" placeholder="Số điện thoại (*)">
                                </div>
                                <div class="form-row">
                                    <input type="text" required class="input-text" name="email" placeholder="Email (*)">
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2">
                            <div>
                                <textarea name="" id="" cols="30" rows="10" placeholder="Nội dung(*)"></textarea>
                                <button type="submit" name="submit" value="send" class="mt10 form-submit-button">Gửi thông tin</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

