<div class="mb-3 card border shadow-sm">
    <div class="card-body">
        @foreach($comments as $comment)

            <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>

                <strong>{{ $comment->user->name }}</strong>

                <p>{{ $comment->body }}</p>

                <a href="" id="reply"></a>

                <form method="post" action="{{ route('comments.store') }}">

                    @csrf

                    <div class="form-group">

                        <input type="text" name="body" class="form-control" />

                        <input type="hidden" name="track_id" value="{{ $track_id }}" />

                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />

                    </div>

                    <div class="form-group">

                        <input type="submit" class="btn btn-sm btn-warning" value="Reply" />

                    </div>

                </form>

                @include('commentsDisplay', ['comments' => $comment->replies])

            </div>

        @endforeach
    </div>
</div>
