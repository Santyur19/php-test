<?php

use App\Http\Controllers\books\BookRoutes;
use App\Http\Controllers\users\UserRoutes;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::prefix("users")->group(function () {
    UserRoutes::routes();
});

Route::prefix("books")->group(function () {
    BookRoutes::routes();
});

