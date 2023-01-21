<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;


Route::get('/admin', function () {return redirect('/admin/dashboard');})->middleware('admin.auth');
    Route::prefix('admin')->group(function(){
        // Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
        // Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
        Route::get('/login', [AdminLoginController::class, 'show'])->middleware('admin.guest')->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login'])->middleware('admin.guest')->name('admin.login.perform');
        // Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
        // Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
        // Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
        // Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home')->middleware('admin.auth');

        Route::group(['middleware' => 'admin.auth'], function () {
            // Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
            // Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
            // Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
            // Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
            // Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
            // Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
            // Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
            Route::get('/{page}', [AdminPageController::class, 'index'])->name('page');
            Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        });
    });

