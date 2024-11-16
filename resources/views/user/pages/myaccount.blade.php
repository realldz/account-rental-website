@extends('user.myAccountLayout')
@section('content')
    <div class="woocommerce">
        <div class="woocommerce-MyAccount-content">
            <div class="woocommerce-notices-wrapper"></div>
            <p>
                Xin chào <strong>{{ $user->name }}</strong> (không phải tài khoản
                <strong>{{ $user->name }}</strong>?
                Hãy <a href="{{ route('auth.logout') }}">thoát
                    ra</a> và đăng nhập vào tài khoản của bạn)
            </p>
            <p>
                Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <a href="">các đơn hàng gần đây</a> và <a
                    href="">chỉnh sửa mật khẩu và chi
                    tiết tài khoản của bạn</a>.
            </p>
            <div class="dashboard">
                <h3>Tổng quan</h3>
                <div class="row row-dsb">
                    <div class="col large-2 fullname">
                        <div class="name">Họ tên</div>
                        <div class="value">
                            {{ $user->name }} </div>
                    </div>
                    <div class="col large-2 email">
                        <div class="name">Email</div>
                        <div class="value">
                            {{ $user->email }} </div>
                    </div>

                    <div class="col large-2">
                        <div class="name">Số tiền chi tiêu</div>
                        <div class="value">
                            <span class="woocommerce-Price-amount amount"><bdi><span
                                        class="woocommerce-Price-amount amount">{{ number_format((clone $orders)->where('status', 1)->sum('total_price'), 0, ',', ',') }}</span><span
                                        class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                        </div>
                    </div>
                    <div class="col large-2">
                        <div class="name">Đơn hàng đã đặt</div>
                        <div class="value">
                            {{ $orders->count() }} </div>
                    </div>

                </div>
            </div>


            <div class="dashboard" style="margin-top: 30px;">
                <h3>Đơn hàng của bạn</h3>
                <table>
                    <tbody>
                        <tr>
                            <th>Đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tình trạng</th>
                            <th>Tổng</th>
                            <th></th>
                        </tr>
                        @foreach ($orders->get() as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
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
                                <td><span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-amount amount">{{ $order->formatted_total_price }}</span><span
                                                class="woocommerce-Price-currencySymbol">đ</span></bdi></span>
                                </td>
                                <td><a href="{{ route('user.my-account.order.show', $order->id) }}" target="_blank">Xem</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
