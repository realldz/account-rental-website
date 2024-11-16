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
            <p>
                Đơn hàng #<mark class="order-number">{{ $order->id }}</mark> đã được đặt lúc <mark class="order-date">{{ $order->created_at }}</mark> và
                hiện tại là <mark class="order-status">{{ $order->status }}</mark>.</p>

            <section class="woocommerce-order-details">

                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>

                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                    <thead>
                        <tr>
                            <th class="woocommerce-table__product-name product-name">Sản phẩm</th>
                            <th class="woocommerce-table__product-table product-total">Tổng</th>
                        </tr>
                    </thead>

                    <tbody>

                            @foreach ($order->item->groupBy('product_id') as $productItems)
                            <tr class="woocommerce-table__line-item order_item">
                                <td class="woocommerce-table__product-name product-name">
                                    {{ $productItems->first()->product->name }}
                                    <strong class="product-quantity">×&nbsp;{{ $productItems->count() }}</strong>
                                </td>
                        
                                <td class="woocommerce-table__product-total product-total">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-amount amount">
                                                {{ number_format($productItems->first()->price * $productItems->count(), 0, ',', '.') }}
                                            </span>
                                            <span class="woocommerce-Price-currencySymbol">đ</span>
                                        </bdi>
                                    </span>
                                </td>
                            </tr>
                            @endforeach

                        

                    </tbody>

                    <tfoot>
                        {{-- <tr>
                            <th scope="row">Tổng số phụ:</th>
                            <td><span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-amount amount">10,000</span><span
                                        class="woocommerce-Price-currencySymbol">đ</span></span></td>
                        </tr> --}}
                        <tr>
                            <th scope="row">Phương thức thanh toán:</th>
                            <td>{{ $order->payment_method }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tổng cộng:</th>
                            <td><span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-amount amount">{{ number_format($order->total_price, 0, ',', '.') }}</span><span
                                        class="woocommerce-Price-currencySymbol">đ</span></span></td>
                        </tr>
                    </tfoot>
                </table>

                <h4>Chi tiết tài khoản</h4>
                <table class="shop_table order_details fslm-license-keys-table" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="text-align:left;width: 20%;"><strong>Product</strong></th>
                            <th style="text-align:left;width: 80%;"><strong>Chi tiết tài khoản</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->item as $item)
                        <tr>
                            <td style="text-align:left;width: 20%;">{{ $item->product->name }}</td>
                            <td style="text-align:left;width: 80%;">{{ $item->account }} <br></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <p class="order-again">
                    <a href="" class="button">Gia hạn thuê</a>
                </p>
            </section>
        </div>
    </div>
@endsection
