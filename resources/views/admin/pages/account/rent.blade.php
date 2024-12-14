@extends('admin.layout')

@section('content_header_title', 'Tài khoản đang thuê')

@section('content_body')
    <x-adminlte-card title="Tài khoản đang thuê">
        {{-- @include('admin.components.x-slot.addedToolsSlot', [
            'model' => 'item',
            'modelName' => 'tài khoản',
        ]) --}}
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="account" placeholder="account" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" name="expired">
                    <option value="" hidden="">Đã hết hạn?</option>
                    <option value="1">True</option>
                </select>
            </div>
            @include('admin.components.form.footer', ['model' => 'orderItem'])
        </form> 
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Đơn hàng</th>
                    <th>Người dùng</th>
                    <th>Tài khoản</th>
                    <th>Sản phẩm</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                    <th>Giá tiền</th>
                    <th>Trạng thái</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('admin.order.show', $item->order->id) }}" target="_blank">{{ $item->order->id }}</a></td>
                        <td>{{ $item->order->user->email }}</td>
                        <td>{{ $item->account }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->price }}đ</td>
                        <td>{{ $item->status == 0 ? 'Đã thu hồi tài khoản' : 'Đang sử dụng' }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    @if ($item->end_date < date('Y-m-d') && $item->status == 1)
                                        <a class="dropdown-item" href="javascript:setExpired('{{ route('admin.orderItem.expired', $item->id) }}')">Đã thu hồi tài khoản</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('admin.orderItem.edit', $item->id) }}">Chỉnh sửa</a>
                                    <a class="dropdown-item" href="{{ route('admin.account.index', ['info' => explode('|', $item->account,-1)[0]]) }}" target="_blank">Tìm tài khoản</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $items])
    </x-adminlte-card>
@endsection
@push('js')
    <script>
        function setExpired(url) {
        swal.fire({
            title: 'Warning',
            text: 'Xác nhận đã thu hồi tài khoản ?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Đóng',
            confirmButtonText: 'Xác nhận',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: 'GET',
                    url: url,
                    data: {_token: '{{ csrf_token() }}'},
                    dataType: 'json',
                    success: function(ret) {
                        if (ret.status === 'success') {
                            swal.fire({title: ret.message, icon: 'success', timer: 1000, showConfirmButton: false}).then(() => window.location.reload());
                        } else {
                            swal.fire({title: ret.message, icon: 'error'}).then(() => window.location.reload());
                        }
                    },
                    error: function(ret) {
                        swal.fire({title: ret.responseJSON.message, icon: 'error'}).then(() => window.location.reload());
                    }
                });
            }
        });
    }
    </script>
@endpush