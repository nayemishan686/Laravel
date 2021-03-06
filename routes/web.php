<?php

use App\Http\Controllers\admin\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

// ___CLASS CRUD PROJECT IN NORMAL WAY___
Route::get('class',[App\Http\Controllers\admin\ClassController::class, 'index'])->name('index.class');
Route::get('create/class', [\App\Http\Controllers\admin\ClassController::class, 'create'])->name('create.class');
Route::post('store/class',[App\Http\Controllers\admin\ClassController::class, 'store'])->name('store.class');
Route::get('delete/class/{id}',[App\Http\Controllers\admin\ClassController::class, 'delete'])->name('delete.class');
Route::get('edit/class/{id}',[\App\Http\Controllers\admin\ClassController::class, 'edit'])->name('edit.class');
Route::post('update/class/{id}',[\App\Http\Controllers\admin\ClassController::class, 'update'])->name('update.class');
Route::get('show/class/{id}',[\App\Http\Controllers\admin\ClassController::class, 'show'])->name('show.class');


// ___STUDENTS CRUD PROJECT BY RESOURCE CONTROLLER___
Route::resource('students',StudentController::class);












Auth::routes();

//to verify email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//to show verification notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//to send verification resend
Route::post('verify/email',[App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
