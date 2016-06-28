<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Image;
use Illuminate\Support\Facades\Input as Input;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // lists out the posts for editing 
        
        $user_id = Auth::user()->id;
        
        if(Auth::user()->name == 'Igor') {
            $posts = Post::orderBy('created_at', 'desc')->paginate(20);
            return view('home', ['posts' => $posts]);
        }
        else {
            $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(20);
            return view('home', ['posts' => $posts]);
        }
        

    }
    
    public function newPost(Request $request) {
        
        // makes new post
        
        $title = $request->title;
        $post = $request->post;
        $user_id = Auth::user()->id;
    
 
        Post::create(['title' => $title, 'post' => $post, 'user_id' => $user_id]);


        return redirect('/');

    }

    
    public function edit (Request $request) {
        
        // loads the post which was chosen for editing
        
        $post_id = $request->edit_this;
        $postToEdit = Post::where('post_id', $post_id)->firstOrFail();
        
        return view('home', ['postToEdit' => $postToEdit]);

        
    }
    
    public function update(Request $request) {
        
        // updates the post with the new changes
        
        $post_id = $request->post_id;
        $post = $request->post;
        $title = $request->title;
        
        Post::where('post_id', $post_id)->update(['post' => $post, 'title' => $title]);
        
        return redirect('/home');
        
        
    }
    
    public function delete(Request $request) {
        
        // deletes the post which was chosen
        
        $post_id = $request->delete_this;
        
        Post::where('post_id', $post_id)->delete();
        
        return redirect('/home');
    }
    
}
