@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{action('AuthorsController@add')}}" class="btn btn-primary my-3">Add New Author</a>
        @forelse($authors as $author)
            <div class="border bg-secondary p-3 my-2 text-light">
                <h4>{{$author->first_name . ' ' . $author->second_name}}</h4>
                <h5>{{\Carbon\Carbon::parse($author->birth_year)->format('d/m/Y')}}</h5>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No authors are availble. Please add an author first
            </div>
        @endforelse
    </div>
@endsection
