<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    Route::get('/books/search', [BookController::class, 'search'])
        ->name('books.search');
    Route::get('/books/filter', [BookController::class, 'filter'])
        ->name('books.filter');
    Route::get('/books/filter-search', [BookController::class, 'filterSearch'])
        ->name('books.filter-search');
    Route::get('/dashboard/stats', function () {

        return response()->json([
            'categories' => \App\Models\Category::count(),
            'books' => \App\Models\Book::count(),
            'members' => \App\Models\Member::count(),
            'borrowings' => \App\Models\Borrowing::where(
                'status',
                'borrowed'
            )->count(),
        ]);
    })->middleware('auth');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
