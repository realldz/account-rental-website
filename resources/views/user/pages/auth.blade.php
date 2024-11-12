@extends('user.layout')
@section('main')
<main id="main" class="">
    <div class="page-wrapper my-account mb">
        <div class="container" role="main">
            <div class="woocommerce">
                <main>
                    <div class="auth-page ">
                        <div class="row align-center">
                            <div class="col large-6 mx-auto">
                                <div class="auth-page-inner tabbed-content">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item tab active active" id="tab1">
                                            <a href="javascript: void(0);" role="tab" aria-selected="true"
                                                aria-controls="tab_tab-1-title">
                                                <span>
                                                    Đăng nhập </span>
                                            </a>
                                        </li>
                                        <li class="nav-item tab" id="tab2" role="presentation">
                                            <a href="javascript: void(0);" role="tab" aria-selected="true"
                                                aria-controls="tab_tab-1-title">
                                                <span>
                                                    Đăng ký </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-panels" id="pills-tabContent">
                                        <div class="panel entry-content active" id="login_form"
                                            style="display: block;">
                                            <div class="account-form">
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $e)
                                                        <li>{{ $e }}</li>
                                                    @endforeach
                                                @endif
                                                <form class="woocommerce-form woocommerce-form-login login"
                                                    method="post" action="{{ route('auth.login') }}">
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        @csrf
                                                        <input type="text"
                                                            placeholder="Email"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="email" id="email"
                                                            autocomplete="email" value="" />
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <input placeholder="Mật khẩu"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            type="password" name="password" id="password"
                                                            autocomplete="current-password" />
                                                    </p>
                                                    <div style="clear:both;margin-bottom: 6px"></div>
                                                    <p class="form-row">
                                                        <button type="submit"
                                                            class="woocommerce-button button w-100 button text-white fw-boldwoocommerce-form-login__submit"
                                                            name="login" value="Đăng nhập">Đăng
                                                            nhập</button>
                                                    </p>
                                                    <p class="woocommerce-LostPassword lost_password">
                                                    <div
                                                        class="header__account-form-action d-flex justify-content-between">
                                                        <label
                                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                            <input
                                                                class="woocommerce-form__input checkmark woocommerce-form__input-checkbox"
                                                                name="remember" type="checkbox"
                                                                id="remember" value="forever" /> <span>Ghi
                                                                nhớ mật khẩu</span>
                                                        </label><a href="{{ route('auth.reset-password') }}">Quên mật
                                                            khẩu?</a>
                                                    </div>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel entry-content" id="reg_form" style="display:none">
                                            <div class="account-form">
                                                @if ($errors->any())
                                                    @foreach ($errors->all() as $e)
                                                        <li>{{ $e }}</li>
                                                    @endforeach
                                                @endif
                                                <form method="post"
                                                    class="woocommerce-form woocommerce-form-register register" action="{{ route('auth.register') }}">
                                                    @csrf
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <input type="text" placeholder="Tên hiển thị"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="name" id="name"
                                                            autocomplete="name" value="" />
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <input type="email" placeholder="Địa chỉ email"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="email" id="email"
                                                            autocomplete="email" value="" />
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <input type="password" placeholder="Mật khẩu"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="password" id="password"
                                                            autocomplete="password" />
                                                    </p>
                                                    <p
                                                        class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <input type="password" placeholder="Nhập lại mật khẩu"
                                                            class="woocommerce-Input woocommerce-Input--text input-text"
                                                            name="password_confirmation" id="password_confirmation"
                                                            autocomplete="password_confirmation" />
                                                    </p>
                                                    <div style="clear:both;margin-bottom: 6px"></div>
                                                    <wc-order-attribution-inputs></wc-order-attribution-inputs>
                                                    <div class="woocommerce-privacy-policy-text">
                                                        <p>Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn
                                                            đặt hàng, hỗ trợ trải nghiệm của bạn trên toàn bộ
                                                            trang web này và cho các mục đích khác được mô tả
                                                            trong<br />
                                                            <a href="#"
                                                                class="woocommerce-privacy-policy-link"
                                                                target="_blank">chính sách riêng tư</a>.
                                                        </p>
                                                    </div>
                                                        <button type="submit"
                                                            class="woocommerce-Button w-100 button text-white fw-bold woocommerce-button button woocommerce-form-register__submit"
                                                            name="register" value="Đăng ký">Đăng ký</button>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>
    $("#tab1").on('click', function() {
            $('#tab1').addClass('active');
            $('#login_form').addClass('active');
            $('#tab2').removeClass('active');
            $('#reg_form').removeClass('active');
        });
    $("#tab2").on('click', function() {
        $('#tab2').addClass('active');
        $('#reg_form').addClass('active');
        $('#tab1').removeClass('active');
        $('#login_form').removeClass('active');
    });
</script>
@endsection