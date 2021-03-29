@extends('layouts.base')

@section('main-title', 'Author')

@section('main-content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Bio</th>
            <th scope="col">Website</th>
            <th scope="col">Pic</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->surname }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ $author->detail->bio }}</td>
                    <td>{{ $author->detail->website }}</td>
                    <td><img src="{{ $author->detail->pic }}" alt="author's picture"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
