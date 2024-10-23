@extends('admin.layout')
@section('content_header_title', 'Quản lí sản phẩm')
@section('content_body')
    @php
        $title = (isset($product) ? 'Chỉnh sửa' : 'Thêm') . ' sản phẩm';
    @endphp
    <x-adminlte-card title="{{ $title }}">

        @if (Session::has('successMsg'))
            <x-adminlte-alert theme="success" title="Success">
                {{ Session::get('successMsg') }}
            </x-adminlte-alert>
        @endif
        @if ($errors->any())
            <x-adminlte-alert theme="danger" title="Error">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br />
                @endforeach
            </x-adminlte-alert>
        @endif
        <form method="POST"
            action="@isset($product) {{ route('admin.product.update', $product->id) }}  @else {{ route('admin.product.store') }} @endisset"
            class="form-horizonal">
            @isset($product)
                @method('PUT')
            @endisset
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
                        <label for="category" class="col-md-2 col-sm-3 col-form-label">Danh mục</label>
                        <div class="col-xl-6 col-sm-8">
                            <select class="form-control js-example-basic-single" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @isset($product) 
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}
                                    @endisset>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-sm-3 col-form-label">Status</label>
                        <div class="col-md-10 col-sm-8">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="active" name="status"
                                            value="1" checked>
                                        <label for="active" class="custom-control-label">Đang bán</label>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="inactive" name="status"
                                            value="0">
                                        <label for="inactive" class="custom-control-label">Dừng bán</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-sm-3 col-form-label">Giá</label>
                        <div class="col-xl-10 col-sm-9">
                            <div id="price-container">
                                <div class="form-row mb-2">
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary add-price">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="summernote" name="summernote">@isset($product){!! $product->info !!}@endisset</div>
                <div class="col-12 form-actions text-right">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Return</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </x-adminlte-card>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Khởi tạo Summernote
            $('#summernote').summernote({
                width: '100%',
                height: 200,
            });
            @isset($product)
                $('#inputName').val(@json(old('name') ?? $product->name));
                $('#inputEmail').val(@json(old('email') ?? $product->email));
                $("input[name='status'][value='{{ $product->status }}']").click();

                // Nếu có dữ liệu price từ server, render lại các giá trị cũ
                @if ($product->productCycle)
                    let prices = @json(old('productCycle') ?? $product->productCycle);
                    prices.forEach(function(price, index) {
                        addPriceRow(index, price.cycle_value, price.cycle_unit, price.cycle_price);
                    });
                @endif
            @endisset

            // Sự kiện click thêm price row mới
            let priceIndex = $(".price-row").length; // Đếm số price row hiện tại
            $('.add-price').on('click', function() {
                addPriceRow(priceIndex);
                priceIndex++;
            });

            // Xử lý khi submit form
            $("form").submit(function(eventObj) {
                console.log('submit');

                // Lưu nội dung của Summernote vào hidden input
                $("<input />").attr("type", "hidden")
                    .attr("name", "info")
                    .attr("value", $('#summernote').summernote('code'))
                    .appendTo("form");

                // Không cần thêm gì cho price vì các trường đã được tạo đúng theo tên dạng mảng

                return true;
            });

            // Hàm để thêm một hàng giá mới vào form
            function addPriceRow(index, duration = '', unit = '1', value = '') {
                $('#price-container').append(`
            <div class="form-row mb-2 price-row">
                <div class="col-md-3">
                    <input type="number" class="form-control" placeholder="Thời gian" name="price[${index}][cycle_value]" value="${duration}">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="price[${index}][cycle_unit]">
                        <option value="1" ${unit == '1' ? 'selected' : ''}>Ngày</option>
                        <option value="2" ${unit == '2' ? 'selected' : ''}>Tuần</option>
                        <option value="3" ${unit == '3' ? 'selected' : ''}>Tháng</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" placeholder="Giá" name="price[${index}][cycle_price]" value="${value}">
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger remove-price">Remove</button>
                </div>
            </div>
        `);
            }

            // Sự kiện xóa price row
            $(document).on('click', '.remove-price', function() {
                $(this).closest('.price-row').remove();
            });
        });
    </script>
@endpush
