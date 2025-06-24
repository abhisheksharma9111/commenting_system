<!-- resources/views/comments/_form.blade.php -->
<form action="{{ route('comments.store', $post) }}" method="POST" class="comment-form mb-4">

    @csrf
    <div class="mb-3">
        <label for="content" class="form-label">Add Comment</label>
        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
    </div>
    <input type="hidden" name="parent_comment_id" value="">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

