<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link text-dark" href="#">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Explore</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Feed</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="terms">
                    <span>Terms</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Support</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Settings</span></a>
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
