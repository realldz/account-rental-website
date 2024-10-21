@extends('admin.layout')
@section('content_header_title', 'Quản lí đơn hàng')

@section('content_body')
    <x-adminlte-card title="Quản lí đơn hàng">
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="user_id" placeholder="User ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="status" name="status">
                    <option value="" hidden="">Status</option>
                    <option value="-1">Đã đóng</option>
                    <option value="0">Chờ Thanh Toán</option>
                    <option value="1">Đã hoàn thành</option>
                </select>
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="payment_method" name="payment_method">
                    <option value="" hidden="">Phương thức thanh toán</option>
                    <option value="credit">Credit</option>
                    <option value="bank">Bank</option>
                </select>
            </div>
            @include('admin.components.form.footer', ['model' => 'order'])
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Số mặt hàng</th>
                    <th>Số tiền thanh toán</th>
                    <th>Phương thức thanh toán</th>
                    <th>Đặt hàng lúc</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->item->count() }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @switch($order->status)
                                @case(-1)
                                    <span class="badge bg-danger">Đã huỷ</span>
                                @break

                                @case(0)
                                    <span class="badge bg-success">Chờ thanh toán</span>
                                @break

                                @case(1)
                                    <span class="badge bg-primary">Đã hoàn thành</span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.order.show', $order->id) }}">Xem chi
                                        tiết</a>
                                    <a class="dropdown-item"
                                        href="javascript:updateOrder('{{ route('admin.order.update', $order->id) }}', 1)">Đánh dấu đã hoàn thành</a>
                                    <a class="dropdown-item"
                                        href="javascript:updateOrder('{{ route('admin.order.update', $order->id) }}', -1)">Đánh dấu đã huỷ</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $orders])
    </x-adminlte-card>
@endsection
@push('js')
    <script>
        function updateOrder(url, status) {
            $.ajax({
                method: 'PUT',
                url: url,
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(ret) {
                    if (ret.status === 'success') {
                        swal.fire({
                            title: ret.message,
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(() => window.location.reload());
                    } else {
                        swal.fire({
                            title: ret.message,
                            icon: 'error'
                        }).then(() => window.location.reload());
                    }
                },
                error: function(ret) {
                    swal.fire({
                        title: ret.message,
                        icon: 'error'
                    }).then(() => window.location.reload());
                }
            });
        }
    </script>
@endpush
