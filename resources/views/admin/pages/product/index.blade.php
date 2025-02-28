@extends('admin.layout')
@section('content_header_title', 'Quản lí sản phẩm')

@section('content_body')
    <x-adminlte-card title="Quản lí sản phẩm">
        @include('admin.components.x-slot.addedToolsSlot', [
            'model' => 'product',
            'modelName' => 'sản phẩm',
        ])
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="name" placeholder="Tên" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="category" name="category_id">
                    <option value="" hidden="">Danh mục</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="status" name="status">
                    <option value="" hidden="">Status</option>
                    <option value="1">Đang bán</option>
                    <option value="0">Dừng bán</option>
                </select>
            </div>
            @include('admin.components.form.footer', ['model' => 'product'])
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Danh mục</th>
                    <th>Đang thuê</th>
                    <th>Không có sẵn</th>
                    <th>Có sẵn</th>
                    <th>Hình ảnh</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                @php
                    $totalAccount = $product->account()->count();
                @endphp
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td class="truncate-text">{{ $product->name }}</td>
                        <td class="truncate-text">{{ $product->category->name }}</td>
                        <td>{{ $product->account()->where('status', 1)->count() .'/'. $totalAccount }}</td>
                        <td>{{ $product->account()->where('status', -1)->count() .'/'. $totalAccount }}</td>
                        <td>{{ $product->account()->where('status', 0)->count() .'/'. $totalAccount }}</td>
                        <td><img src="{{ $product->image_link }}" alt="" width="50" height="50"></td>
                        <td><span class="badge {{ $product->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->status ? 'Đang bán' : 'Dừng bán' }}
                            </span></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.product.edit', $product->id) }}">Chỉnh sửa</a>
                                    <a class="dropdown-item" href="javascript:deleteObj('{{ route('admin.product.destroy', $product->id) }}', '{{ $product->name }}')">Xoá</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $products])
    </x-adminlte-card>
@stop

@push('js')
@include('admin.components.delete-script')
@endpush
