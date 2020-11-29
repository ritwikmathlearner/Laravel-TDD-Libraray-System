<?php

use Illuminate\Support\Facades\Route;

Route::get('/borrow/list', 'BorrowController@index')->middleware('auth');

Route::view('/', 'home')->middleware('auth');

Route::middleware(['auth', 'librarian'])->group(function () {
    Route::get('/books', 'BooksController@index');
    Route::post('/books', 'BooksController@store');
    Route::get('/books/add', 'BooksController@add');

    Route::get('/authors/add', 'AuthorsController@add');
    Route::get('/authors', 'AuthorsController@index');
    Route::post('/authors', 'AuthorsController@store');

    Route::get('/borrow/new', 'BorrowController@create');
    Route::post('/borrow', 'BorrowController@store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
