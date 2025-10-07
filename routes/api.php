<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthorController;
use App\Http\Controllers\API\V1\BookController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\LoanController;

Route::prefix('v1')->group(function () {
    Route::apiResource('authors', AuthorController::class);

    Route::apiResource('books', BookController::class);

    Route::apiResource('users', UserController::class);

    Route::apiResource('loans', LoanController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

    Route::post('loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');

    Route::post('books/{book}/attach-authors', [BookController::class, 'attachAuthors'])->name('books.attachAuthors');
});
