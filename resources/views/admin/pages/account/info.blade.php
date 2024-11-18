@extends('admin.layout')
@section('content_header_title', 'Quản lí tài khoản')
@section('content_body')
    @php
        $title = (isset($account) ? 'Chỉnh sửa' : 'Thêm') . ' tài khoản';
    @endphp
    <x-adminlte-card title="{{ $title }}">
        @include('admin.components.alert', ['errors' => $errors])
        <form method="POST"
            action="@isset($account) {{ route('admin.account.update', $account->id) }}  @else {{ route('admin.account.store') }} @endisset"
            class="form-horizonal">
            @isset($account)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="inputInfo" class="col-md-2 col-sm-3 col-form-label">Info</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="text" class="form-control" id="inputInfo" placeholder="Username | Password" name="info">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product" class="col-md-2 col-sm-3 col-form-label">Sản phẩm</label>
                        <div class="col-xl-6 col-sm-8">
                            <select class="form-control js-example-basic-single" name="product_id">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        @isset($account) 
                                    {{ $product->id == $account->product_id ? 'selected' : '' }}
                                    @endisset>
                                        {{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-10 col-sm-8">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="not-avaliable" name="status"
                                            value="-1" checked>
                                        <label for="not-avaliable" class="custom-control-label">Không có sẵn</label>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="avaliable" name="status"
                                            value="0">
                                        <label for="avaliable" class="custom-control-label">Có sẵn</label>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="using" name="status"
                                            value="1">
                                        <label for="using" class="custom-control-label">Đang sử dụng</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 form-actions text-right">
                    <a href="{{ route('admin.account.index') }}" class="btn btn-secondary">Return</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </x-adminlte-card>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',
            });
            @isset($account)
            $('#inputInfo').val(@json(old('info') ?? $account->info));
            $("input[name='status'][value='{{ $account->status }}']").click();
            @endisset
        });
    </script>
@endpush