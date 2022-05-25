<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ComputersController;
use \App\Http\Controllers\RentComputerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ComputersController::class, 'index']) -> name('home');

Route::get('rental', [ComputersController::class, 'show']) ->name('index.rental');
Route::get('rental/detail', [ComputersController::class, 'detail']) -> name('detail.rental');
Route::post('rental/detail', [RentComputerController::class, 'rent']) -> name('rent.rental');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
