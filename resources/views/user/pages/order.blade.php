@extends('user.myAccountLayout')
@section('content')
    <div class="woocommerce">
        <div class="woocommerce-MyAccount-content">
            <div class="woocommerce-notices-wrapper"></div>
            <div class="touch-scroll-table">
                <table
                    class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span
                                    class="nobr">Đơn hàng</span></th>
                            <th scope="col"
                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span
                                    class="nobr">Ngày</span></th>
                            <th scope="col"
                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span
                                    class="nobr">Trạng thái</span></th>
                            <th scope="col"
                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span
                                    class="nobr">Tổng</span></th>
                            <th scope="col"
                                class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions">
                                <span class="nobr">Các thao tác</span></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                        <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
                            <th class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number"
                                data-title="Đơn hàng" scope="row">

                                <a href="{{ route('user.my-account.order.show', $order->id) }}" aria-label="Xem đơn hàng {{ $order->id }}">
                                    #{{ $order->id }} </a>
                            </th>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date"
                                data-title="Ngày">
                                {{ $order->created_at }}
                            </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status"
                                data-title="Trạng thái">
                                @switch($order->status)
                                    @case(-1)
                                        Đã đóng
                                        @break

                                    @case(0)
                                        Chờ thanh toán
                                        @break

                                    @case(1)
                                        Đã hoàn thành
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total"
                                data-title="Tổng">

                                <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-amount amount">{{ $order->formatted_total_price }}</span><span
                                        class="woocommerce-Price-currencySymbol">đ</span></span> cho {{ $order->item()->count() }} mục

                            </td>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions"
                                data-title="Các thao tác">

                                <a href="{{ route('user.my-account.order.show', $order->id) }}"
                                    class="woocommerce-button button view">Xem</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
                {{ $orders->links('vendor.pagination.simple-user-order') }}
            </div>
        </div>
    </div>
@endsection
