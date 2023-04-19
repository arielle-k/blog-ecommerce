<?php

use App\Http\Controllers\PostController;
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
Route::resource('posts', PostController::class)->except('index');
Route::get('/',[PostController::class, 'index'])->name('posts.index');

Route::get('/login',[PostController::class,'login'])->name('login');
Route::post('/login',[PostController::class,'handleLogin']);
Route::get('/logout', [PostController::class, 'logout'])->name('logout');


//Route::get('/', function () {
    //return view('welcome');
//});
