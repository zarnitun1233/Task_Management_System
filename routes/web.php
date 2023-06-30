<?php

use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('common');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//UserController Routes
Route::get('/user-list', [UserController::class, 'index'])->name('user-list');
Route::get('/user-detail/{id}', [UserController::class, 'show'])->name('user-detail');
Route::get('/user-create', [UserController::class, 'create'])->name('user-create');
Route::post('/user-create', [UserController::class, 'store'])->name('user-create');
Route::get('/user-update/{id}', [UserController::class, 'edit'])->name('user-update')->middleware('admin');
Route::post('/user-update/{id}', [UserController::class, 'update'])->name('user-update');
Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
Route::get('/choose-user', [UserController::class, 'choose'])->name('choose-user');

//TaskController Routes
Route::get('/task-list', [TaskController::class, 'index'])->name('task-list');
Route::get('/task-detail/{id}', [TaskController::class, 'show'])->name('task-detail');
Route::get('/task-create/{id}', [TaskController::class, 'create'])->name('task-create');
Route::post('/task-store', [TaskController::class, 'store'])->name('task-store');
Route::get('/task-update/{id}', [TaskController::class, 'edit'])->name('task-update');
Route::post('/task-update/{id}', [TaskController::class, 'update'])->name('task-update');
Route::delete('/task-delete/{id}', [TaskController::class, 'destroy'])->name('task-delete');
Route::get('/my-task/{id}', [TaskController::class, 'myTask'])->name('my-task');
