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
                        <td>
                            <a href="{{ route('admin.orderItem.edit', $item->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.account.index', ['info' => explode('|', $item->account,-1)[0]]) }}" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $items])
    </x-adminlte-card>
@endsection