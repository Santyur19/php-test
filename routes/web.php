<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/books');

Route::view('/books', 'books.index');
Route::view('/loans/new', 'loans.new');
Route::view('/dashboard', 'dashboard');
