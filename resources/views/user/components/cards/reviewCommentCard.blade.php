<div class="review-comments wp-ajax-content" data-type="1">
    <div class="review-item">
        <div class="style__StyledComment-sc-103p4dk-5 hMjYZK review-comment">
            <div class="review-comment__user">
                <div class="review-comment__user-inner">
                    <div class="review-comment__user-avatar">
                        <div class="Avatar__StyledAvatar-sc-17zdycl-0 gDQSLG has-character" data-name="">
                            <span>
                                @php
                                    $s = $comment->user->name;
                                    $s = substr($s, 0, 1);
                                @endphp
                                {{ $s }}
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="review-comment__user-name">{{ $comment->user->name }}</div>
                    </div>
                </div>
            </div>
            <div style="flex-grow: 1;">
                <div class="review-comment__seller-name-attributes">
                    <div class="review-comment__seller-name">
                        <span class="review-comment__check-icon"></span>
                        Đã mua hàng
                    </div>
                </div>
                <div class="review-comment__content">
                    {{ $comment->content }}
                </div>
                <div class="review-comment__created-date">
                    <span>Nhận xét vào <time class="timeago" datetime="">{{ $comment->created_at }}</time></span>
                </div>

                <span data-view-id="pdp_product_review_reply_button" class="review-comment__reply"
                    data-reply-id="{{ $comment->id }}">Gửi trả lời</span>
                {{-- reply --}}
                @if ($comment->children->count() > 0)
                    @foreach ($comment->children as $children)
                    <div class="review-comment__sub-comments">
                        <div class="style__StyledSubComment-sc-103p4dk-6 fKaYwj review-sub-comment">
                            <div class="review-sub-comment__avatar-thumb">
                                <div class="Avatar__StyledAvatar-sc-17zdycl-0 gDQSLG">
                                    <img src="/assets/images/avatar.png">
                                </div>
                            </div>
                            <div class="review-sub-comment__inner">
                                <div class="review-sub-comment__avatar">
                                    <div class="review-sub-comment__avatar-name">{{ $children->user->name }}</div>
                                    @if ($children->is_admin == 1)
                                    <span class="review-sub-comment__check-icon"></span>
                                    @endif


                                    <div class="review-sub-comment__avatar-date"><time class="timeago"
                                            datetime="">{{ $children->created_at }}</time></div>

                                </div>
                                <div class="review-sub-comment__content">
                                    <div>
                                        <span>{{ $children->content }}</span>
                                        <!-- <span class="show-more-content">Thu gọn</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
