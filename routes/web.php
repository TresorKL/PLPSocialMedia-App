<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::get('/main', function () {
    // $request->session()->put("isUserValid", true);
    return view('mainpage');
});
Route::get('/myposts', function () {
    // $request->session()->put("isUserValid", true);
    return view('myposts');
});
Route::get('/',[AuthController::class,'welcome']);
Route::get('login/',[AuthController::class,'welcome']);
 
Route::post('account/',[AuthController::class,'createAccount']);
Route::post('login/',[AuthController::class,'login']);
Route::post('addpost/',[PostController::class,'addpost']);

Route::get('delete/{id}',[PostController::class,'delete']);
Route::post('myposts/',[PostController::class,'getUserPosts']);
Route::post('edit/{id}',[PostController::class,'editPost']);
Route::post('like/{id}',[PostController::class,'likePost']);
Route::post('logout/',[AuthController::class,'logout']);

Route::post('/comments/{id}',[PostController::class,'getComments']);
Route::post('/comment/{id}',[PostController::class,'addComment']);

