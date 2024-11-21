@extends('admin.layout')

@section('content_header_title', 'Thống kê')

@section('content_body')
    <div class="row">
        @foreach ($charts as $chart)
            <div class="col-lg-6 col-12">
                <x-adminlte-card title="{{ $chart['title'] }}">
                    <canvas id="{{ $chart['id'] }}"></canvas>
                </x-adminlte-card>
            </div>
        @endforeach
    </div>

@stop

@push('js')
    <script>
        $(document).ready(() => {
            @foreach ($charts as $chart)
                const ctx{{ $chart['id'] }} = $('#{{ $chart['id'] }}');
                new Chart(ctx{{ $chart['id'] }}, {
                    type: 'line',
                    data: @json($chart),
                    options: @json($chartOptions)
                });
            @endforeach
        });
    </script>
@endpush
