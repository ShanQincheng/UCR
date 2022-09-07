<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ComputersController;
use \App\Http\Controllers\RentComputerController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\LeasesController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AccountsController;
use \App\Http\Controllers\ManagerController;
use \App\Http\Controllers\EmailController;


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

Route::get('encryption', function (){
    return view('encryption.encryption');
});

Route::get('email/send', function (){
    return view('email.send', ['sentInfo' => '']);
});

Route::post('email/send', [EmailController::class, 'sendEmail']) -> name('email.send');

Route::get('rental', [ComputersController::class, 'show']) ->name('index.rental');
Route::get('rental/detail', [ComputersController::class, 'detail']) -> name('detail.rental');
Route::post('rental/detail',
    [RentComputerController::class, 'rent']
)->middleware(['auth']) -> name('rent.rental');

Route::get('customer/renting',
    [CustomerController::class, 'showAllRenting']
)->middleware(['auth']) -> name('renting.customer');
Route::post('customer/return',
    [LeasesController::class, 'customerReturn']
)->middleware(['auth']) -> name('return.customer');

Route::get('manager/renting',
    [LeasesController::class, 'rentalManagement']
)->middleware(['auth']) -> name('renting.manager');
Route::post('manager/renting/endinglease',
    [LeasesController::class, 'endingLease']
) ->middleware(['auth']) -> name('ending-lease.manager');
Route::get('manager/computers',
    [ManagerController::class, 'index']
)->middleware(['auth']) -> name('computers.manager');
Route::post('manager/computers/add',
    [ManagerController::class, 'addComputer']
)->middleware(['auth']) -> name('add.computers.manager');
Route::post('manager/computers/edit/{ID}',
    [ManagerController::class, 'editComputer']
)->middleware(['auth']) -> name('edit.computers.manager');
Route::delete('manager/computers/{ID}',
    [ManagerController::class, 'deleteComputer']
)->middleware(['auth']) -> name('delete.computers.manager');
Route::get('manager/staff/users',
    [ManagerController::class, 'staffUserManagement']
)->middleware(['auth']) -> name('users.staff.manager');
Route::get('manager/admin/users',
    [ManagerController::class, 'adminUserManagement']
)->middleware(['auth']) -> name('users.admin.manager');
Route::post('manager/admin/users/add/staff',
    [ManagerController::class, 'addStaff']
)->middleware(['auth']) -> name('staff.add.users.admin.manager');
Route::post('manager/admin/users/remove/staff',
    [ManagerController::class, 'removeStaff']
)->middleware(['auth']) -> name('staff.remove.users.admin.manager');
Route::post('manager/admin/users/remove/blackUser',
    [ManagerController::class, 'removeBlackUser']
)->middleware(['auth']) -> name('blackUser.remove.users.admin.manager');
Route::get('manager/admin/dashboard',
    [ManagerController::class, 'adminDashboard']
)->middleware(['auth']) -> name('dashboard.admin.manager');

Route::get('user/account',
    [UserController::class, 'userInfo']
)->middleware(['auth']) -> name('user.account');
Route::post('user/account/edit',
    [UserController::class, 'editUserInfo']
)->middleware(['auth']) -> name('edit.user.account');
Route::post('user/account/recharge',
    [AccountsController::class, 'topUp']
)->middleware(['auth']) -> name('recharge.user.account');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
