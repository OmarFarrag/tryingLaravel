<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

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
        try{
            // Get random posts
            $posts = Post::orderBy('no_of_recomm','desc')->get();
        }catch(Exception $e){
            
        }
        
        return view('home')->with('posts',$posts);
    }
}
