<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? 'nav-link text-white bg-primary rounded' : 'nav-link text-dark' }}" href="/">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('feed')) ? 'nav-link text-white bg-primary rounded' : 'nav-link text-dark' }}" href="feed">
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('terms')) ? 'nav-link text-white bg-primary rounded' : 'nav-link text-dark' }}" href="terms">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    @auth
    <form class="form mt-5" action="{{ route('users.show', Auth::user()) }}" method="GET">
        @csrf
        <div class="card-footer text-center py-2">
            {{-- <a class="btn btn-link btn-sm" href="#">View Profile </a> --}}
            <input type="submit" name="profile" class="btn btn-link btn-sm" value="View Profile">
        </div>
    </form>
    @endauth
</div>
