<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    @if ($editing ?? false)
                        <input value="{{ $user->name }}" type="text" class="input-group">
                    @else
                        <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                            </a></h3>
                        <span class="fs-6 text-muted">@ {{ $user->name }}</span>
                    @endif
                </div>
                <div>
                    @auth
                        @if (Auth::id() == $user->id && $editing != true )
                            <a class="mx-2" href="{{ route('users.edit', $user) }}"> Edit </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            @if ($editing ?? false)
                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="about" class="form-control" id="idea" rows="3">  </textarea>
                        @error('about')
                            <span class= "d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark"> Save </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light">
                    This book is a treatise on the theory of ethics, very popular during the
                    Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                    from a line in section 1.10.32.
                </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comments->count() }} </a>
            </div>
            @if (Auth::id() !== $user->id)
                <div class="mt-3">
                    <button class="btn btn-primary btn-sm"> Follow </button>
                </div>
            @endif
        </div>
    </div>
</div>
