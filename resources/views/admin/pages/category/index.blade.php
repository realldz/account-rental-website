@extends('admin.layout')
@section('content_header_title', 'Quản lí danh mục')

@section('content_body')
    <x-adminlte-card title="Quản lí danh mục">
        <x-slot name="toolsSlot">
            <a class="btn btn-outline-dark btn-add" href="{{ route('admin.category.create') }}">
                <i class="fas fa-user" aria-hidden="true"></i>
                Thêm danh mục
            </a>
        </x-slot>
            <form class="form-row pb-1">
                <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                    <x-adminlte-input name="id" type="number" placeholder="ID" />
                </div>
                <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                    <x-adminlte-input name="name" placeholder="Tên" />
                </div>
                
                <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                    <select class="form-control" id="status" name="status">
                        <option value="" hidden="">Status</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </div>
                <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4 btn-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Reset</a>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Số sản phẩm</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->product->count() }}</td>
                            <td>
                                <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $category->status ? 'Enable' : 'Disable' }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.category.edit', $category->id) }}">Chỉnh sửa</a>
                                        <a class="dropdown-item"
                                            href="javascript:deleteObj('{{ route('admin.category.destroy', $category->id) }}', '{{ $category->name }}')">Xoá</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </x-adminlte-card>
@endsection
@push('js')
    @include('admin.components.delete-script')
@endpush
