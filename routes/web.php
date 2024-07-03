<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('tasks');
});
Route::controller(TaskController::class)->prefix('tasks')->group(function(){
    Route::get('/','index')->name('tasks');
    Route::get('/{id}/show','show')->name('task.show');
    Route::view('/create','create')->name('task.create');
    Route::post('/store','store')->name('task.store');

});

Route::fallback(function(){
    return 'Please Try Again';
});
