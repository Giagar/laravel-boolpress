@extends('layouts.base')

@section('main-title', 'Comments')

@section('main-content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Relate Post Id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Author</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->post->id }}</td>
                    <td>{{ $comment->title }}</td>
                    <td>{{ $comment->body}}</td>
                    <td>{{ $comment->author}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
