@extends('admin.layout')
@section('content_header_title', 'Quản lí tài khoản')

@section('content_body')
    <x-adminlte-card title="Quản lí tài khoản">
        @include('admin.components.x-slot.addedToolsSlot', [
            'model' => 'account',
            'modelName' => 'tài khoản',
        ])
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="info" placeholder="Info" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <select class="form-control" id="status" name="status">
                    <option value="" hidden="">Status</option>
                    <option value="-1">Not Available</option>
                    <option value="0">Available</option>
                    <option value="1">Using</option>
                </select>
            </div>
            @include('admin.components.form.footer', ['model' => 'account'])
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Info</th>
                    <th>Sản phẩm</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->info }}</td>
                        <td>{{ $account->product->name }}</td>
                        <td>
                            @switch($account->status)
                                @case(-1)
                                    <span class="badge bg-danger">Không có sẵn</span>
                                @break

                                @case(0)
                                    <span class="badge bg-success">Có sẵn</span>
                                @break

                                @case(1)
                                    <span class="badge bg-primary">Đang sử dụng</span>
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
                                    <a class="dropdown-item" href="{{ route('admin.account.edit', $account->id) }}">Chỉnh
                                        sửa</a>
                                    <a class="dropdown-item"
                                        href="javascript:deleteObj('{{ route('admin.account.destroy', $account->id) }}', 'ID {{ $account->id }}')">Xoá</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $accounts])
    </x-adminlte-card>

@endsection
@push('js')
    @include('admin.components.delete-script')
@endpush
