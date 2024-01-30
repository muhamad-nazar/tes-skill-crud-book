<?php

<<<<<<< HEAD
use App\Http\Controllers\PagesController;
=======
>>>>>>> 8589cb02ed027bedbdeaa78b04ab2e9474b646a4
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

<<<<<<< HEAD
//Home
Route::get('/', [PagesController::class, 'index']);


//Books & Categories
Route::get('/categories', [PagesController::class, 'categories']);
=======
Route::get('/', function () {
    return view('welcome');
});
>>>>>>> 8589cb02ed027bedbdeaa78b04ab2e9474b646a4
