<?php

use App\Http\Controllers\TaskController;
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


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tasks', TaskController::class);
Route::get('/tasks/delete/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.delete');
Route::get('/tasks/show/activity/{id}', [App\Http\Controllers\TaskController::class, 'showActivity'])->name('tasks.show-activity');
Route::get('/tasks/change/piority/{id}', [App\Http\Controllers\TaskController::class, 'changePiority'])->name('tasks.change-piority');
Route::post('/tasks/update/piority', [App\Http\Controllers\TaskController::class, 'updatePiority'])->name('tasks.update-piority');
});
