<div class="card mb-3 comment-container" style="margin-left: {{ $comment->depth * 20 }}px;">
    <div class="card-body">
        <p>{{ $comment->content }}</p>

        @if($comment->canReply())
            <button class="btn btn-sm btn-outline-primary reply-btn" data-comment-id="{{ $comment->id }}">
                Reply
            </button>
        @endif

        <div class="reply-form mt-2" id="reply-form-{{ $comment->id }}" style="display: none;">
            <form action="{{ route('comments.store', $comment->post) }}" method="POST" class="comment-form">

                @csrf
                <div class="mb-2">
                    <textarea class="form-control form-control-sm" name="content" rows="2" required></textarea>
                </div>
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                <button type="button" class="btn btn-sm btn-outline-secondary cancel-reply"
                    data-comment-id="{{ $comment->id }}">
                    Cancel
                </button>
            </form>
        </div>
    </div>

    <div class="replies-container">
        @foreach($comment->replies as $reply)
            @include('comments._comment', ['comment' => $reply])
        @endforeach
    </div>
</div>

@push('styles')
<style>
    .card {
        transition: all 0.2s ease;
        border-left: 3px solid #dee2e6;
    }
    .card:hover {
        border-left-color: #0d6efd;
    }
    .reply-form {
        transition: all 0.3s ease;
    }
    .replies-container {
        border-left: 2px dashed #dee2e6;
        padding-left: 15px;
    }
</style>
@endpush