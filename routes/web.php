<?php

use App\Http\Controllers\CreateController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', [PagesController::class, 'index']);

//Books & Categories

//Categories
Route::get('/categories', [PagesController::class, 'categories']);
//Create Categories
Route::post('/categories/add', [CreateController::class, 'categories']);
//Update Categories
Route::post('/categories/update/{id}', [UpdateController::class, 'categories']);
//Delete Categories
Route::get('/categories/delete/{id}', [DeleteController::class, 'categories']);


//Books
Route::get('/categories/{id}/books', [PagesController::class, 'books']);
//Create Books
Route::post('/books/add', [CreateController::class, 'books']);
//Pages Update Books
Route::get('/books/{id}', [PagesController::class, 'booksPages']);
//Update Books
Route::post('/books/{id}/update', [UpdateController::class, 'books']);
//Delete Books
Route::get('/books/{id}/deletes', [DeleteController::class, 'books']);
//Views Books
Route::get('/books/{id}/{title}', [PagesController::class, 'viewBooks']);

//Filter Books
Route::get('/filter', [PagesController::class, 'filter']);
