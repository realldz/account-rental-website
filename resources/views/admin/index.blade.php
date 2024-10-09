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
