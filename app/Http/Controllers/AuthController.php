<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\UserApp;
use App\Models\Post;

class AuthController extends Controller
{
    //

    function welcome(Request $request){
       // $request->session()->put("isUserValid", true);
        return view("auth");
    }

    function createAccount(Request $request){
        
        $user=UserApp::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $request->password
        ]);
    
        return view("auth");
    }


    function Login(Request $request){
        
        $user=UserApp::where('email','=',$request->email)   
        ->where('password', '=', $request->password)->first();

        if($user!=null){
            $posts=Post::all();
            $request->session()->put("user", $user); 
            $request->session()->put("posts", $posts); 
         return view("mainpage");
        }else{

            $request->session()->put("isUserValid", "yes"); 
            return redirect("/login");
        }
    
    }

    function logout(){
        Session::flush();
        return redirect("/");
    }
}
