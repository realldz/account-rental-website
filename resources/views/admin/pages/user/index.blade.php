@extends('admin.layout')
@section('content_header_title', 'Quản lí người dùng')

@section('content_body')
    <x-adminlte-card title="Quản lí người dùng">
        @include('admin.components.x-slot.addedToolsSlot', [
            'model' => 'user',
            'modelName' => 'người dùng',
        ])
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="name" placeholder="Tên" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="email" placeholder="Mail" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="status" name="status">
                    <option value="" hidden="">Status</option>
                    <option value="1">Active</option>
                    <option value="0">InActive</option>
                </select>
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4 btn-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Reset</a>
            </div>
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Tạo lúc</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><span class="badge {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $user->status ? 'Active' : 'InActive' }}
                            </span></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.user.edit', $user->id) }}">Chỉnh sửa</a>
                                    <a class="dropdown-item" href="javascript:deleteObj('{{ route('admin.user.destroy', $user->id) }}', '{{ $user->name }}')">Xoá</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $users])
    </x-adminlte-card>
@stop
@push('js')
@include('admin.components.delete-script')
@endpush
