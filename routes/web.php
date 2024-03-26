<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttachmentController;

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
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'create_user']);
Route::get('/register/emailverification',[AuthController::class, 'emailverify']);
Route::get('/verify/{token}', [AuthController::class, 'verify']);




Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{remember_token}', [AuthController::class, 'reset']);
Route::post('/reset/{remember_token}', [AuthController::class, 'Postreset']);


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
    Route::get('/student/attachment/info', [DashboardController::class, 'dashboard']);
    Route::get('admin/attachment/add', [AttachmentController::class, 'add']);
    Route::post('admin/attachment/add', [AttachmentController::class, 'insert']);
    Route::get('admin/attachment/edit/{id}', [AttachmentController::class, 'edit']);
    Route::post('admin/attachment/edit/{id}', [AttachmentController::class, 'update']);
});