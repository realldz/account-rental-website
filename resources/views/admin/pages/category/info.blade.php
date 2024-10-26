@extends('admin.layout')
@section('content_header_title', 'Quản lí danh mục')
@section('content_body')
    @php
        $title = (isset($product) ? 'Chỉnh sửa' : 'Thêm') . ' danh mục';
    @endphp
    @include('admin.components.alert', ['errors' => $errors])
        <form method="POST"
            action="@isset($category) {{ route('admin.category.update', $category->id) }}  @else {{ route('admin.category.store') }} @endisset"
            class="form-horizonal">
            @isset($category)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 col-sm-3 col-form-label">Tên</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="text" class="form-control" id="inputName" placeholder="Tên" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-10 col-sm-8">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="enable" name="status"
                                            value="1" checked>
                                        <label for="enable" class="custom-control-label">Enable</label>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="disable" name="status"
                                            value="0">
                                        <label for="disable" class="custom-control-label">Disable</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 form-actions text-right">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Return</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

    </x-adminlte-card>
@endsection
@push('js')
    <script>
        @isset($category)
            $(document).ready(function() {
                $('#inputName').val(@json(old('name') ?? $category->name));
                $("input[name='status'][value='{{ $category->status }}']").click();
            });
        @endisset
    </script>
@endpush
