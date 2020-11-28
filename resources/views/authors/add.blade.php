@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{ action('AuthorsController@store') }}" class="w-50 mx-auto mt-5">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" autofocus>
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="second_name">Last Name</label>
                <input type="text" name="second_name" class="form-control" id="second_name" value="{{ old('second_name') }}"
                       placeholder="Last name">
                @error('second_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="birth_year">Edition</label>
                <input type="int" name="birth_year" class="form-control" id="birth_year" placeholder="Birthdate">
                @error('birth_year')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
