<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ComputersController;
use \App\Http\Controllers\RentComputerController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\LeasesController;

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

Route::get('customer/renting', [CustomerController::class, 'showAllRenting']) -> name('renting.customer');
Route::post('customer/return', [LeasesController::class, 'customerReturn']) -> name('return.customer');

Route::get('manager/renting', [LeasesController::class, 'rentalManagement']) -> name('renting.manager');
Route::post('manager/renting/endinglease', [LeasesController::class, 'endingLease']) -> name('ending-lease.manager');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
