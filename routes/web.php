<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'BooksController@index');
Route::get('/books', 'BooksController@index');
Route::post('/books', 'BooksController@store');
Route::get('/books/add', 'BooksController@add');

Route::get('/authors/add', 'AuthorsController@add');
Route::get('/authors', 'AuthorsController@index');
Route::post('/authors', 'AuthorsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
