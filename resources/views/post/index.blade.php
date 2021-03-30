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
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}
                        <br>
                        <button class="btn btn-info" data-toggle="collapse" data-target="#commentsContainer{{$post->id}}">See comments</button>
                        <div class="collapse" id="commentsContainer{{$post->id}}">
                            <h3>Comments</h3>
                            @foreach ($post->comments as $comment)
                                <div>
                                    <span>{{ $comment->id }}</span>
                                    <h4>{{ $comment->title }}</h4>
                                    <p>{{ $comment->body }}</p>
                                    <span>{{ $comment->author }}</span>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td>{{ $post->author->name}} {{$post->author->surname}}</td>
                    <td>
                        <a href="{{ route('posts.show', compact('post')) }}" class="btn btn-info">See</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
