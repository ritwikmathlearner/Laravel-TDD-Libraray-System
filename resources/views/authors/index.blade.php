@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <h1 class="mr-auto">List of authors</h1>
            <a href="{{action('AuthorsController@add')}}" class="btn btn-primary my-3">Add New Author</a>
        </div>
        @forelse($authors as $author)
            <div class="border bg-secondary p-3 my-2 text-light">
                <h4>{{$author->first_name . ' ' . $author->second_name}}</h4>
                <p><strong>Birth year: </strong>{{$author->birth_year}}</p>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No authors are availble. Please add an author first
            </div>
        @endforelse
    </div>
@endsection
