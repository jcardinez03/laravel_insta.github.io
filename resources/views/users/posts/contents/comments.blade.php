<div class="mt-3">
    {{-- Show all comments --}}
    @if ($post->comments->isNotEmpty())
        <hr>
        <ul class="list-group mt-2">
            @foreach ($post->comments as $comment)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                    &nbsp;

                    <p class="d-inline fw-light">{{ $comment->body }}</p>

                    <form action="#" method="post">
                        @csrf
                        @method('DELETE')

                        <span class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($comment->created_at)) }}</span>

                        @if (Auth::user()->id === $comment->user->id)
                            &middot;                            
                            <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall">Delete</button>
                        @endif
                    </form>
                </li>

            @endforeach
        </ul>
    @endif

    <form action="{{ route('comment.store', $post->id) }}" method="post">
        @csrf

        <div class="input-group">
            <textarea name="comment_body{{ $post->id }}" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment_body' . $post->id) }}</textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
        {{-- error --}}
    </form>
</div>