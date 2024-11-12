@extends('user.layout')

@section('main')
    <main id="main" class="">
        <div class="page-wrapper my-account mb">
            <div class="container" role="main">
                <div class="row vertical-tabs">
                    <div class="large-3 col">
                        <div class="col-inner">
                            <div class="account-user circle">
                                <span class="image mr-half inline-block">
                                    <img alt="Avatar"
                                        src="/assets/images/avatar.jpg"
                                        srcset="/assets/images/avatar.jpg 2x"
                                        class="avatar avatar-70 photo" height="70" width="70" decoding="async">
                                </span>
                                <span class="user-name inline-block">
                                    {{ $user->name }} <em class="user-id op-5">#{{ $user->id }}</em>
                                </span>
                            </div>
                            <ul id="my-account-nav" class="account-nav nav nav-line nav-uppercase nav-vertical mt-half">
                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard
                                    {{ Route::is('user.my-account.index') ? 'active' : '' }}">
                                    <a href="{{ route('user.my-account.index') }}">Trang tài khoản</a>
                                </li>
                                
                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders
                                    {{ Route::is('user.my-account.order.index') ? 'active' : '' }}">
                                    <a href="{{ route('user.my-account.order.index') }}">Đơn hàng</a>
                                </li>
                                
                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account
                                    {{ Route::is('user.my-account.edit-account.index') ? 'active' : '' }}">
                                    <a href="{{ route('user.my-account.edit-account.index') }}">Tài khoản</a>
                                </li>
                                
                                <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                    <a href="{{ route('auth.logout') }}">Thoát</a>
                                </li>
                            </ul>
                            

                        </div>
                    </div>
                    <div class="large-9 col dashboard-info ">
                        <div class="col-inner">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
