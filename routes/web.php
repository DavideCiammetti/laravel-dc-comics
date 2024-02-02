<?php

use App\Http\Controllers\Admin\ComicsController;
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
// route pagina principale
Route::get('/', function () {
    return view('welcome');
});

// route a ComicsController
Route::resource('comics', ComicsController::class);
