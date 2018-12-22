<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use Symfony\Component\Console\Input\Input;

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
}
