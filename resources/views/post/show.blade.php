@extends('layouts.base')

@section('main-title')
    Post: {{$post->id}}
@endsection

@section('main-content')

<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text"> {{$post->body}} </p>
      <p class="card-text"> {{$post->author->name}} {{$post->author->surname}} </p>
      <a href=" {{ route('post.index') }} " class="btn btn-primary">Back to posts</a>
    </div>
</div>

<h3>Comments</h3>
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
            @foreach ($post->comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->title }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->author }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
