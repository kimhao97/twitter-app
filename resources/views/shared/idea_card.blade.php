<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="post" action="{{ route('ideas.destroy', $idea) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('ideas.edit', $idea->id) }}"> Edit </a>
                    <a href="{{ route('ideas.show', $idea->id) }}"> View </a>
                    <button class="btn btn-danger btn-sm"> X </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('ideas.update', $idea) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3"> {{ $idea->content }}</textarea>
                    @error('content')
                        <span class= "d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
                {{-- comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
                of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum
                dolor sit amet..", comes from a line in section 1.10.32. --}}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->create_at }} </span>
            </div>
        </div>
        @include('shared.comment_box')
    </div>
</div>
