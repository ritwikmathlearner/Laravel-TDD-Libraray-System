@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ action('BorrowController@store') }}" class="w-50 mx-auto mt-5">
            @csrf
            <div class="form-group">
                <label for="user_id">{{__('Member')}}</label>
                <select name="user_id" id="user_id" class="form-control">
                    <option value="" selected>Select member</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ __($user->name)}}</option>
                    @endforeach
                </select>
                @error('user_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="expected_return_date">{{__('Expected return date')}}</label>
                <input type="date" min={{\Carbon\Carbon::now()}} name="expected_return_date" class="form-control" id="expected_return_date"
                       placeholder="Expected return date">
                @error('expected_return_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="book_id">{{__('Book')}}</label>
                <select name="book_id" id="book_id" class="form-control">
                    <option value="" selected>Select book</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ __($book->title)}}</option>
                    @endforeach
                </select>
                @error('book_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
