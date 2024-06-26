<div>
    <form method="GET" action="{{ route('ideas.comments.store', $idea) }}">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>

    <hr>
    @foreach ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $comment->user->getImageURL() }}" alt="Luigi Avatar">

            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}</h6>
                    <small class="fs-6 fw-light text-muted"> 3 hour ago</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach
</div>
