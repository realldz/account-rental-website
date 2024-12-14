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

                            @foreach ($order->item->groupBy(['product_id']) as $productItems)
                            <tr class="woocommerce-table__line-item order_item">
                                <td class="woocommerce-table__product-name product-name">
                                    {{ $productItems->first()->product->name }}
                                    <strong class="product-quantity">×&nbsp;{{ $productItems->count() }}</strong>
                                </td>
                        
                                <td class="woocommerce-table__product-total product-total">
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-amount amount">
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($productItems as $productItem)
                                                    @php
                                                        $total += $productItem->price;
                                                    @endphp
                                                @endforeach
                                                {{ number_format($total, 0, ',', '.') }}
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
                <form action="{{ route('user.my-account.order.renew', $order->id) }}" method="post">
                    <table class="shop_table order_details fslm-license-keys-table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="renew" style="text-align:left;"><strong>Gia hạn</strong></th>
                                <th style="text-align:left; width: 10%"><strong>Product</strong></th>
                                <th style="text-align:left;"><strong>Chi tiết tài khoản</strong></th>
                                <th style="text-align:left"><strong>Giá</strong></th>
                                <th style="text-align:left"><strong>Bắt đầu thuê</strong></th>
                                <th style="text-align:left"><strong>Kết thúc thuê</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->item as $item)
                            <tr>
                                <td class="renew" style="align-items: center;">
                                    {{-- <input type="checkbox" id="renew_{{ $item->id }}" name="renew[{{ $item->id }}]" style="margin-right: 10px;"> --}}
                                    <select id="cycle_{{ $item->id }}" name="renew[{{ $item->id }}]" style="width: 150px;">
                                        <option value="" hidden>-- Thời hạn --</option>
                                        @foreach ($item->product->productCycle as $cycle)                                        
                                            <option value="{{ $cycle->id }}">{{ $cycle->cycle_value . ' ' . $cycle->cycle_label }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="text-align:left">{{ $item->product->name }}</td>
                                <td style="text-align:left">{{ $item->status == 0 ? 'Đã hết hạn' : $item->account }} <br></td>
                                <td style="text-align:left">{{ $item->formated_price }} <br></td>
                                <td style="text-align:left">{{ $item->start_date }} <br></td>
                                <td style="text-align:left">{{ $item->end_date }} <br></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="order-again">
                        @if($order->status == 1)
                            @csrf
                            <button type="button" class="button toggle-renew">Gia hạn thuê</button>
                            <button type="submit" class="button renew-btn" style="display: none">Thanh toán</button>
                        @endif
                    </p>
                </form>
            </section>
        </div>
    </div>
    <style>
        .renew {
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
    $('.toggle-renew').click(function() {
        $('.renew').css('display', 'flex');
        $('.renew-btn').show();
    });

    </script>
@endsection
