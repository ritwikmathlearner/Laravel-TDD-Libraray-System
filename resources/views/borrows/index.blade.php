@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <h1 class="mr-auto">Borrow list</h1>
            @if(auth()->user()->type === 'librarian')
                <a href="/borrow/new" class="btn btn-primary">New Borrow</a>
            @endif
        </div>
        @forelse($borrows as $borrow)
            <div class="border border-dark text-dark rounded p-3 my-2 text-light">
                <h5>{{$borrow->book->title}}</h5>
                <p>{{ $borrow->user->name }}</p>
                <p><strong>Borrow Date: </strong>{{ $borrow->borrow_date }}</p>
                <p><strong>Expected Return Date: </strong>{{ $borrow->expected_return_date }}</p>
                @if(!isset($borrow->actual_return_date) && auth()->user()->type === 'librarian')
                    <form action="/borrow/return" method="POST">
                        @csrf
                        <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
                        <button type="submit" class="btn btn-success">Return</button>
                    </form>
                @else
                    <p><strong>Actual Return Date: </strong>{{ $borrow->actual_return_date ?? 'Not returned' }}</p>
                @endif
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No books yet borrowed.
            </div>
        @endforelse
    </div>
@endsection
