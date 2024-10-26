@extends('admin.layout')
@section('content_header_title', 'Quản lí người dùng')

@section('content_body')
    @php
        $title = (isset($user) ? 'Chỉnh sửa' : 'Thêm' ) . ' người dùng'
    @endphp
    <x-adminlte-card title="{{ $title }}">

    @include('admin.components.alert', ['errors' => $errors])
    <form method="POST" action="@isset($user) {{ route('admin.user.update', $user->id) }}  @else {{ route('admin.user.store')}} @endisset" class="form-horizonal">
        @isset($user)@method('PUT')@endisset
        @csrf
        <div class="form-row">
            <div class="col-lg-6">
                <div class="form-group row">
                    <label for="inputName" class="col-md-2 col-sm-3 col-form-label">Tên</label>
                    <div class="col-xl-6 col-sm-8">
                        <input type="text" class="form-control" id="inputName" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-md-2 col-sm-3 col-form-label">Email</label>
                    <div class="col-xl-6 col-sm-8">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-md-2 col-sm-3 col-form-label">Mật khẩu</label>
                    <div class="col-xl-6 col-sm-8">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mật khẩu"
                            name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-sm-3 col-form-label">Account Status</label>
                    <div class="col-md-10 col-sm-8">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active" name="status"
                                        value="1" checked>
                                    <label for="active" class="custom-control-label">Active</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="inactive" name="status"
                                        value="0">
                                    <label for="inactive" class="custom-control-label">Inactive</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-sm-3 col-form-label">Is Admin ?</label>
                    <div class="col-md-10 col-sm-8">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="yes" name="is_admin"
                                        value="1">
                                    <label for="yes" class="custom-control-label">Có</label>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="no" name="is_admin"
                                        value="0" checked>
                                    <label for="no" class="custom-control-label">Không</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 form-actions text-right">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Return</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
    </x-adminlte-card>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            @isset($user)
            $('#inputName').val(@json(old('sni') ?? $user->name));
            $('#inputEmail').val(@json(old('sni_name') ?? $user->email));
            $("input[name='status'][value='{{$user->status}}']").click();
            $("input[name='is_admin'][value='{{$user->is_admin}}']").click();
            @endisset
        });
    </script>
@endpush
