@extends('layouts.base')

@section('main-title', 'Posts')

@section('main-content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Author</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->author->name}} {{$post->author->surname}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
