<div class="direct-chat-msg">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-left">{{ $reply->user->name }}</span>
        <span class="direct-chat-timestamp float-right">{{ $reply->created_at }}</span>
    </div>
    <!-- /.direct-chat-infos -->
    <!-- /.direct-chat-img -->
    <i class="far fa-user-circle fa-2x direct-chat-img"></i>
    <div class="direct-chat-text">
        {{ $reply->content }}
    </div>
    <!-- /.direct-chat-text -->
</div>
