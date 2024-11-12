@extends('user.myAccountLayout')
@section('content')
<div class="woocommerce">
    <div class="woocommerce-MyAccount-content">
        <div class="woocommerce-notices-wrapper">
            @if (Session::has('successMsg'))
                <li>{{ Session::get('successMsg') }}</li>
            @elseif ($errors->any())
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            @endif
        </div>
    <form class="woocommerce-EditAccountForm edit-account" action="{{ route('user.my-account.edit-account.update') }}" method="post">
        @method('PUT')
        @csrf   
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_display_name">Tên hiển thị&nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="name" value="{{ $user->name }}"> <span><em>Tên này sẽ hiển thị trong trang Tài khoản và phần Đánh giá sản phẩm</em></span>
        </p>
        <div class="clear"></div>
    
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="account_email">Địa chỉ email&nbsp;<span class="required">*</span></label>
            <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email" autocomplete="email" value="{{ $user->email }}">
        </p>
        <fieldset>
            <legend>Thay đổi mật khẩu</legend>
    
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_current">Mật khẩu hiện tại (bỏ trống nếu không đổi)</label>
                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password_current" autocomplete="off"><span class="show-password-input"></span></span>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_1">Mật khẩu mới (bỏ trống nếu không đổi)</label>
                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="new_password" id="new_password" autocomplete="off"><span class="show-password-input"></span></span>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_2">Xác nhận mật khẩu mới</label>
                <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="new_password_confirmation" id="new_password_confirmation" autocomplete="off"><span class="show-password-input"></span></span>
            </p>
        </fieldset>
        <div class="clear"></div>

        <p>
            <button type="submit" class="woocommerce-Button button" name="save_account_details" value="Lưu thay đổi">Lưu thay đổi</button>
        </p>
    
        </form>
    
    </div>
    </div>
@endsection