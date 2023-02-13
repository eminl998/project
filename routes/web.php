<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(TodoController::class)->group(function () { 



Route::get('todos', 'TodoController@index')->name('todos.index');

Route::get('search',[TodoController::class,'search'])->name('search');

Route::get('create', [TodoController::class, 'create'])->name('create');

Route::post('store', [TodoController::class, 'store'])->name('store');

Route::get('{id}/show', [TodoController::class, 'show'])->name('show');

Route::get('{id}/edit', [TodoController::class, 'edit'])->name('edit');

Route::put('{id}update', [TodoController::class, 'update'])->name('update');

Route::delete('{id}/destroy', [TodoController::class, 'destroy'])->name('destroy');


    Route::resource('todos', TodoController::class);

});



