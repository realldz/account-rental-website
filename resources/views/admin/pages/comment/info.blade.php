@extends('admin.layout')
@section('content_header_title', 'Quản lí bình luận')

@section('content_body')
    @php
        $title = 'Thông tin bình luận';
    @endphp
    <x-adminlte-card title="{{ $title }}">
        <x-slot name="toolsSlot">
            <a class="btn btn-outline-dark btn-add" href="{{ route('admin.comment.index') }}">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
                Quay lại
            </a>
        </x-slot>
        @include('admin.components.alert', ['errors' => $errors])
        <div class="direct-chat-messages">
            @if ($comment->user->is_admin)
                @include('admin.components.chat.admin', ['reply' => $comment])
            @else
                @include('admin.components.chat.user', ['reply' => $comment])
            @endif
            @foreach ($comment->children as $reply)
                @if ($reply->user->is_admin)
                    @include('admin.components.chat.admin', ['reply' => $reply])
                @else
                    @include('admin.components.chat.user', ['reply' => $reply])
                @endif
            @endforeach
        </div>
        <x-slot name="footerSlot">
            <form action="#" method="post">
                <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" name="content" placeholder="Nhập phản hồi" class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </x-slot>
    </x-adminlte-card>
@endsection
