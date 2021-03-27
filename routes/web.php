<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::redirect('/', 'add-user');

Route::get('/add-user',[UserController::class, 'addUser']);

Route::post('/add-user',[UserController::class, 'storeUser'])->name('user.store');

Route::get('/users',[UserController::class, 'users'])->name('users.all');

Route::get('/edit-user/{id}',[UserController::class, 'editUser'])->name('user.edit');

Route::post('/update-user',[UserController::class, 'updateUser'])->name('user.update');

Route::get('/delete-user/{id}',[UserController::class, 'deleteUser'])->name('user.delete');

Route::get('/show/{id}',[UserController::class, 'show'])->name('user.show');
