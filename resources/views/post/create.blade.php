@extends('layouts.base')

@section('main-title', 'Add posts')

@section('main-content')
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">Email address</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Enter post's title">
    </div>
    <div class="form-group">
        <label for="body">Example textarea</label>
        <textarea class="form-control" id="body" name="body" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="auhtor_id">Example multiple select</label>
        <select class="form-control" id="auhtor_id" name="author_id">
          @foreach ($authors as $author)
              <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
          @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
