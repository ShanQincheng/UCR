<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ComputersController;
use \App\Http\Controllers\RentComputerController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\LeasesController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AccountsController;
use \App\Http\Controllers\ManagerController;


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
Route::get('manager/computers', [ManagerController::class, 'index']) -> name('computers.manager');
Route::post('manager/computers/add', [ManagerController::class, 'addComputer']) -> name('add.computers.manager');
Route::post('manager/computers/edit/{ID}', [ManagerController::class, 'editComputer']) -> name('edit.computers.manager');
Route::delete('manager/computers/delete/{ID}', [ManagerController::class, 'deleteComputer']) -> name('delete.computers.manager');
Route::get('manager/staff/users', [ManagerController::class, 'staffUserManagement']) -> name('users.staff.manager');
Route::get('manager/admin/users', [ManagerController::class, 'adminUserManagement']) -> name('users.admin.manager');
Route::post('manager/admin/users/add/staff', [ManagerController::class, 'addStaff']) -> name('staff.add.users.admin.manager');
Route::post('manager/admin/users/remove/staff', [ManagerController::class, 'removeStaff']) -> name('staff.remove.users.admin.manager');
Route::post('manager/admin/users/remove/blackUser', [ManagerController::class, 'removeBlackUser']) -> name('blackUser.remove.users.admin.manager');
Route::get('manager/admin/dashboard', [ManagerController::class, 'adminDashboard']) -> name('dashboard.admin.manager');

Route::get('user/account', [UserController::class, 'userInfo']) -> name('user.account');
Route::post('user/account/edit', [UserController::class, 'editUserInfo']) -> name('edit.user.account');
Route::post('user/account/recharge', [AccountsController::class, 'topUp']) -> name('recharge.user.account');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
