@extends('admin.layout')
@section('content_header_title', 'Quản lí đơn hàng')
@section('content_body')
    @php
        $title = 'Thông tin chi tiết đơn hàng';
    @endphp
    <x-adminlte-card title="{{ $title }}">
        <x-slot name="toolsSlot">
            <a class="btn btn-outline-dark btn-add" href="{{ route('admin.order.show', $orderItem->order->id) }}">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                Quay lại
            </a>
        </x-slot>
        @include('admin.components.alert', ['errors' => $errors])
        <form action="{{ route('admin.orderItem.update', $orderItem->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label for="inputAccount" class="col-md-2 col-sm-3 col-form-label">Account</label>
                        <div class="col-xl-6 col-sm-8">
                            <select class="form-control js-example-basic-single" name="account">
                                <option value="">Trống</option>
                                @if ($orderItem->account)
                                <option value="{{ $orderItem->account }}" selected>{{ $orderItem->account }}</option>
                                @endif
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->info }}">{{ $account->info }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStartDate" class="col-md-2 col-sm-3 col-form-label">Ngày bắt đầu thuê</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="date" class="form-control" id="inputStartDate" placeholder="" name="start_date"
                                value="{{ $orderItem->start_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEndDate" class="col-md-2 col-sm-3 col-form-label">Ngày kết thúc thuê</label>
                        <div class="col-xl-6 col-sm-8">
                            <input type="date" class="form-control" id="inputEndDate" placeholder="" name="end_date"
                                value="{{ $orderItem->end_date }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 form-actions text-right">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </x-adminlte-card>
@endsection

@push('js')
    <script>
        $('.js-example-basic-single').select2({
            theme: 'bootstrap4',
        });
    </script>
@endpush