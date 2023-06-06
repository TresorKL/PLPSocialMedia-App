<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Models\Post;
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

Route::get('/main', function (Request $request) {

    $posts=Post::orderBy('created_at', 'desc')->get();
    $request->session()->put("posts", $posts); ;
    return view('mainpage');
});
Route::get('/myposts', function (Request $request) {
    if($request->session()->get("user")!=null){
        $id = $request->session()->get("user")->id; 
        $posts=Post::where('user_app_id','=',$id)->latest('created_at')->get();
        $request->session()->put("posts", $posts);

        return view("myposts");
    }else{
        return redirect("/logout");

    }
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
Route::get('logout/',[AuthController::class,'logout']);

Route::post('/comments/{id}',[PostController::class,'getComments']);
Route::post('/comment/{id}',[PostController::class,'addComment']);

