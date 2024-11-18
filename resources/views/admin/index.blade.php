@extends('admin.layout')

{{-- Customize layout sections --}}

@section('content_header_title', 'Trang tổng quan')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $totalUser }}" text="Người dùng" icon="fas fa-user-plus" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $totalProduct }}" text="Sản phẩm" icon="fas fa-book" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $totalAccount }}" text="Tài khoản" icon="fas fa-cookie-bite" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $totalOrder }}" text="Đơn hàng" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $newUserToday }}" text="Người dùng mới hôm nay" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $newOrderToday }}" text="Đơn hàng mới hôm nay" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $newOrderSuccessToday }}" text="Đơn hàng đã hoàn thành hôm nay" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $productForSale }}" text="Sản phẩm đang bán" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ number_format($revenueToday, 0, ',', ',') }}" text="Doanh thu hôm nay" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ number_format($revenueMonth, 0, ',', ',') }}" text="Doanh thu tháng" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ number_format($revenueTotal, 0, ',', ',') }}" text="Tổng doanh thu" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>
        <div class="col-lg-3 col-6">
            <x-adminlte-small-box title="{{ $accountRenting }}" text="Tài khoản đang được thuê" icon="fas fa-shopping-cart" theme="success"
                url="#" url-text="View details" />
        </div>

    </div>

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
