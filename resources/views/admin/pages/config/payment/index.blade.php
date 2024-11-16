@extends('admin.layout')
@section('content_header_title', 'Quản lí phương thức thanh toán')

@section('content_body')
    <x-adminlte-card title="Quản lí phương thức thanh toán">
        @include('admin.components.x-slot.addedToolsSlot', [
            'model' => 'config.payment',
            'modelName' => 'phương thức thanh toán',
        ])
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code name</th>
                    <th>Name</th>
                    <th>Mô tả</th>
                    <th>Return url</th>
                    <th>Enable</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->code }}</td>
                        <td>{{ $payment->name }}</td>
                        <td>{{ $payment->description }}</td>
                        <td>{{ route('payment.notify', $payment->code) }}</td>
                        <td>
                            @switch($payment->enable)
                                @case(0)
                                    <span class="badge bg-danger">Tắt</span>
                                @break

                                @case(1)
                                    <span class="badge bg-primary">Bật</span>
                                @break

                                @default
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('admin.config.payment.edit', $payment->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:deleteObj('{{ route('admin.config.payment.destroy', $payment->id) }}', '{{ $payment->name }}')" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-adminlte-card>
    @include('admin.components.delete-script')
@endsection

