<div class="direct-chat-msg right">
    <div class="direct-chat-infos clearfix">
        <span class="direct-chat-name float-right">{{ $reply->user->name }}</span>
        <span class="direct-chat-timestamp float-left">{{ $reply->created_at }}</span>
    </div>
    <!-- /.direct-chat-infos -->
    <i class="far fa-user-circle fa-2x direct-chat-img"></i>
    <!-- /.direct-chat-img -->
    <div class="direct-chat-text">
        {{ $reply->content }}
    </div>
    <!-- /.direct-chat-text -->
</div>
