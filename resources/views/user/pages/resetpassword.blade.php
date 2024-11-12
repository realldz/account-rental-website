@extends('user.layout')

@section('main')
    <div class="container" role="main">
        <div class="woocommerce">
            <form method="post" class="woocommerce-ResetPassword lost_reset_password">
                <p>Quên mật khẩu? Vui lòng nhập tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận được một liên kết tạo mật khẩu
                    mới qua email.</p>
                @if ($errors->any())
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                @elseif (Session::has('successMsg'))
                    <li>{{ Session::get('successMsg') }}</li>
                @endif
                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                    <label for="email">Tên đăng nhập hoặc email&nbsp;<span class="required" aria-hidden="true">*</span><span
                            class="screen-reader-text">Bắt buộc</span></label>
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
        </div>



    </div>
@endsection
