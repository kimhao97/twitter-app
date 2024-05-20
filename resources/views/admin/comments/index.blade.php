@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Ideas</h1>

            <table class="table table-striped mt-3">
                <thread class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Idea</th>
                        <th>Content</th>
                        <th>Created at</th>
                        <th>#</th>
                    </tr>
                </thread>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $comment->user) }}">
                                    {{ $comment->user->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.show', $comment->idea) }}">
                                    {{ $comment->idea->id }}
                                </a>
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>-</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
