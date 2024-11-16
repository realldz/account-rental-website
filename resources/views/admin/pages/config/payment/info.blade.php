@extends('admin.layout')
@section('content_header_title', 'Quản lí phương thức thanh toán')
@section('content_body')
    @php
        $title = (isset($payment) ? 'Chỉnh sửa' : 'Thêm') . ' phương thức thanh toán';
    @endphp
    <x-adminlte-card title="{{ $title }}">
        @include('admin.components.alert', ['errors' => $errors])
        <form method="POST"
            action="@isset($payment) {{ route('admin.config.payment.update', $payment->id) }}  @else {{ route('admin.config.payment.store') }} @endisset"
            class="form-horizonal">
            @isset($payment)
                @method('PUT')
            @endisset
            @csrf
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="payment_gateways" class="col-md-2 col-sm-3 col-form-label">Gateway</label>
                        <div class="col-xl-6 col-sm-8">
                            <select class="form-control js-example-basic-single" name="gateway" id="gateway">
                                <option value="">-- Chọn gateway --</option>
                                @foreach ($payment_gateways as $gateway)
                                    <option value="{{ $gateway }}">{{ $gateway }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-2 col-sm-3 col-form-label">Tên</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="text" class="form-control" id="inputName" placeholder="Tên" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-md-2 col-sm-3 col-form-label">Mô tả</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="text" class="form-control" id="inputDescription" placeholder="Mô tả"
                                name="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputIcon" class="col-md-2 col-sm-3 col-form-label">Icon url</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="text" class="form-control" id="inputIcon" placeholder="Icon url" name="icon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSort" class="col-md-2 col-sm-3 col-form-label">Sort</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="number" class="form-control" id="inputSort" placeholder="Sort" name="sort"
                                value="0">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 col-sm-3 col-form-label">Enable</label>
                        <div class="col-md-10 col-sm-8">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="true" name="enable"
                                            value="1" checked>
                                        <label for="true" class="custom-control-label">True</label>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="false" name="enable"
                                            value="0">
                                        <label for="false" class="custom-control-label">False</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <section id="dynamic-fields">
                        <!-- Các field động sẽ được chèn vào đây -->
                    </section>
                </div>

            </div>
            <div class="col-12 form-actions text-right">
                <a href="{{ route('admin.config.payment.index') }}" class="btn btn-secondary">Return</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </x-adminlte-card>
@endsection
@push('js')
    <script>
        // Gọi AJAX để lấy thông tin các field
        function getFields(selectedGateway) {
            return $.ajax({
                url: "{{ route('admin.config.payment.fields') }}", // Route để lấy fields
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    gateway: selectedGateway,
                },
                success: function(response) {
                    if (response.status === "success") {
                        // Lấy fields từ response
                        let fields = response.message.fields;

                        // Xóa nội dung cũ trong vùng dynamic-fields
                        let dynamicFields = $('#dynamic-fields');
                        dynamicFields.empty();

                        // Duyệt qua object fields
                        for (let fieldName in fields) {
                            if (fields.hasOwnProperty(fieldName)) {
                                let fieldType = fields[fieldName];
                                let fieldHtml = `
                                    <div class="form-group row">
                                        <label for="${fieldName}" class="col-md-2 col-sm-3 col-form-label">
                                            ${fieldName.charAt(0).toUpperCase() + fieldName.slice(1).replace('_', ' ')}
                                        </label>
                                        <div class="col-xl-6 col-sm-8">
                                            <input type="${fieldType}" name="config[${fieldName}]" id="${fieldName}" class="form-control" required>
                                        </div>
                                    </div>
                                `;
                                dynamicFields.append(fieldHtml);
                            }
                        }
                    } else {
                        alert('Failed to load fields: ' + response.message);
                    }
                },
                error: function(xhr) {
                    alert('Failed to load fields.');
                }
            });
        }
        $(document).ready(function() {
            // Khi thay đổi gateway
            @isset($payment)
                $('#gateway').val('{{ $payment->gateway }}');
                $('#inputName').val('{{ $payment->name }}');
                $('#inputDescription').val('{{ $payment->description }}');
                $('#inputIcon').val('{{ $payment->icon }}');
                $('#inputSort').val('{{ $payment->sort }}');
                $("input[name='enable'][value='{{ $payment->enable }}']").click();
                let selectedGateway = $('#gateway').val();
                getFields(selectedGateway).then(() => {
                    const fields = JSON.parse({!! json_encode($payment->config) !!});
                    for (let fieldName in fields) {
                        if (fields.hasOwnProperty(fieldName)) {
                            let fieldValue = fields[fieldName];
                            $(`#${fieldName}`).val(fieldValue);
                        }
                    }
                });
            @endisset
            $('#gateway').change(function() {
                let selectedGateway = $(this).val();
                if (selectedGateway === '') {
                    // Xóa nội dung cũ trong vùng dynamic-fields
                    let dynamicFields = $('#dynamic-fields');
                    dynamicFields.empty();
                    return;
                }
                getFields(selectedGateway);
            });
        });
    </script>
@endpush
