@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ action('BooksController@store') }}" class="w-50 mx-auto mt-5">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Enter title of book" autofocus>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="publish_year">Publish Year</label>
                <input type="number" name="publish_year" class="form-control" id="publish_year"
                       placeholder="Publish year">
                @error('publish_year')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="edition">Edition</label>
                <input type="text" name="edition" class="form-control" id="edition" placeholder="Edition">
                @error('edition')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="stocks">Available Stocks</label>
                <input type="number" name="stocks" class="form-control" id="stocks"
                       placeholder="Available stocks in number">
                @error('stocks')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="edition">Author</label>
                <select name="author" id="author" class="form-control">
                    <option value="" selected>Select author</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->first_name . ' ' . $author->second_name }}</option>
                    @endforeach
                </select>
                @error('author')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
