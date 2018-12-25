<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use Symfony\Component\Console\Input\Input;

use Illuminate\Foundation\Auth\User;
use App\models\Post;

class CommunityController extends Controller
{
    //


    public function exploreAuthors(){
        // Check if the user is logged in
        if(Auth::check()){
            try{
                // Get the ids of the people the user is following
                $followedUsersIdsObj = DB::table('followings')->where('follower_id', auth()->user()->id)->distinct()->select('following_id')->get();
                //Extract the ids
                $followedUsersIdsObj= json_decode($followedUsersIdsObj,true);
                $followedUsersIds = array();
                foreach($followedUsersIdsObj as $x){
                    array_push($followedUsersIds, $x['following_id']);
                }
                // Get the ids of the people the user is not following
                $unfollowedUsers =  DB::table('users')->whereNotIn('id', $followedUsersIds)->where('id','<>',auth()->user()->id)->select('name','id')->get();    
               
            }catch(Exception $e){

            }
            return View('community.suggestions')->with('users',$unfollowedUsers);
        }
    }

    public function follow($id){
        
        if(Auth::check()){
            try{
               
                // Check the user is not already following him (Double check)
                $already = DB::table('followings')->where('follower_id', auth()->user()->id)->where('following_id',$id)->get();
                if($already->count() == 0){
                    
                    DB::table('followings')->insert(array(
                        'follower_id'=>auth()->user()->id,
                        'following_id'=>$id
                    ));
                    return redirect('community');
                }
                return redirect('community');
            }catch(Exception $e){

            }
        }
    }


    // Show a user's profile 
    // Public 
    public function showProfile($id){
        try{
            // Get the user
            $user = User::find($id);
            // If invalid ID display error page
            if(is_null($user)){
                return View('posts.error')->with('message',"The user wasn't found");
            }
          
            // Get the articles posted by the user
            $posts = Post::where('author_id',$id)->get();
            
            $canFollow = false;
            if(auth()->user() != null){
                // Check if the user can follow the user we are in his profile
                $already = DB::table('followings')->where('follower_id', auth()->user()->id)->where('following_id',$id)->get();
                $canFollow = true;
                if($already->count() != 0 || $id == auth()->user()->id){
                    $canFollow = false;
                }
            }
            // Get number of followings
            $noOfFollowings = DB::table('followings')->where('follower_id',$id)->get()->count();
            // Get number of followers
            $noOfFollowers = DB::table('followings')->where('following_id',$id)->get()->count();
        }catch(Exception $e){

        }

        // If invalid ID display error page
        if($user == null){
            return View('posts.error')->with('message',"The user wasn't found");
        }
        return View('community.profile')
            ->with('user',$user)
            ->with('posts',$posts)
            ->with('canFollow',$canFollow)
            ->with('noOfFollowings',$noOfFollowings)
            ->with('noOfFollowers',$noOfFollowers);
    }
}
