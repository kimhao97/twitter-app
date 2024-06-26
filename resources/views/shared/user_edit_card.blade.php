<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="Mario Avatar">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="input-group">
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <label for="">Profile picture</label>
                <input name="image" class="form-control" type="file">
            </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="idea" rows="3">  </textarea>
                    @error('bio')
                        <span class= "d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Save </button>
                </div>
                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> {{ $user->followers()->count() }} Followers </a>
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
        </form>
    </div>
</div>
