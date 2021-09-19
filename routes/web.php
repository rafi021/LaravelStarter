<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleControlller;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Frontend/Public Panel Routes Start
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
// Frontend/Public Panel Routes End



// Admin Panel Routes Start
Auth::routes();


Route::prefix('admin')->middleware(['auth',])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('/roles', RoleControlller::class);
    Route::resource('/users', UserController::class);
    Route::resource('/backups', BackupController::class)->only(['index','store','destroy']);
    Route::get('/backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
});
// Admin Panel Routes End
