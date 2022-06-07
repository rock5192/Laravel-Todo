<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('todo-list',[TodoListController::class,'index'])->name('todo-list.store');

Route::get('todo-list/{todo_list}',[TodoListController::class,'show'])->name('todo-list.show');

Route::get('test',[TodoListController::class,'test'])->name('test');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
