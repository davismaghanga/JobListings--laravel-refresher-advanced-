<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
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

Route::get('/',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create'])->middleware('auth');
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);//tags/frontend

Route::middleware('guest')->group(function (){
    //Register User
    Route::get('/register',[RegisteredUserController::class, 'create']);
    Route::post('/register',[RegisteredUserController::class, 'store']);
    //Login User
    Route::get('/login',[SessionController::class, 'create']);
    Route::post('/login',[SessionController::class, 'store']);
});

Route::get('/logout',[SessionController::class, 'destroy'])->middleware('auth');
