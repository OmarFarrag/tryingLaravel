<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            //Check user is authenticated
            if(Auth::check()){
                // Get the ids of the people the user is following
                $followedUsersIdsObj = DB::table('followings')->where('follower_id', auth()->user()->id)->distinct()->select('following_id')->get();
                //Extract the ids
                $followedUsersIdsObj= json_decode($followedUsersIdsObj,true);
                $followedUsersIds = array();
                foreach($followedUsersIdsObj as $x){
                    array_push($followedUsersIds, $x['following_id']);
                }
                $posts = DB::table('posts')->whereIn('author_id',$followedUsersIds)->join('users', 'posts.author_id', '=','users.id' )
                ->select('posts.pic_url','posts.id','users.name','posts.body','posts.title')->get();
            }
        }catch(Exception $e){
            return view('posts.error')->with('message','Something went wrong!');
        }

        return view('home')->with('posts',$posts);
    }
}
