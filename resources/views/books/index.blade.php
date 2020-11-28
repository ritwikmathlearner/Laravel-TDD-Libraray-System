@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{action('BooksController@add')}}" class="btn btn-primary my-3">Add New Book</a>
        <a href="{{action('AuthorsController@add')}}" class="btn btn-primary my-3">Add New Author</a>
        @forelse($books as $book)
            <div class="border bg-secondary p-3 my-2 text-light">
                <h5>{{$book->title}}</h5>
                <p>by {{$book->authors[0]->first_name . ' ' . $book->authors[0]->second_name}}</p>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No books are availble. Please add a book first
            </div>
        @endforelse
    </div>
@endsection
