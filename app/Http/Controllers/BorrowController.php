<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowController extends Controller
{
    public function index()
    {
        if(auth()->user()->type === 'librarian') {
            $borrows = Borrow::all()->sortByDesc('created_at');
        } elseif(auth()->user()->type === 'member') {
            $borrows = Borrow::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->get();
        } else {
            return back();
        }
        return view('borrows.index', compact('borrows'));
    }
    public function create()
    {
        $books = Book::where('stocks', '>', 0)->get();
        $users = User::where('type', 'member')->get();
        return view('borrows.create', compact('books','users'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'book_id' => 'required',
            'user_id' => 'required',
            'expected_return_date' => 'required|date',
        ]);
        $validator['borrow_date'] = Carbon::today()->format('Y/m/d');
        Book::find($request->book_id)->decrement('stocks');
        Borrow::create($validator);

        return redirect('/borrow/list');
    }

    public function returnBook(Request $request)
    {
        $borrow = Borrow::find($request->borrow_id);
        $borrow->actual_return_date = Carbon::today()->format('Y/m/d');
        $borrow->save();
        $borrow->book->increment('stocks');
        return redirect('/borrow/list');
    }
}
