<div>
    @guest
        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
            </span> {{ $idea->likes->count() }} </a>
    @endguest

    @auth
        @if (Auth::user()->likesIdea($idea))
            <form method="POST" action="{{ route('ideas.unlike', $idea) }}">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes->count() }} </button>
            </form>
        @else
            <form method="POST" action="{{ route('ideas.like', $idea) }}">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
                    </span> {{ $idea->likes->count() }} </button>
            </form>
        @endif
    @endauth
</div>
