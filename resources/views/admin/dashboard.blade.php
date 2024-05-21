@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total User',
                        'icon' => 'fas fa-user',
                        'data' => $totalUser])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Idea',
                        'icon' => 'fa-solid fa-lightbulb',
                        'data' => $totalIdea])
                </div>
                <div class="col-sm-6 col-md-4">
                    @include('shared.widget', [
                        'title' => 'Total Comment',
                        'icon' => 'fa-solid fa-comment',
                        'data' => $totalComment])
                </div>
            </div>
        </div>
    </div>
@endsection
