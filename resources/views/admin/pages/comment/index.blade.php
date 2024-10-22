@extends('admin.layout')
@section('content_header_title', 'Quản lí bình luận')

@section('content_body')
    <x-adminlte-card title="Quản lí bình luận">
        <form class="form-row pb-1">
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="id" type="number" placeholder="ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="user_id" placeholder="User ID" />
            </div>
            <div class="form-group col-xxl-1 col-lg-3 col-md-3 col-4">
                <x-adminlte-input name="product_id" placeholder="Product ID" />
            </div>
            @include('admin.components.form.footer', ['model' => 'comment'])
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->user->email }}</td>
                        <td>{{ $comment->product->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.comment.show', $comment->id) }}">Xem chi
                                        tiết</a>
                                    <a class="dropdown-item" href="javascript:deleteObj('{{ route('admin.comment.destroy', $comment->id) }}', 'ID {{ $comment->id }}')">Xoá</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.components.x-slot.footerSlot', ['model' => $comments])
    </x-adminlte-card>
    @include('admin.components.x-slot.footerSlot', ['model' => $comments])
@endsection
@push('js')
    @include('admin.components.delete-script')
@endpush