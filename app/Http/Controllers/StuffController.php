<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\User;
use App\Post;

class StuffController extends Controller
{
    public function welcome () 
    {
        
        // shows posts on the welcome page
        
        $posts = Post::with('users')->orderBy('created_at', 'desc')->paginate(6);

        return view('welcome', ['posts' => $posts]);
        
    }
    
    public function showPost($id) {
        
        // shows the full post when someone clicks on read more

        $post = Post::with('users')->where('post_id', $id)->first();

        return view('pages.postpage', ['post' => $post]);
        
    }
    
}
