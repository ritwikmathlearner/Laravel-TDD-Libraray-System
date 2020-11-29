@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <h1 class="mr-auto">Borrow list</h1>
            <a href="/borrow/new" class="btn btn-primary">New Borrow</a>
        </div>
        @forelse($borrows as $borrow)
            <div class="border bg-secondary p-3 my-2 text-light">
                <h5>{{$borrow->book->title}}</h5>
                <p>{{ $borrow->user->name }}</p>
                <p><strong>Borrow Date: </strong>{{ $borrow->borrow_date }}</p>
                <p><strong>Expected Return Date: </strong>{{ $borrow->expected_return_date }}</p>
                <p>{{ $borrow->actual_return_date ?? 'Not returned' }}</p>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No books yet borrowed.
            </div>
        @endforelse
    </div>
@endsection
