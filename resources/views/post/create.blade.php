@extends('layouts.base')

@section('main-title', 'Add posts')

@section('main-content')
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Enter post's title">
    </div>
    <div class="form-group">
        <label for="body">Enter post</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="auhtor_id">Select the post's author</label>
        <select class="form-control" id="auhtor_id" name="author_id">
          @foreach ($authors as $author)
              <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Add multiple tags to the post</label>
        <select multiple class="form-control" id="tags" name="tags[]">
          @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Upload an image</label>
        <input type="file" id="image" name="image" class="form-control">
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
