@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            @include('shared.success_message')
            @include('shared.user_edit_card')
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea_card')
                </div>
            @empty
                <h4 class="text-center mt-4"> No results found.</h4>
            @endforelse
            <div class="mt-3">
                {{ $ideas->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection
