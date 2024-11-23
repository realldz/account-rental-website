<header id="header" class="header has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                <div id="logo" class="flex-col logo"><a href="{{ route('index') }}"
                        title="Title" rel="home">
                        <img width="1020" height="574" src="/assets/images/logo.png"
                            class="header_logo header-logo" alt="Logo" /> <img
                            src="/assets/images/logo.png" alt=""
                            class="logo-icon-mobile">
                        <img width="1020" height="574" src="/assets/images/logo.png"
                            class="header-logo-dark" alt="Logo" /></a></div>
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay"
                                data-color="" class="is-small" aria-label="Menu" aria-controls="main-menu"
                                aria-expanded="false"><i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                        <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form role="search" method="get" class="searchform"
                                        action="{{ route('search') }}">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-0">Tìm kiếm:</label>
                                                <input type="search" id="woocommerce-product-search-field-0"
                                                    class="search-field mb-0" placeholder="Nhập nội dung cần tìm..."
                                                    value="" name="q" />
                                            </div>
                                            <div class="flex-col">
                                                <button type="submit" value="Tìm kiếm"
                                                    class="ux-search-submit submit-button secondary button  icon mb-0"
                                                    aria-label="Nộp">
                                                    <i class="icon-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right nav-uppercase">
                        @php
                            $is_login = Auth::check();
                        @endphp
                        <li class="account-item has-icon {{ $is_login ? 'has-dropdown' : '' }}">
                            <a href="{{ $is_login ? route('user.my-account.index') : route('auth') }}"
                                class="nav-top-link nav-top-not-logged-in is-small">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-42 0 512 512.002">
                                    <path
                                        d="m210.351562 246.632812c33.882813 0 63.222657-12.152343 87.195313-36.128906 23.972656-23.972656 36.125-53.304687 36.125-87.191406 0-33.875-12.152344-63.210938-36.128906-87.191406-23.976563-23.96875-53.3125-36.121094-87.191407-36.121094-33.886718 0-63.21875 12.152344-87.191406 36.125s-36.128906 53.308594-36.128906 87.1875c0 33.886719 12.15625 63.222656 36.132812 87.195312 23.976563 23.96875 53.3125 36.125 87.1875 36.125zm0 0" />
                                    <path
                                        d="m426.128906 393.703125c-.691406-9.976563-2.089844-20.859375-4.148437-32.351563-2.078125-11.578124-4.753907-22.523437-7.957031-32.527343-3.308594-10.339844-7.808594-20.550781-13.371094-30.335938-5.773438-10.15625-12.554688-19-20.164063-26.277343-7.957031-7.613282-17.699219-13.734376-28.964843-18.199219-11.226563-4.441407-23.667969-6.691407-36.976563-6.691407-5.226563 0-10.28125 2.144532-20.042969 8.5-6.007812 3.917969-13.035156 8.449219-20.878906 13.460938-6.707031 4.273438-15.792969 8.277344-27.015625 11.902344-10.949219 3.542968-22.066406 5.339844-33.039063 5.339844-10.972656 0-22.085937-1.796876-33.046874-5.339844-11.210938-3.621094-20.296876-7.625-26.996094-11.898438-7.769532-4.964844-14.800782-9.496094-20.898438-13.46875-9.75-6.355468-14.808594-8.5-20.035156-8.5-13.3125 0-25.75 2.253906-36.972656 6.699219-11.257813 4.457031-21.003906 10.578125-28.96875 18.199219-7.605469 7.28125-14.390625 16.121094-20.15625 26.273437-5.558594 9.785157-10.058594 19.992188-13.371094 30.339844-3.199219 10.003906-5.875 20.945313-7.953125 32.523437-2.058594 11.476563-3.457031 22.363282-4.148437 32.363282-.679688 9.796875-1.023438 19.964844-1.023438 30.234375 0 26.726562 8.496094 48.363281 25.25 64.320312 16.546875 15.746094 38.441406 23.734375 65.066406 23.734375h246.53125c26.625 0 48.511719-7.984375 65.0625-23.734375 16.757813-15.945312 25.253906-37.585937 25.253906-64.324219-.003906-10.316406-.351562-20.492187-1.035156-30.242187zm0 0" />
                                </svg>
                                <span>
                                    {{ $is_login ? 'Tài khoản' : 'Đăng nhập' }}
                                </span>
                            </a>
                            @if ($is_login)
                                <ul class="nav-dropdown nav-dropdown-default" style="">
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active active">
                                        <a href="{{ route('user.my-account.index') }}">Trang tài khoản</a>
                                        <!-- empty -->
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                        <a href="{{ route('user.my-account.order.index') }}">Đơn hàng</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                        <a href="{{ route('user.my-account.edit-account.index') }}">Tài khoản</a>
                                    </li>
                                    <li
                                        class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                        <a href="{{ route('auth.logout') }}">Thoát</a>
                                    </li>
                                </ul>
                            @endif

                        </li>
                        <li class="cart-item has-icon"><a href="{{ route('user.checkout.index') }}"
                                class="header-cart-link is-small off-canvas-toggle nav-top-link" title="Giỏ hàng"
                                data-open="#cart-popup" data-class="off-canvas-cart" data-pos="right"><span
                                    class="header-cart-title">
                                    Giỏ hàng </span>
                                    @php
                                        $cart_count = $is_login ? auth()->user()->cart()->count() : 0;
                                    @endphp
                                    <i class="icon-shopping-basket" data-icon-label="{{ $cart_count }}">
                                </i>
                            </a>
                            <div id="cart-popup" class="mfp-hide">
                                <div class="cart-popup-inner inner-padding cart-popup-inner--sticky">
                                    <div class="cart-popup-title text-center">
                                        <span class="heading-font uppercase">Giỏ hàng</span>
                                        <div class="is-divider"></div>
                                    </div>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form role="search" method="get" class="searchform"
                                        action="{{ route('search') }}">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-1">Tìm kiếm:</label>
                                                <input type="search" id="woocommerce-product-search-field-1"
                                                    class="search-field mb-0" placeholder="Nhập nội dung cần tìm..."
                                                    value="" name="q" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <div class="flex-col">
                                                <button type="submit" value="Tìm kiếm"
                                                    class="ux-search-submit submit-button secondary button  icon mb-0"
                                                    aria-label="Nộp">
                                                    <i class="icon-search"></i> </button>
                                            </div>
                                        </div>
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <div id="wide-nav" class="header-bottom wide-nav hide-for-medium">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-left">
                    <ul class="nav header-nav header-bottom-nav nav-left  nav-uppercase">
                        <li class="html custom html_topbar_left">
                            <ul class="nav header-nav header-bottom-nav nav-left custom-menu nav-uppercase">
                                <li class="header-vertical-menu">
                                    <div class="header-vertical-menu__opener dark">
                                        <span class="header-vertical-menu__icon">
                                            <i class="icon-menu"></i> </span>
                                        <span class="header-vertical-menu__title">
                                            Danh mục </span>
                                        <i class="icon-angle-down"></i>
                                    </div>
                                    @include('user.components.menus.categoryMenu')
                                </li>
                            </ul>
                        </li>
                        @foreach (App\Models\Category::whereStatus(1)->get()->shuffle()->take(9) as $category)
                            <li id="menu-item-{{ $category->id }}"
                                class="menu-item menu-item-type-taxonomy menu-item-object-product_brand menu-item-{{ $category->id }} menu-item-design-default has-icon-left">
                                <a href="{{ route('search', ['category' => $category->id]) }}" class="nav-top-link">
                                    {{-- <img
                                        class="ux-menu-icon" width="22" height="20"
                                        src="{{ $category->image_link }}"
                                        alt="{{ $category->name }}" /> --}}
                                        {{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex-col hide-for-medium flex-right flex-grow">
                    <ul class="nav header-nav header-bottom-nav nav-right  nav-uppercase"></ul>
                </div>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>
</header>
