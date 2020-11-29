<?php

namespace App\Http\Controllers;

use App\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function store(Request $request)
    {
        Borrow::create($request->all());
    }
}
