@extends('user.layout')

@section('main')
    <div class="container" role="main">
        <div class="woocommerce">
            @if (isset($passwordReset))
                <form method="post" action="{{ route('auth.change-password') }}"
                    class="woocommerce-ResetPassword lost_reset_password">
                    @if ($errors->any())
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @elseif (Session::has('successMsg'))
                        <li>{{ Session::get('successMsg') }}</li>
                    @endif
                    <p>Nhập mật khẩu mới bên dưới.</p>
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                        <label for="password">Mật khẩu mới&nbsp;<span class="required" aria-hidden="true">*</span><span
                                class="screen-reader-text">Bắt buộc</span></label>
                        <span class="password-input"><input type="password"
                                class="woocommerce-Input woocommerce-Input--text input-text" name="password"
                                id="password" autocomplete="new-password" required="" aria-required="true"><span
                                class="show-password-input"></span></span>
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                        <label for="password_confirmation">Nhập lại mật khẩu mới&nbsp;<span class="required"
                                aria-hidden="true">*</span><span class="screen-reader-text">Bắt buộc</span></label>
                        <span class="password-input"><input type="password"
                                class="woocommerce-Input woocommerce-Input--text input-text" name="password_confirmation"
                                id="password_confirmation" autocomplete="new-password" required="" aria-required="true"><span
                                class="show-password-input"></span></span>
                    </p>

                    <input type="hidden" name="token" value="{{ $passwordReset->token }}">
                    @csrf

                    <div class="clear"></div>


                    <p class="woocommerce-form-row form-row">
                        <button type="submit" class="woocommerce-Button button" value="Lưu">Lưu</button>
                    </p>

                    <input type="hidden" id="woocommerce-reset-password-nonce" name="woocommerce-reset-password-nonce"
                        value="2bde902f6a"><input type="hidden" name="_wp_http_referer"
                        value="/my-account/lost-password/?show-reset-form=true&amp;action">
                </form>
            @else
                <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                    <p>Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật
                        khẩu
                        mới qua email.</p>
                    @if ($errors->any())
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    @elseif (Session::has('successMsg'))
                        <li>{{ Session::get('successMsg') }}</li>
                    @endif
                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                        <label for="email">Tên đăng nhập hoặc email&nbsp;<span class="required"
                                aria-hidden="true">*</span><span class="screen-reader-text">Bắt buộc</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="email"
                            id="email" autocomplete="email" required="" aria-required="true">
                    </p>
                    <div class="clear"></div>
                    <p class="woocommerce-form-row form-row">
                        @csrf
                        <button type="submit" class="woocommerce-Button button" value="Đặt lại mật khẩu">Đặt lại mật
                            khẩu</button>
                    </p>
                </form>
            @endif
        </div>



    </div>
@endsection
