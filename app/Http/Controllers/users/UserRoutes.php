<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route;

class UserRoutes extends Controller
{
    public static function routes()
    {

        Route::view("login", "users.login")->name("login");

    }
}
