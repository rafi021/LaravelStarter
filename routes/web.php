<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuBuilderController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleControlller;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
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

    // Role and Users Routes
    Route::resource('/roles', RoleControlller::class);
    Route::resource('/users', UserController::class);

    // Database & Project Backup Routes
    Route::resource('/backups', BackupController::class)->only(['index','store','destroy']);
    Route::get('/backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
    Route::delete('/backup/clean', [BackupController::class, 'clean'])->name('backups.clean');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/profile/security', [ProfileController::class, 'changePassword'])->name('profle.password.change');
    Route::put('/profile/security/{user}', [ProfileController::class, 'updatePassword'])->name('profle.password.update');

    // Pages
    Route::resource('pages', PageController::class);

    //Menus routes
    Route::resource('menus', MenuController::class)->except('show');

    Route::group(['as' => 'menus.', 'prefix' => 'menus/{id}'],function () {
        Route::get('builder', [MenuBuilderController::class, 'index'])->name('builder.page');
        Route::get('item/create', [MenuBuilderController::class, 'itemCreate'])->name('item.create');
        Route::post('item/create', [MenuBuilderController::class, 'itemStore'])->name('item.store');
        Route::get('item/edit/{item}', [MenuBuilderController::class, 'itemEdit'])->name('item.edit');
        Route::put('item/update/{item}', [MenuBuilderController::class, 'itemUpdate'])->name('item.update');
        Route::delete('item/delete/{item}', [MenuBuilderController::class, 'itemDelete'])->name('item.delete');
    });
});
// Admin Panel Routes End

// Always add to last route
Route::get('{slug}',[FrontendPageController::class, 'index'])->name('frontend.page');
