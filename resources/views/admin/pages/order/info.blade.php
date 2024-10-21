@extends('admin.layout')
@section('content_header_title', 'Quản lí đơn hàng')
@section('content_body')
    @php
        $title = 'Thông tin đơn hàng';
    @endphp
    <x-adminlte-card title="{{ $title }}">
        @include('admin.components.alert', ['errors' => $errors])
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="inputOrderID" class="col-md-2 col-sm-3 col-form-label">ID Đơn hàng</label>
                    <div class="col-xl-6 col-sm-8">
                        <input type="text" class="form-control" id="inputOrderID" placeholder="" name="name" value="{{ $order->id }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="inputName" class="col-md-2 col-sm-3 col-form-label">Tên Khách Hàng</label>
                    <div class="col-xl-6 col-sm-8">
                        <input type="text" class="form-control" id="inputName" placeholder="" name="name" value="{{ $order->user->name }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="p-1">
                Danh sách tài khoản:
            </div>
        </div>
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Tài khoản</th>
                        <th>Giá</th>
                        <th>Thời gian bắt đầu</th>
                        <th>Thời gian kết thúc</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($order->item as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->account }}</td>
                            <td>{{ $item->price }}đ</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 text-right">
            Tổng cộng: <b>{{ $order->total_price }}đ</b>
        </div>
        <div class="col-12 text-right">
            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Return</a>
        </div>
    </x-adminlte-card>
@stop