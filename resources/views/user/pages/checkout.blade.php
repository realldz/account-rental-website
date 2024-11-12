@extends('user.layout')
@section('main')
    <main id="main" class="">
        <div class="cart-container container page-wrapper page-checkout">
            <div class="woocommerce">
                <div class="row">
                    <div class="col large-8">
                        <h3 class="cart-title">Thanh toán</h3>
                        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
                            <p><a href="{{ route('index') }}">Trang chủ</a><span class="separator"> - </span><span
                                    class="last">Thanh toán</span></p>
                        </nav>

                        <div class="cart-heading">
                            <h3><span>Giỏ hàng</span></h3>
                        </div>
                    </div>
                </div>

                <form name="checkout" method="post" class="checkout woocommerce-checkout "
                    action="" enctype="multipart/form-data" novalidate="novalidate">
                    <div class="row checkout-custom ">
                        <div class="large-8 col checkout-left ">
                            <div class="col-inner">
                                <div class="woocommerce-notices-wrapper"></div>
                                <div class="woocommerce">
                                    <div class=" pb-0 cart-auto-refresh">
                                        <div class="cart-wrapper sm-touch-scroll">
                                            <table
                                                class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                cellspacing="0">
                                                <tbody>
                                                    @foreach($cart_items as $cart_item)
                                                        <tr class="woocommerce-cart-form__cart-item cart_item">

                                                            <td class="product-remove">
                                                                <a href="{{ route('user.cart.remove') }}"
                                                                    class="remove" aria-label="" data-cart-id="{{ $cart_item->id }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="15" viewBox="0 0 14 15" fill="none">
                                                                        <path
                                                                            d="M11.8429 5.8292C11.8429 5.8292 11.4829 10.2952 11.274 12.1764C11.1745 13.0749 10.6195 13.6014 9.71038 13.618C7.98035 13.6491 6.24834 13.6511 4.51897 13.6147C3.64434 13.5968 3.09861 13.0636 3.00113 12.181C2.79093 10.2832 2.43286 5.8292 2.43286 5.8292"
                                                                            stroke="white" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path d="M12.76 3.68901H1.51514" stroke="white"
                                                                            stroke-width="1.5" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                        <path d="M4.83069 6.01699L5.59546 13.2572"
                                                                            stroke="white" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path d="M9.17659 5.9572L8.56396 13.2119"
                                                                            stroke="white" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                        <path
                                                                            d="M10.5936 3.68883C10.0731 3.68883 9.62483 3.32081 9.52272 2.81088L9.36158 2.00457C9.26211 1.63257 8.92526 1.37529 8.54132 1.37529H5.73443C5.35049 1.37529 5.01364 1.63257 4.91417 2.00457L4.75303 2.81088C4.65091 3.32081 4.20266 3.68883 3.68213 3.68883"
                                                                            stroke="white" stroke-width="1.5"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </path>
                                                                    </svg></a>
                                                            </td>

                                                            <td class="product-thumbnail">
                                                                <a
                                                                    href="{{ route('product', $cart_item->product->slug) }}"><img
                                                                        decoding="async" width="247" height="247"
                                                                        src="{{ $cart_item->product->image_link }}"
                                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image"
                                                                        alt="{{ $cart_item->product->name }}"
                                                                        style="aspect-ratio: 1/1;"></a>
                                                            </td>

                                                            <td class="product-name" data-title="Sản phẩm">


                                                                <a
                                                                    href="{{ route('product', $cart_item->product->slug) }}">{{ $cart_item->product->name }}</a>
                                                                <dl class="variation">
                                                                    <dt class="variation-Gingk">Thời hạn:</dt>
                                                                    <dd class="variation-Gingk">
                                                                        <p>{{ $cart_item->productCycle->cycle_value }} {{ $cart_item->productCycle->cycle_label }}</p>
                                                                    </dd>
                                                                </dl>
                                                                <div class="mobile-product-price">
                                                                    <span class="mobile-product-price__qty">
                                                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                                                    class="woocommerce-Price-amount amount">{{ $cart_item->productCycle->formated_cycle_price }}</span><span
                                                                                    class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                                                                    </span>
                                                                </div>
                                                            </td>

                                                            <td class="product-quantity" data-title="Số lượng">
                                                                <div class="quantity-title">
                                                                    Số lượng
                                                                </div>
                                                                <div class="ux-quantity quantity buttons_added">

                                                                    <div class="wrapbutton"><label id="add-img-label"
                                                                            for="minus-button"><img decoding="async"
                                                                                src="/assets/images/minus.svg"
                                                                                alt="minus"></label><input
                                                                            type="button" value="-"
                                                                            id="minus-button"
                                                                            class="ux-quantity__button ux-quantity__button--minus button minus is-form">
                                                                    </div> <label class="screen-reader-text"
                                                                        for="quantity_{{ $cart_item->id }}">Số lượng</label>
                                                                    <input type="number" id="quantity_{{ $cart_item->id }}"
                                                                        class="input-text qty text gpls-arcw-quantity-input"
                                                                        name="cart[{{ $cart_item->id }}][qty]"
                                                                        value="{{ $cart_item->amount }}" aria-label="Số lượng sản phẩm"
                                                                        size="4" min="0" max=""
                                                                        step="1" placeholder="" inputmode="numeric" 
                                                                        data-cart-id="{{ $cart_item->id }}"
                                                                        autocomplete="off">
                                                                    <div class="wrapbutton"><label id="add-img-label"
                                                                            for="plus-button"><img decoding="async"
                                                                                src="/assets/images/plus.svg"
                                                                                alt="plus"></label><input
                                                                            type="button" value="+"
                                                                            id="plus-button"
                                                                            class="ux-quantity__button ux-quantity__button--plus button plus is-form">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="cart-footer-content after-cart-content relative"></div>
                                <div class="woocommerce-privacy-policy-text">
                                    <p>Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của
                                        bạn trên toàn bộ trang web này và cho các mục đích khác được mô tả trong <a
                                            href="" class="woocommerce-privacy-policy-link" target="_blank">chính
                                            sách riêng
                                            tư</a>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="large-4 col">
                            <div class="col-inner ">
                                <div class="checkout-sidebar sm-touch-scroll">
                                    <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <div id="checkout-loading-overlay" class="checkout-loading-overlay" style="display: none;">
                                            <div class="checkout-loader"></div>
                                        </div>
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Tạm tính</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr class="cart_item">
                                                    <td class="product-name">
                                                        Mua Tài khoản Netflix Premium-Cookies, 7 ngày&nbsp; <strong
                                                            class="product-quantity">×&nbsp;1</strong>
                                                        <dl class="variation">
                                                            <dt class="variation-Gingk">Gói đăng ký:</dt>
                                                            <dd class="variation-Gingk">
                                                                <p>Cookies</p>
                                                            </dd>
                                                        </dl>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-amount amount">19,000</span><span
                                                                    class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Mua Tài khoản Netflix Premium-Việt Nam, 01 tháng&nbsp; <strong
                                                            class="product-quantity">×&nbsp;1</strong>
                                                        <dl class="variation">
                                                            <dt class="variation-Gingk">Gói đăng ký:</dt>
                                                            <dd class="variation-Gingk">
                                                                <p>Việt Nam</p>
                                                            </dd>
                                                        </dl>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-amount amount">89,000</span><span
                                                                    class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Tạm tính</th>
                                                    <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                                    class="woocommerce-Price-amount amount">0</span><span
                                                                    class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Tổng</th>
                                                    <td><strong><span class="woocommerce-Price-amount amount"><bdi><span
                                                                        class="woocommerce-Price-amount amount">0</span><span
                                                                        class="woocommerce-Price-currencySymbol">đ</span></bdi></span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div id="payment" class="woocommerce-checkout-payment"
                                            style="position: static; zoom: 1;">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_momo">
                                                    <input id="payment_method_momo" type="radio" class="input-radio"
                                                        name="payment_method" value="momo" data-order_button_text="">

                                                    <label for="payment_method_momo">
                                                        Thanh toán bằng ví MoMo <img
                                                            src=""
                                                            alt="Thanh toán bằng ví MoMo"> </label>
                                                    <div class="payment_box payment_method_momo" style="display:none;">
                                                        <p>Quét mã thanh toán tới nhà cung cấp dịch vụ là</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <noscript>
                                                    Trình duyệt của bạn không hỗ trợ JavaScript, hoặc nó bị vô hiệu hóa, hãy
                                                    đảm bảo bạn nhấp vào <em>Cập nhật giỏ hàng</em> trước khi bạn thanh
                                                    toán. Bạn có thể phải trả nhiều hơn số tiền đã nói ở trên, nếu bạn không
                                                    làm như vậy. <br /><button type="submit" class="button alt"
                                                        name="woocommerce_checkout_update_totals"
                                                        value="Cập nhật tổng">Cập nhật tổng</button>
                                                </noscript>

                                                <div class="woocommerce-terms-and-conditions-wrapper mb-half">

                                                </div>


                                                <button type="submit" class="button alt"
                                                    name="woocommerce_checkout_place_order" id="place_order"
                                                    value="Đặt hàng" data-value="Đặt hàng">Đặt hàng</button>

                                                <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                    name="woocommerce-process-checkout-nonce" value="9b823da166"><input
                                                    type="hidden" name="_wp_http_referer"
                                                    value="/?wc-ajax=update_order_review">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>


            </div>
        </div>


    </main>
    <style>
        .payment_box {
            max-height: 0;
            overflow: hidden;
            transition: max-height 1s ease;
            /* padding: 0 10px; */
        }

        .payment_box.open {
            max-height: 200px;
            /* padding: 10px; */
        }
    </style>
    <style>
    .checkout-loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }
    
    .checkout-loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    </style>
@endsection
@section('js')
@include('user.js.toast')
@include('user.js.getCartCount')
    <script>
        // $('.payment_box').show();
        $('.wc_payment_method').on('click', function() {
            $('.payment_box').hide().removeClass('open');
            console.log($(this).children('.payment_box').show().addClass('open'));
        });
        //TODO
        $('.plus').on('click', function() {
            setAmount(this, 1);
        });
        $('.minus').on('click', function() {
            setAmount(this, -1);
        });

        let debounceTimeout;
        $('input.qty').on('input', function() {
            clearTimeout(debounceTimeout);

            // Đặt timeout mới để chỉ thực thi sau 1 giây nếu không có sự kiện nào khác
            debounceTimeout = setTimeout(() => {
                const self = this;
                updateAmount(self).then(() => getTotal());
                // Thực hiện các xử lý khác tại đây
            }, 500);
        });

        $('.remove').on('click', function(event) {
            event.preventDefault();
            const self = this;
            const cart_id = $(self).attr('data-cart-id');

            const ajaxRequest = $.ajax({
                url: "{{ route('user.cart.remove') }}",
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_item_id: cart_id,
                },
            });
            ajaxRequest.done(function(r) {
                $(self).closest(".woocommerce-cart-form__cart-item.cart_item").remove();
                toast({
                    title: 'Thành công',
                    text: r.message,
                    icon: 'success',
                });
                
            }).then(() => getTotal())
            ajaxRequest.fail(function(r) {
                toast({
                    title: 'Lỗi',
                    text: r.responseJSON.message,
                    icon: 'error',
                });
            })
        });
        function setAmount(e, i) {
            var amount = parseInt($(e).parent().parent().children('.gpls-arcw-quantity-input').val());
            if (amount + i < 1) {
                $(e).parent().parent().children('.gpls-arcw-quantity-input').val(1).trigger('input');
                return;
            }
            $(e).parent().parent().children('.gpls-arcw-quantity-input').val(amount + i).trigger('input');
        }

        // function getPrice(self) {
        //     return $.ajax({
        //         url: "{{ route('user.cart.getPrice') }}",
        //         method: 'GET',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             cart_item_id: $(self).attr('data-cart-id'),
        //         },
        //     }).done(function(r) {
        //         const price = r.message.price.toLocaleString().replace(".", ",");
        //         $(self).closest(".woocommerce-cart-form__cart-item.cart_item").find('bdi').children('.amount').text(price);
        //     }).fail(function(r) {
        //         toast({
        //             title: 'Lỗi',
        //             text: r.responseJSON.message,
        //             icon: 'error',
        //         });
        //     });
        // }

        function getTotal() {
            $('#checkout-loading-overlay').show();
            return $.ajax({
                url: "{{ route('user.cart.getTotalPrice') }}",
                method: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(r) {
                if ($('.woocommerce-cart-form__cart-item').length == 0) {
                    $('.woocommerce-notices-wrapper').text('Không có sản phẩm nào trong giỏ hàng')
                } else {
                    $('.woocommerce-notices-wrapper').text('')
                }
                const price = r.message.total.toLocaleString().replace(".", ",");
                $('.cart-subtotal').find('bdi').children('.woocommerce-Price-amount').text(price);
                $('.order-total').find('bdi').children('.woocommerce-Price-amount').text(price);
                $('#checkout-loading-overlay').hide();
                getCartCount();
            })
        }

        function updateAmount(e) {
            return $.ajax({
                url: "{{ route('user.cart.update') }}",
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_item_id: $(e).attr('data-cart-id'),
                    amount: $(e).closest('.woocommerce-cart-form__cart-item').find('.gpls-arcw-quantity-input').val(),
                },
            }).done(function(r) {
                return true;
            }).fail(function(r) {
                toast({
                    title: 'Lỗi',
                    text: r.responseJSON.message,
                    icon: 'error',
                });
                return false;
            })
        }
        getTotal();
    </script>
@endsection
