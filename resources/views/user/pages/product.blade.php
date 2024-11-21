@extends('user.layout')

@section('main')
    <style>
        .variations th,
        .variations td {
            display: block;
            width: 100%;
        }
    </style>
    <div class="shop-container">
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        <div id="product-6303"
            class="post-ftoc rtwpvs-product product type-product post-6303 status-publish first instock product_cat-streaming product_cat-giai-tri product_cat-tai-khoan product_tag-account product_tag-bestsale product_tag-netflix-account product_tag-netflix-android product_tag-netflix-free product_tag-netflix-movies has-post-thumbnail shipping-taxable purchasable product-type-variable"
            data-gallery-variation-id="0">
            <div class="custom-product-page ux-layout-31006 ux-layout-scope-global">
                <section class="section main-product dark" id="section_918793086">
                    <div class="bg section-bg fill bg-fill bg-loaded"></div>
                    <div class="section-content relative">
                        <div class="row" id="row-430042443">
                            <div id="col-1667064029" class="col small-12 large-12">
                                <div class="col-inner">
                                    <p></p>
                                    <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                                        <p><a href="{{ route('index') }}">Trang chủ</a>
                                            <span class="separator"> - </span><a
                                                href="{{ route('search', ['category' => $product->category_id]) }}">{{ $product->category->name }}</a>
                                            <span class="separator"> -
                                            </span>
                                            <span class="last">{{ $product->name }}</span>
                                        </p>
                                    </nav>
                                    <p></p>
                                    <div id="gap-313438185" class="gap-element clearfix"
                                        style="display:block; height:auto;">
                                        <style>
                                            #gap-313438185 {
                                                padding-top: 10px;
                                            }

                                            @media (min-width:550px) {
                                                #gap-313438185 {
                                                    padding-top: 30px;
                                                }
                                            }
                                        </style>
                                    </div>
                                    <div class="row pd-0 row-product-wrrap" id="row-1025486518">
                                        <div id="col-1227130410" class="col medium-6 small-12 large-6">
                                            <div class="col-inner">
                                                <div class="row row-main-product" id="row-931665810">
                                                    <div id="col-509419567" class="col medium-6 small-12 large-6">
                                                        <div class="col-inner">
                                                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                                                data-columns="4" style="opacity: 1;">
                                                                <div
                                                                    class="image-tools absolute top show-on-hover right z-3">
                                                                </div>
                                                                <figure
                                                                    class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half flickity-enabled" tabindex="0">
                                                                    <div class="flickity-viewport"
                                                                        style="height: 275px; touch-action: pan-y;">
                                                                        <div class="flickity-slider"
                                                                            style="left: 0px; transform: translateX(0%);">
                                                                            <div data-thumb=""
                                                                                class="woocommerce-product-gallery__image slide first is-selected"
                                                                                style="position: absolute; left: 0%;"><a
                                                                                    href="">
                                                                                    <img width="510" height="510"
                                                                                        src="{{ $product->image_link }}"
                                                                                        class="wp-post-image skip-lazy"
                                                                                        alt="{{ $product->name }} }}" data-caption=""/>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div><button
                                                                        class="flickity-button flickity-prev-next-button previous"
                                                                        type="button" disabled=""
                                                                        aria-label="Previous"><svg
                                                                            class="flickity-button-icon"
                                                                            viewBox="0 0 100 100">
                                                                            <path
                                                                                d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                                                                                class="arrow"></path>
                                                                        </svg></button><button
                                                                        class="flickity-button flickity-prev-next-button next"
                                                                        type="button" disabled="" aria-label="Next"><svg
                                                                            class="flickity-button-icon"
                                                                            viewBox="0 0 100 100">
                                                                            <path
                                                                                d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"
                                                                                class="arrow"
                                                                                transform="translate(100, 100) rotate(180) ">
                                                                            </path>
                                                                        </svg></button>
                                                                </figure>
                                                                {{-- <div class="image-tools absolute bottom left z-3">
                                                                    <a href="#product-zoom"
                                                                        class="zoom-button button is-outline circle icon tooltip hide-for-small"
                                                                        title="Phóng">
                                                                        <i class="icon-expand"></i> </a>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="col-1960382535" class="col pb-0 medium-6 small-12 large-6">
                                                        <div class="col-inner">
                                                            <div class="product-in-stats">
                                                                <div class="prod-stats-item reviews-anchor">
                                                                    <a href="#reviews">
                                                                        <div class="icon">
                                                                            <svg width="16" height="15"
                                                                                viewBox="0 0 16 15" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M8.03125 0C12.4253 0 16 3.154 16 7.03125C16 8.66912 15.3518 10.2562 14.1722 11.5141C13.9387 12.4768 14.2221 13.4967 14.9252 14.1998C15.2192 14.4938 15.0113 15 14.5938 15C13.258 15 11.9703 14.4768 11.0136 13.5539C10.0669 13.8918 9.06534 14.0625 8.03125 14.0625C3.63719 14.0625 0 10.9085 0 7.03125C0 3.154 3.63719 0 8.03125 0ZM11.7188 8.4375C12.4942 8.4375 13.125 7.80669 13.125 7.03125C13.125 6.25581 12.4942 5.625 11.7188 5.625C10.9433 5.625 10.3125 6.25581 10.3125 7.03125C10.3125 7.80669 10.9433 8.4375 11.7188 8.4375ZM7.96875 8.4375C8.74419 8.4375 9.375 7.80669 9.375 7.03125C9.375 6.25581 8.74419 5.625 7.96875 5.625C7.19331 5.625 6.5625 6.25581 6.5625 7.03125C6.5625 7.80669 7.19331 8.4375 7.96875 8.4375ZM4.21875 8.4375C4.99419 8.4375 5.625 7.80669 5.625 7.03125C5.625 6.25581 4.99419 5.625 4.21875 5.625C3.44331 5.625 2.8125 6.25581 2.8125 7.03125C2.8125 7.80669 3.44331 8.4375 4.21875 8.4375Z"
                                                                                    fill="white"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <span>
                                                                            {{ $comments->total() }} </span> <b>
                                                                            Đánh giá từ khách hàng</b>
                                                                        <svg width="10" height="8"
                                                                            viewBox="0 0 10 8" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M0 4H9M9 4L6 0.5M9 4L6 7.5"
                                                                                stroke="white"></path>
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                <div class="prod-stats-item">
                                                                    <div class="icon">
                                                                        <svg width="16" height="16"
                                                                            viewBox="0 0 16 16" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M4.8 12.8C3.92 12.8 3.2 13.52 3.2 14.4C3.2 15.28 3.92 16 4.8 16C5.68 16 6.4 15.28 6.4 14.4C6.4 13.52 5.68 12.8 4.8 12.8ZM0 0V1.6H1.6L4.48 7.68L3.36 9.6C3.28 9.84 3.2 10.16 3.2 10.4C3.2 11.28 3.92 12 4.8 12H14.4V10.4H5.12C5.04 10.4 4.96 10.32 4.96 10.24V10.16L5.68 8.79997H11.6C12.24 8.79997 12.72 8.47997 12.96 7.99997L15.84 2.8C16 2.64 16 2.56 16 2.4C16 1.92 15.68 1.6 15.2 1.6H3.36L2.64 0H0ZM12.8 12.8C11.92 12.8 11.2 13.52 11.2 14.4C11.2 15.28 11.92 16 12.8 16C13.68 16 14.4 15.28 14.4 14.4C14.4 13.52 13.68 12.8 12.8 12.8Z"
                                                                                fill="white"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <span><b>{{ $product->orderItem()->count() }}</b></span>
                                                                    Đã bán
                                                                </div>
                                                                <div class="prod-stats-item reviews-anchor">
                                                                    <a href="/chinh-sach-bao-hanh-doi-tra/">
                                                                        <div class="icon">
                                                                            <svg style="margin-left: 0;" width="21"
                                                                                height="24" viewBox="0 0 21 24"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M19.8048 2.85389L10.3568 0.0296719C10.2245 -0.00989063 10.0835 -0.00989063 9.95113 0.0296719L0.502865 2.85389C0.204411 2.94309 0 3.21684 0 3.52734V13.8828C0 15.2297 0.547276 16.6085 1.62654 17.9808C2.45082 19.029 3.59124 20.0814 5.016 21.1091C7.40951 22.8354 9.76643 23.8944 9.8656 23.9386C9.95729 23.9795 10.0556 24 10.1539 24C10.2523 24 10.3506 23.9796 10.4423 23.9386C10.5414 23.8944 12.8983 22.8354 15.2918 21.1091C16.7165 20.0814 17.8569 19.029 18.6812 17.9808C19.7605 16.6085 20.3077 15.2297 20.3077 13.8828V3.52734C20.3077 3.21684 20.1034 2.94309 19.8048 2.85389Z"
                                                                                    fill="#5BC014"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <b>
                                                                            Chính sách bảo hành</b>
                                                                    </a>
                                                                </div>
                                                                {{-- <div class="prod-stats-item">
                                                                    <div class="saller-rating">
                                                                        <svg class="icon-rating" width="40"
                                                                            height="40" viewBox="0 0 30 30"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <circle opacity="0.1" cx="15"
                                                                                cy="15" r="15" fill="#FFC107">
                                                                            </circle>
                                                                            <g clip-path="url(#clip0)">
                                                                                <path
                                                                                    d="M21.6285 13.0073L17.3247 12.3499L15.3956 8.24093C15.2515 7.93409 14.7481 7.93409 14.604 8.24093L12.6755 12.3499L8.37167 13.0073C8.01817 13.0616 7.877 13.4915 8.12492 13.7453L11.2516 16.9501L10.5125 21.4808C10.4536 21.8408 10.838 22.1108 11.1559 21.9341L15.0001 19.8096L18.8443 21.9347C19.1593 22.1097 19.5472 21.8448 19.4877 21.4814L18.7486 16.9507L21.8753 13.7458C22.1232 13.4915 21.9814 13.0616 21.6285 13.0073Z"
                                                                                    fill="#FFC107"></path>
                                                                            </g>
                                                                            <defs>
                                                                                <clipPath id="clip0">
                                                                                    <rect x="8" y="8" width="14"
                                                                                        height="14" fill="white">
                                                                                    </rect>
                                                                                </clipPath>
                                                                            </defs>
                                                                        </svg>
                                                                        <div class="saller-rating-wrap">
                                                                            <span>Rating</span>
                                                                            <div class="saller-rating-items">
                                                                                <div class="saller-rating-item">
                                                                                    <div class="rating-active"
                                                                                        style="width: 100%;">
                                                                                        <svg width="78" height="14"
                                                                                            viewBox="0 0 78 14"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M13.6285 5.00734L9.32467 4.34993L7.39559 0.240928C7.2515 -0.0659051 6.74809 -0.0659051 6.604 0.240928L4.6755 4.34993L0.37167 5.00734C0.0181704 5.06159 -0.122996 5.49151 0.12492 5.74526L3.25159 8.95009L2.5125 13.4808C2.45359 13.8408 2.838 14.1108 3.15592 13.9341L7.00009 11.8096L10.8443 13.9347C11.1593 14.1097 11.5472 13.8448 11.4877 13.4814L10.7486 8.95068L13.8753 5.74584C14.1232 5.49151 13.9814 5.06159 13.6285 5.00734Z"
                                                                                                fill="#FFC107"></path>
                                                                                            <path
                                                                                                d="M29.6285 5.00734L25.3247 4.34993L23.3956 0.240928C23.2515 -0.0659051 22.7481 -0.0659051 22.604 0.240928L20.6755 4.34993L16.3717 5.00734C16.0182 5.06159 15.877 5.49151 16.1249 5.74526L19.2516 8.95009L18.5125 13.4808C18.4536 13.8408 18.838 14.1108 19.1559 13.9341L23.0001 11.8096L26.8443 13.9347C27.1593 14.1097 27.5472 13.8448 27.4877 13.4814L26.7486 8.95068L29.8753 5.74584C30.1232 5.49151 29.9814 5.06159 29.6285 5.00734Z"
                                                                                                fill="#FFC107"></path>
                                                                                            <path
                                                                                                d="M45.6285 5.00734L41.3247 4.34993L39.3956 0.240928C39.2515 -0.0659051 38.7481 -0.0659051 38.604 0.240928L36.6755 4.34993L32.3717 5.00734C32.0182 5.06159 31.877 5.49151 32.1249 5.74526L35.2516 8.95009L34.5125 13.4808C34.4536 13.8408 34.838 14.1108 35.1559 13.9341L39.0001 11.8096L42.8443 13.9347C43.1593 14.1097 43.5472 13.8448 43.4877 13.4814L42.7486 8.95068L45.8753 5.74584C46.1232 5.49151 45.9814 5.06159 45.6285 5.00734Z"
                                                                                                fill="#FFC107"></path>
                                                                                            <path
                                                                                                d="M61.6285 5.00734L57.3247 4.34993L55.3956 0.240928C55.2515 -0.0659051 54.7481 -0.0659051 54.604 0.240928L52.6755 4.34993L48.3717 5.00734C48.0182 5.06159 47.877 5.49151 48.1249 5.74526L51.2516 8.95009L50.5125 13.4808C50.4536 13.8408 50.838 14.1108 51.1559 13.9341L55.0001 11.8096L58.8443 13.9347C59.1593 14.1097 59.5472 13.8448 59.4877 13.4814L58.7486 8.95068L61.8753 5.74584C62.1232 5.49151 61.9814 5.06159 61.6285 5.00734Z"
                                                                                                fill="#FFC107"></path>
                                                                                            <path
                                                                                                d="M77.6285 5.00734L73.3247 4.34993L71.3956 0.240928C71.2515 -0.0659051 70.7481 -0.0659051 70.604 0.240928L68.6755 4.34993L64.3717 5.00734C64.0182 5.06159 63.877 5.49151 64.1249 5.74526L67.2516 8.95009L66.5125 13.4808C66.4536 13.8408 66.838 14.1108 67.1559 13.9341L71.0001 11.8096L74.8443 13.9347C75.1593 14.1097 75.5472 13.8448 75.4877 13.4814L74.7486 8.95068L77.8753 5.74584C78.1232 5.49151 77.9814 5.06159 77.6285 5.00734Z"
                                                                                                fill="#FFC107"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="percent">5.00</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="col-1878241392" class="col medium-6 small-12 large-6">
                                            <div class="col-inner">
                                                <div class="product-content">
                                                    <div class="product-title-container">
                                                        <h1 class="product-title product_title entry-title">
                                                            {{ $product->name }}</h1>
                                                        <div class="is-divider small"></div>
                                                    </div>
                                                    <div class="product-price-container is-normal">
                                                        <div class="price-wrapper">
                                                            <p class="price product-page-price ">
                                                                <span
                                                                    class="woocommerce-Price-amount amount cycle-price">{{ $product->productCycle->first()->formated_cycle_price ?? 0 }}</span>
                                                                <span class="woocommerce-Price-currencySymbol">đ</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-cart-container form-normal is-normal">
                                                        <style>
                                                            .woocommerce-variation-price {
                                                                display: none;
                                                            }
                                                        </style>
                                                        <script
                                                            src="data:text/javascript;base64,alF1ZXJ5KGZ1bmN0aW9uKCQpe3ZhciBwPSdwLnByaWNlJwpxPSQocCkuaHRtbCgpOyQoJ2Zvcm0uY2FydCcpLm9uKCdzaG93X3ZhcmlhdGlvbicsZnVuY3Rpb24oZXZlbnQsZGF0YSl7aWYoZGF0YS5wcmljZV9odG1sKXskKHApLmh0bWwoZGF0YS5wcmljZV9odG1sKX19KS5vbignaGlkZV92YXJpYXRpb24nLGZ1bmN0aW9uKGV2ZW50KXskKHApLmh0bWwocSl9KX0p"
                                                            defer=""></script>
                                                        <form
                                                            class="variations_form cart ux-swatches-js-attached ux-variation-images-js-attached"
                                                            action="" method="post" enctype="multipart/form-data"
                                                            data-product_id="6303"
                                                            current-image="">
                                                            <table class="variations" cellspacing="0"
                                                                role="presentation">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="label"><label for="pa_time">Thời
                                                                                hạn</label><span
                                                                                class="ux-swatch-selected-value"></span>
                                                                        </th>
                                                                        <td class="value">
                                                                            <div class="rtwpvs-terms-wrapper button-variable-wrapper"
                                                                                data-attribute_name="attribute_pa_time">
                                                                                @foreach ($product->productCycle as $cycle)
                                                                                    @php
                                                                                        $label =
                                                                                            $cycle->cycle_value .
                                                                                            ' ' .
                                                                                            $cycle->cycle_label;
                                                                                    @endphp
                                                                                    <div data-rtwpvs-tooltip="{{ $label }}"
                                                                                        class="rtwpvs-term rtwpvs-button-term button-variable-term-{{ $cycle->id }}"
                                                                                        title="{{ $label }}"
                                                                                        data-term="{{ $cycle->id }}"
                                                                                        unit="{{ $cycle->cycle_unit }}"
                                                                                        value="{{ $cycle->cycle_price }}">
                                                                                        <span
                                                                                            class="rtwpvs-term-span rtwpvs-term-span-button">
                                                                                            {{ $label }}
                                                                                        </span>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div><a class="reset_variations"
                                                                                href="javascript:void(0);"
                                                                                style="visibility: visible;">Xóa</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="single_variation_wrap">
                                                                <div class="woocommerce-variation single_variation"
                                                                    style="display: none;"></div>
                                                                <div
                                                                    class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                                                                    <div class="atc-wrap">
                                                                        <button
                                                                            class="single_add_to_cart_button single_buy_now button alt gpls-arcw-buy-now gpls-arcw-variable-buy-now gpls-arcw-buy-now-ajax wc-variation-selection-needed"
                                                                            name="gpls-arcw-quick-view-buy-now-for-woocommerce-buy-now"
                                                                            type="button" data-product_id="6303">Mua
                                                                            Ngay
                                                                        </button>
                                                                        <button type="button"
                                                                            class="single_add_to_cart_button single_add_to_cart button wc-variation-selection-needed">Thêm
                                                                            vào giỏ
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #section_918793086 {
                            padding-top: 10px;
                            padding-bottom: 10px;
                        }

                        #section_918793086 .section-bg.bg-loaded {
                            background-image: url(/assets/images/cat-img-1400x274-1.jpeg.webp);
                        }

                        @media (min-width:550px) {
                            #section_918793086 {
                                padding-top: 30px;
                                padding-bottom: 30px;
                            }
                        }
                    </style>
                </section>
                <div class="row align-center" id="row-2059261148">
                    <div id="col-1704475357" class="col medium-10 small-12 large-10">
                        <div class="col-inner">
                            <div class="row row-product-section" id="row-604291647">
                                <div id="col-1232847741" class="col col-policy small-12 large-12">
                                    <div class="col-inner" style="background-color:rgb(255, 255, 255);">
                                        <div class="product-section">
                                            <div class="product-section">
                                                <div class="box_policy row row-small row-equal">
                                                    <div class="col large-4">
                                                        <div class="item ship">
                                                            <!--?xml version="1.0" encoding="iso-8859-1"?--><svg
                                                                version="1.1" id="Capa_1"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 403.12 403.12"
                                                                style="enable-background:new 0 0 403.12 403.12;"
                                                                xml:space="preserve">
                                                                <g>
                                                                    <g>
                                                                        <path d="M211.6,183.351l-155.92-64.88c-4.087-1.679-8.761,0.273-10.44,4.36c-0.391,0.952-0.595,1.971-0.6,3v56.88H74.4
                  c4.418,0,8,3.582,8,8s-3.582,8-8,8H33.44c-4.418,0.006-7.995,3.593-7.989,8.011c0.006,4.41,3.579,7.983,7.989,7.989h11.2v6.96H128
                  c4.418,0,8,3.582,8,8s-3.582,8-8,8H8c-4.418,0-8,3.582-8,8s3.582,8,8,8h36.8v6.96h44.64c4.418,0,8,3.582,8,8s-3.582,8-8,8H22
                  c-4.418,0-8,3.582-8,8s3.582,8,8,8h22.64v12.96c-0.281,3.42,1.65,6.639,4.8,8l156,64.56c4.087,1.679,8.761-0.273,10.44-4.36
                  c0.391-0.952,0.595-1.971,0.6-3v-180.08C216.477,187.501,214.556,184.603,211.6,183.351z"></path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M399.52,119.191c-2.228-1.483-5.051-1.753-7.52-0.72l-155.84,64.88c-2.987,1.227-4.944,4.13-4.96,7.36v180.08
                  c0.022,4.418,3.622,7.982,8.04,7.96c1.029-0.005,2.048-0.209,3-0.6l155.92-64.56c2.987-1.227,4.944-4.13,4.96-7.36v-180.4
                  C403.106,123.155,401.755,120.663,399.52,119.191z M269.52,341.511c-0.048,3.233-0.989,6.389-2.72,9.12
                  c-2.864,4.537-7.918,7.216-13.28,7.04c-0.985,0.082-1.975,0.082-2.96,0c-8.972-1.989-14.634-10.874-12.645-19.846
                  c1.125-5.078,4.561-9.338,9.285-11.514c2.01-0.803,4.156-1.211,6.32-1.2c8.837-0.003,16.002,7.158,16.005,15.995
                  C269.525,341.241,269.523,341.376,269.52,341.511z M304.08,335.111L304.08,335.111c-2.064,6.319-7.993,10.564-14.64,10.48
                  c-2.224,0.008-4.427-0.427-6.48-1.28c-6.094-2.688-9.886-8.869-9.52-15.52c0-8.837,7.163-16,16-16s16,7.163,16,16
                  C305.37,330.962,304.909,333.103,304.08,335.111z"></path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M382.72,87.751l-60.4-24l-20.72,8.88l-131.44,56.4l-20.48,8.56l71.12,29.6c1.971,0.822,4.189,0.822,6.16,0l155.92-64.88
                  c2.903-1.229,4.814-4.048,4.88-7.2C387.731,91.862,385.739,88.953,382.72,87.751z"></path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path d="M226.88,24.951c-1.924-0.778-4.076-0.778-6,0l-155.92,62.8c-4.087,1.679-6.039,6.353-4.36,10.44
                  c0.812,1.978,2.383,3.548,4.36,4.36h-0.08l64.56,27.04l20.48-8.8l131.2-56.56l20.72-8.96L226.88,24.951z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="M253.93,332.801c-0.137-0.007-0.273-0.01-0.41-0.01c-4.634-0.221-8.57,3.357-8.79,7.99c-0.221,4.634,3.357,8.57,7.99,8.79
                  c4.634,0.221,8.57-3.357,8.79-7.99c0.006-0.13,0.009-0.26,0.01-0.391C261.741,336.778,258.343,333.022,253.93,332.801z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="M289.85,320.401c-0.137-0.007-0.273-0.01-0.41-0.01c-4.634-0.221-8.57,3.357-8.79,7.99c-0.221,4.634,3.357,8.57,7.99,8.79
                  c4.634,0.221,8.57-3.357,8.79-7.99c0.006-0.13,0.009-0.26,0.01-0.391C297.661,324.378,294.263,320.622,289.85,320.401z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                                <g>
                                                                </g>
                                                            </svg>
                                                            <div class="content">
                                                                <span>Giao hàng</span>
                                                                <p>
                                                                    Gửi tài khoản qua email</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" col large-4">
                                                        <div class="item time">
                                                            <!--?xml version="1.0"?-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                                width="512" height="512">
                                                                <g id="_16-express" data-name="16-express">
                                                                    <g id="glyph">
                                                                        <rect x="276" y="12" width="104" height="48"
                                                                            rx="12"></rect>
                                                                        <path
                                                                            d="M136,188H56a12,12,0,0,0,0,24h80a12,12,0,0,0,0-24Z">
                                                                        </path>
                                                                        <path
                                                                            d="M132,296a12,12,0,0,0-12-12H40a12,12,0,0,0,0,24h80A12,12,0,0,0,132,296Z">
                                                                        </path>
                                                                        <path
                                                                            d="M128,332H72a12,12,0,0,0,0,24h56a12,12,0,0,0,0-24Z">
                                                                        </path>
                                                                        <path
                                                                            d="M132,248a12,12,0,0,0-12-12H16a12,12,0,0,0,0,24H120A12,12,0,0,0,132,248Z">
                                                                        </path>
                                                                        <path
                                                                            d="M328,272V136c-74.991,0-136,61.009-136,136s61.009,136,136,136,136-61.009,136-136Z">
                                                                        </path>
                                                                        <path
                                                                            d="M459.618,149.353l12.867-12.868a12,12,0,1,0-16.97-16.97l-13.392,13.391A179.255,179.255,0,0,0,352,93.6V72H304V93.6a179.255,179.255,0,0,0-90.123,39.3l-13.392-13.391a12,12,0,1,0-16.97,16.97l12.867,12.868A179.327,179.327,0,0,0,148,272c0,99.252,80.748,180,180,180s180-80.748,180-180A179.327,179.327,0,0,0,459.618,149.353ZM328,420A148,148,0,1,1,476,272,148,148,0,0,1,328,420Z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <div class="content">
                                                                <span>Thời gian giao hàng</span>
                                                                <p>
                                                                    Ngay lập tức</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" col large-4">
                                                        <div class="item wr">
                                                            <svg id="Icons" height="512" viewBox="0 0 64 64"
                                                                width="512" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="m50 54.709a6.6 6.6 0 0 0 -4.709-4.709 6.6 6.6 0 0 0 4.709-4.709 6.6 6.6 0 0 0 4.709 4.709 6.6 6.6 0 0 0 -4.709 4.709z">
                                                                </path>
                                                                <path
                                                                    d="m19 9.291c.088.261.184.5.281.733 0 .007 0 .015.005.022l.008.011a6.451 6.451 0 0 0 4.415 3.943 6.6 6.6 0 0 0 -4.709 4.709 8.318 8.318 0 0 0 -1.221-2.421 6.854 6.854 0 0 0 -3.488-2.288 6.6 6.6 0 0 0 4.709-4.709z">
                                                                </path>
                                                                <path
                                                                    d="m45.927 52.447a16.815 16.815 0 0 0 -5.119-1.465.925.925 0 0 1 -.2-.075 31.479 31.479 0 0 1 -7.668 3.925 2.749 2.749 0 0 1 -.949.169 2.808 2.808 0 0 1 -.967-.173 30.455 30.455 0 0 1 -12.524-8.174c-8.04-8.764-8.754-20.386-8.464-26.533a3.083 3.083 0 0 1 2.315-2.853c.91-.225 1.8-.479 2.689-.746a15.924 15.924 0 0 0 -5.235-1.541.989.989 0 0 1 -.773-.724c-.565.117-1.129.238-1.7.336a.973.973 0 0 0 -.812.835c-.75 4.961-2.313 22.12 9.032 34.577a34.982 34.982 0 0 0 16.17 9.953.838.838 0 0 0 .51 0 35.446 35.446 0 0 0 13.695-7.511z">
                                                                </path>
                                                                <path
                                                                    d="m21.541 10.1c.747 1.184 1.85 1.8 3.769 2.307 1.784-.923 3.5-1.907 5.1-2.937a2.9 2.9 0 0 1 3.163 0 60.236 60.236 0 0 0 10.6 5.421 59.966 59.966 0 0 0 7.457 2.38 3.081 3.081 0 0 1 2.318 2.848c.221 4.686-.151 12.542-3.887 19.9a.993.993 0 0 1 .921.807 23.027 23.027 0 0 0 1.092 4.344c7.158-11.4 6.183-24.49 5.387-29.733a.969.969 0 0 0 -.8-.833 56.538 56.538 0 0 1 -11.025-3.1 56.376 56.376 0 0 1 -13.066-7.304.953.953 0 0 0 -1.159 0 56.425 56.425 0 0 1 -9.87 5.9z">
                                                                </path>
                                                                <path
                                                                    d="m48.706 42.394a29.185 29.185 0 0 1 -3.219 4.262c-.556.607-1.143 1.179-1.744 1.736 3.27-.871 4.14-2.092 4.963-5.998z">
                                                                </path>
                                                                <path
                                                                    d="m12.049 20.221c-.275 5.831.39 16.851 7.938 25.082a28.492 28.492 0 0 0 11.725 7.642.781.781 0 0 0 .565 0 28.5 28.5 0 0 0 11.736-7.645c7.549-8.231 8.214-19.251 7.938-25.088a1.085 1.085 0 0 0 -.806-1.007 61.939 61.939 0 0 1 -7.7-2.459 62.274 62.274 0 0 1 -10.945-5.596.908.908 0 0 0 -1 0c-1.018.658-2.093 1.292-3.192 1.912a.99.99 0 0 1 .692.938 1 1 0 0 1 -.819.984c-6.34 1.167-7.03 1.857-8.2 8.2a1 1 0 0 1 -1.967 0 17.4 17.4 0 0 0 -1.414-5.051c-1.222.393-2.472.76-3.744 1.076a1.086 1.086 0 0 0 -.807 1.012zm8.862 10.536 1.252-1.278a3.179 3.179 0 0 1 4.45 0l3.387 3.458a1.13 1.13 0 0 0 1.592 0l9.8-10a3.094 3.094 0 0 1 2.221-.937 3.09 3.09 0 0 1 2.224.939l1.252 1.278a3.222 3.222 0 0 1 0 4.483l-14.068 14.359a3.106 3.106 0 0 1 -4.45 0l-7.66-7.819a3.222 3.222 0 0 1 0-4.483z">
                                                                </path>
                                                                <path
                                                                    d="m30 41.662a1.132 1.132 0 0 0 1.592 0l14.068-14.362a1.209 1.209 0 0 0 0-1.684l-1.251-1.278a1.107 1.107 0 0 0 -1.593 0l-9.8 10a3.18 3.18 0 0 1 -4.45 0l-3.382-3.458a1.134 1.134 0 0 0 -1.593 0l-1.251 1.278a1.209 1.209 0 0 0 0 1.684z">
                                                                </path>
                                                            </svg>
                                                            <div class="content">
                                                                <span>Bảo hành</span>
                                                                <p>
                                                                    Trọn gói đăng ký</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="large-3 col guad">
                                                        <div class="item guad">
                                                            <svg width="21" height="24" viewBox="0 0 21 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M19.8048 2.85389L10.3568 0.0296719C10.2245 -0.00989063 10.0835 -0.00989063 9.95113 0.0296719L0.502865 2.85389C0.204411 2.94309 0 3.21684 0 3.52734V13.8828C0 15.2297 0.547276 16.6085 1.62654 17.9808C2.45082 19.029 3.59124 20.0814 5.016 21.1091C7.40951 22.8354 9.76643 23.8944 9.8656 23.9386C9.95729 23.9795 10.0556 24 10.1539 24C10.2523 24 10.3506 23.9796 10.4423 23.9386C10.5414 23.8944 12.8983 22.8354 15.2918 21.1091C16.7165 20.0814 17.8569 19.029 18.6812 17.9808C19.7605 16.6085 20.3077 15.2297 20.3077 13.8828V3.52734C20.3077 3.21684 20.1034 2.94309 19.8048 2.85389Z"
                                                                    fill="#5BC014"></path>
                                                            </svg>
                                                            <div class="content">
                                                                <span>Chính sách</span>
                                                                <p><a href="#">Chính sách đổi
                                                                        trả</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        #col-1232847741>.col-inner {
                                            padding: 30px 20px 30px 20px;
                                            margin: -60px 0px 0px 0px;
                                            border-radius: 15px;
                                        }

                                        @media (min-width:550px) {
                                            #col-1232847741>.col-inner {
                                                padding: 30px 40px 20px 40px;
                                            }
                                        }
                                    </style>
                                </div>
                            </div>
                            <div class="row product-tab" id="row-1708728402">
                                <div id="col-1877912987" class="col small-12 large-12">
                                    <div class="col-inner">
                                        <div class="product-page-sections">
                                            <div class="product-section">
                                                <div class="title">
                                                    <strong>Thông tin</strong> sản phẩm
                                                </div>
                                                <div class="content-pro fix_height">
                                                    <div id="ftwp-postcontent">
                                                        {!! $product->info !!}
                                                    </div>
                                                    <div class="devvn_readmore_flatsome devvn_readmore_flatsome_more"><a
                                                            title="Xem thêm" href="javascript:void(0);">Xem thêm</a>
                                                    </div>
                                                    <div class="devvn_readmore_flatsome devvn_readmore_flatsome_less"
                                                        style="display: none;"><a title="Xem thêm"
                                                            href="javascript:void(0);">Thu gọn</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        #col-1877912987>.col-inner {
                                            border-radius: 15px;
                                        }
                                    </style>
                                </div>
                            </div>
                            <div class="row" id="row-170714147">
                                <div id="col-105889265" class="col small-12 large-12">
                                    <div class="col-inner">
                                        <div class="related related-products-wrapper product-section">
                                            <div class="title">
                                                <strong>Sản phẩm</strong> tương tự
                                            </div>
                                            <div class="row large-columns-3 medium-columns-2 small-columns-2 row-small">
                                                @foreach ($relatedProduct as $p)
                                                    @include('user.components.cards.productCard', [
                                                        'product' => $p,
                                                    ])
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-product-section" id="reviews">
                                <div id="col-881035490" class="col small-12 large-12">
                                    <div class="col-inner" style="background-color:rgb(255, 255, 255);">
                                        <div class="product-section">
                                            <div class="title"><strong>ĐÁNH GIÁ - NHẬN XÉT
                                                </strong>TỪ KHÁCH HÀNG</div>
                                        </div>
                                        <div class="wp-review-mh__title">ĐÁNH GIÁ - NHẬN XÉT TỪ KHÁCH HÀNG</div>
                                        <div class="wp-reviews-mh " data-type="1">
                                            <div class="customer-reviews__inner">
                                                <div class="col small-12 large-12"
                                                    style="padding: 0; padding-bottom: 10px">
                                                    <span>{{ $comments->total() }}</span> đánh giá
                                                    <a href="javascript:void(0)" class="rv-btn-review"
                                                        style="float: right">Gửi đánh giá
                                                        của bạn</a>
                                                </div>
                                                @foreach ($comments as $comment)
                                                    @if ($comment->parent_id == null)
                                                        @include(
                                                            'user.components.cards.reviewCommentCard',
                                                            ['comment' => $comment]
                                                        )
                                                    @endif
                                                @endforeach
                                                {{ $comments->links('vendor.pagination.custom-reviews') }}
                                                {{-- paginate --}}
                                            </div>
                                        </div>
                                        {{-- modal --}}
                                        <div class="modal micromodal-slide" id="modal-review" aria-hidden="true">
                                            <div class="modal__overlay" tabindex="-1">
                                                <div class="modal__container" role="dialog" aria-modal="true"
                                                    aria-labelledby="modal-review-title">
                                                    <header class="modal__header">
                                                        <div class="modal__title" id="modal-review-title">Đánh giá sản
                                                            phẩm</div>
                                                        <button class="modal__close" aria-label="Close modal"
                                                            data-micromodal-close=""></button>
                                                    </header>
                                                    <main class="modal__content" id="modal-review-content">
                                                        <div class="write-review__inner">
                                                            <div class="write-review__product">
                                                                <img src="{{ $product->image_link }}"
                                                                    class="write-review__product-img">
                                                                <div class="write-review__product-wrap">
                                                                    <div class="write-review__product-name">
                                                                        {{ $product->name }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="write-review__reply--to">
                                                                <div class="review-comment__user-name"></div>
                                                                <div class="review-comment__content"></div>
                                                                <input type="hidden" id="review-comment__id"
                                                                    value="" />
                                                            </div>
                                                            <div class="write-review__heading">Vui lòng đánh giá</div>
                                                            <div class="write-review__rating-message"></div>
                                                            <textarea rows="4" placeholder="Vì sao bạn thích sản phẩm?" class="write-review__input"></textarea>
                                                            <div class="write-review__images"></div>
                                                            <div class="write-review__buttons">
                                                                <button
                                                                    class="write-review__button write-review__button--submit"
                                                                    style="width: 100%;"><span>Đánh
                                                                        giá sản phẩm</span></button>
                                                            </div>
                                                        </div>
                                                    </main>
                                                    <footer class="modal__footer"></footer>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="loading-m">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                style="margin:auto;display:block;" width="200px" height="200px"
                                                viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                                <path fill="none" stroke="#e90c59" stroke-width="7"
                                                    stroke-dasharray="42.76482137044271 42.76482137044271"
                                                    d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z"
                                                    stroke-linecap="round"
                                                    style="transform:scale(0.5700000000000001);transform-origin:50px 50px">
                                                    <animate attributeName="stroke-dashoffset" repeatCount="indefinite"
                                                        dur="1s" keyTimes="0;1" values="0;256.58892822265625">
                                                    </animate>
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <style>
                                        #col-881035490>.col-inner {
                                            padding: 40px 40px 40px 40px;
                                            margin: 0px 0px 0px 0px;
                                            border-radius: 15px;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('js')
@include('user.js.toast')
@include('user.js.getCartCount')
    <script>
        function addToCart(self) {
            $(self).addClass('loading');
            const cycle_id = $('.rtwpvs-button-term.selected').attr('data-term');
            if (!cycle_id) {
                toast({
                    title: 'Lỗi',
                    text: 'Vui lòng chọn thời hạn sản phẩm',
                    icon: 'error',
                });
                $(self).removeClass('loading');
                return Promise.resolve(false);
            }

            return $.ajax({
                url: "{{ route('user.cart.add') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: "{{ $product->id }}",
                    cycle_id: cycle_id,
                    amount: 1,
                },
            }).done(function(data) {
                toast({
                    title: 'Thành công',
                    text: data.message,
                    icon: 'success',
                });
                getCartCount();
                return true;
            }).fail(function(data) {
                toast({
                    title: 'Lỗi',
                    text: data.responseJSON.message,
                    icon: 'error',
                });
                return false;
            }).always(function() {
                $('.single_add_to_cart_button').removeClass('loading');
            });
        }

        $('.rtwpvs-button-term').click(function() {
            $(".rtwpvs-button-term").removeClass("selected");
            $(this).addClass("selected");
        });
        $('.reset_variations').click(function() {
            $(".rtwpvs-button-term").removeClass("selected");
        });
        $('.devvn_readmore_flatsome_more').click(function() {
            $('.content-pro').removeClass('fix_height');
            $('.devvn_readmore_flatsome_more').hide();
            $('.devvn_readmore_flatsome_less').show();
        });
        $('.devvn_readmore_flatsome_less').click(function() {
            $('.content-pro').addClass('fix_height');
            $('.devvn_readmore_flatsome_more').show();
            $('.devvn_readmore_flatsome_less').hide();
        });
        $('.single_add_to_cart').click(function() {
            addToCart(this);
        });
        $('.single_buy_now').click(function() {
            addToCart(this).then((result) => {
                if (result) {
                    setTimeout(() => window.location.href = "{{ route('user.checkout.index') }}", 1500);
                }
            });
        });


        $('.rtwpvs-button-term').click(function() {
            const price = parseInt($(this).attr('value')).toLocaleString('vi-VN');
            $('.cycle-price').text(price.replace(".", ","));
        });

        $('.rv-btn-review').click(function() {
            $('.micromodal-slide').addClass('is-open').attr('aria-hidden', 'false');
        });

        $('.modal__close').click(function() {
            $('.micromodal-slide').removeClass('is-open').attr('aria-hidden', 'true').removeClass('modal-reply-m');
            $('#review-comment__id').val('');
        });

        $('.review-comment__reply').click(function() {
            // Tìm phần tử cha của nút trả lời
            const reviewItem = $(this).closest('.review-item');

            // Lấy tên người dùng từ phần tử có class 'review-comment__user-name'
            const userName = reviewItem.find('.review-comment__user-name').text().trim();
            const commentId = $(this).attr('data-reply-id');
            const content = reviewItem.find('.review-comment__content').text().trim();

            $('.write-review__reply--to .review-comment__user-name').text(userName);
            $('.write-review__reply--to .review-comment__content').text(content);
            $('#review-comment__id').val(commentId);
            $('.micromodal-slide').addClass('is-open modal-reply-m').attr('aria-hidden', 'false');

        });
        $('.write-review__button--submit').click(function() {
            const commentInput = $('.write-review__input').val();
            const commentId = $('#review-comment__id').val();
            const url = commentId ? '{{ route('user.product.comment.reply', [$product->slug, '']) }}' + '/' +
                commentId : '{{ route('user.product.comment.create', $product->slug) }}';
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    content: commentInput,
                },
                success: function(response) {
                    toast({
                        title: 'Thành công',
                        text: response.message,
                        icon: 'success',
                    });

                    setTimeout(() => window.location.reload(), 1500);
                },
                error: function(response) {
                    toast({
                        title: 'Lỗi',
                        text: response.responseJSON.message,
                        icon: 'error',
                    });
                }
            });
        });
    </script>
@endsection
@endsection
