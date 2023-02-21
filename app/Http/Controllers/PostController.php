<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\UserApp;
use App\Models\Comment;
use App\Models\Post;
class PostController extends Controller
{
    //
    function addPost(Request $request){
    
        $id = $request->session()->get("user")->id; 
        $user=UserApp::find($id);
        $current_date_time = Carbon::now()->toDateTimeString();

        if($request->file('image')!=null){

        $imageName=$request->file('image')->getClientOriginalName();
        $image=$current_date_time.$id.$imageName;
        $request->file('image')->storeas('images', $image,'s3');
        //$file=$request->file('image');
       // $path = Storage::disk('s3')->put( 'images',  $file);
        //$path = Storage::disk('s3')->url($path);
        $user->post()->create([
            "posted_by"=>$user->name,
            "caption"=>$request->caption,
            "image"=>$image,
            "likes"=>0
         ]);

         $posts=Post::all();
         $request->session()->put("posts", $posts); 

         return redirect("/main");
        }else{
            $user->post()->create([
                "caption"=>$request->caption,
                "posted_by"=>$user->name,
                "likes"=>0
             ]);
    
             $posts=Post::all();
         $request->session()->put("posts", $posts); 
             return redirect("/main"); 
        }
         
    }

    function getUserPosts(Request $request){
        $id = $request->session()->get("user")->id; 
        // $user=UserApp::find($id);
        $posts=Post::where('user_app_id','=',$id)->get();
        $request->session()->put("posts", $posts);

        return view("myposts");

    }


    function delete(Request $request,$id){
        $userId = $request->session()->get("user")->id;
        
        Post::where('id','=',$id )->delete();
        // $user=UserApp::find($id);
        $posts=Post::where('user_app_id','=',$userId )->get();
        $request->session()->put("posts", $posts);

        return view("myposts");;  

    }

    function editPost(Request $request,$id){
        $userId = $request->session()->get("user")->id;
        
        $post=Post::find($id);
        $post->caption=$request->caption;
        $post->save();
        // $user=UserApp::find($id);
        $posts=Post::where('user_app_id','=',$userId )->get();
        $request->session()->put("posts", $posts);

        return view("myposts");

    }

    function likePost(Request $request,$id){
        
        $post=Post::find($id);
        $currentLikes=$post->likes;
        $post->likes=$currentLikes+1;
        $post->save();
        // $user=UserApp::find($id);
        $posts=Post::all();
        $request->session()->put("posts", $posts);

        return redirect("/main");  

    }

    function getComments(Request $request,$id)
    {
        # code...
        $post=Post::find($id);
        $comments=Comment::where('post_id','=',$id)->get();
        $request->session()->put("comments", $comments);
        $request->session()->put("post", $post);

        return view("commentsection");

    }

    function addComment(Request $request,$id){

        $post=Post::find($id);
        $commentedBy = $request->session()->get("user")->name;
        $post->comment()->create([
            "comment_text"=>$request->comment,
            "commented_by"=>$commentedBy
        ]);

        $comments=Comment::where('post_id','=',$id)->get();
        $request->session()->put("comments", $comments);
        $request->session()->put("post", $post);

        return view("commentsection");
    }


}
