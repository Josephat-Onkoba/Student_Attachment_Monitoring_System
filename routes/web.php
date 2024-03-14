<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register']);


Route::get('/admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'HOD'], function(){
    Route::get('/HOD/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'staff'], function(){
    Route::get('/staff/dashboard', [DashboardController::class, 'dashboard']);
});


Route::group(['middleware' => 'student'], function(){
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);
});