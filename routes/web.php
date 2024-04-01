<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HODController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;


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
Route::get('/register/emailverification', [AuthController::class, 'emailverify']);
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



Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'HOD'], function () {
    Route::get('/HOD/dashboard', [DashboardController::class, 'dashboard']);
    //student
    Route::get('/HOD/student/list', [HODController::class, 'list']);
    //staff
    Route::get('/HOD/staff/view', [HODController::class, 'view'])->name('staff-members.view');
    Route::get('/HOD/staff-members/create', [HODController::class, 'create'])->name('staff-members.create');
    Route::post('/HOD/staff-members/create', [HODController::class, 'store'])->name('staff-members.store');
    Route::get('/HOD/staff/list', [HODController::class, 'stafflist'])->name('staff-members.list');
    //Attachment
    Route::get('/HOD/attachment/list', [AttachmentController::class, 'attachmentlist'])->name('attachment.list');
    Route::get('/HOD/attachment/details/{userId}', [AttachmentController::class, 'viewattachmentdetails'])->name('attachment.details');
    Route::get('/HOD/unassigned-staff', [AttachmentController::class, 'showUnassignedStaff'])->name('unassignedStaff');
    Route::get('/HOD/{staffId}/assign-supervisor', [AttachmentController::class, 'assignSupervisorForm'])->name('assign.supervisor.form');
    Route::post('/HOD/{studentId}/assign-supervisor', [AttachmentController::class, 'assignSupervisor'])->name('assign.supervisor');
    Route::get('/HOD/attachment/supervisor/allocation', [AttachmentController::class, 'supervisorallocation']);

    



});

Route::group(['middleware' => 'staff'], function () {
    Route::get('/staff/dashboard', [DashboardController::class, 'dashboard']);

    //Notes
    Route::get('/staff/notes/add', [NoteController::class, 'notes']);
    Route::post('/staff/notes/add', [NoteController::class, 'store']);
    Route::get('/staff/notes/view', [NoteController::class, 'mynotes']);
    Route::delete('/staff/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
    Route::get('/staff/notes/{id}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/staff/notes/{id}', [NoteController::class, 'update'])->name('notes.update');
    Route::get('/staff/view/assigned-student', [StaffController::class, 'viewAllocatedStudents'])->name('allocated.students');


});


Route::group(['middleware' => 'student'], function () {
    Route::get('/student/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/student/attachment/interface', [AttachmentController::class, 'interface']);
    Route::get('/student/attachment/info', [AttachmentController::class, 'info']);
    Route::get('/student/attachment/add', [AttachmentController::class, 'add']);
    Route::post('/student/attachment/add', [AttachmentController::class, 'insert']);
    Route::get('/student/attachment/edit/{id}', [AttachmentController::class, 'edit']);
    Route::post('/student/attachment/edit/{id}', [AttachmentController::class, 'update']);
    Route::get('/student/logbook/download', [LogbookController::class, 'logbook']);
    Route::get('/student/logbook/download/error', [LogbookController::class, 'logbookerror']);
    //supervisor
    Route::get('/student/assigned-supervisor', [StudentController::class, 'viewAllocatedSupervisor'])->name('allocated.supervisor');
});
