<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Post;
use App\models\Comment;
use PHPUnit\Framework\Constraint\Exception;
use App\models\Category;
use Illuminate\Support\Facades\Input;
//use TheSeer\Tokenizer\Exception;


class PostsController extends Controller
{
    static private  $dbErrorMsg = "Something went wrong!";
    static private $noSuchPostErrorMsg = "This post doesn't exist";

    public function __construct(){
        
        // Makes access to all routes in this controller needs authentication
        // excepts the except arguments
        $this->middleware('auth',['except'=>['index','show','search','recommend']]);
    }

    /*
    *   post?category={{}}
    */
    public function index()
    {
        // Get the category name from query string parameters
        $categoryName = Input::get('category');
        // If no category was provided redirect to TODO
        if($categoryName == null ){
            return view('posts.error')->with('message','No such category');
        }

        $posts = null;
        try{
            // Get all posts with that category
            $category = Category::where('name', $categoryName)->first();
            // If the category is not in the database
            // In case the url is entered manually
            if($category == null){
                return view('posts.error')->with('message','No such category');
            }
            // Important --- use the posts method without braces
            $posts = $category->posts;
        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }
            
        return view('posts.category')->with('posts',$posts)->with('categoryName',$categoryName);
    }

    /**
     * Creates a new post
     * post/create
     */
    public function create()
    {
        try{

        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Validate that all required fields are sent
        // This returns error messages that can be displayed
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        
        // Create the new post and save it to the database
        try{
            $post = new Post();
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }

        
        return redirect('post/create')->with('success','Post created');
    }

    /**
     * Displays a post
     * URL: post/{id}
     */
    public function show($id)
    {
        try{
            // Find the post
            $post = Post::find($id);
            // If the post not in the DB (manual url), throw exception
            if($post == null) {
                return view('posts.error')->with('message',"Post not found !"); 
            }
            $comments = $post->comment;

        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }
        
        return view('posts.view')->with('post',$post)->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * post/{id}/edit
     */
    public function edit($id)
    {
        $post;
        try{
            $post = Post::find($id);
        }catch(Exception $e){
            return view('posts.error')->with('message',$noSuchPostErrorMsg);
        }

        // Check the user is the post's author
        if(auth()->user()->id !== $post->author_id){
            return redirect('post/'.$post->id)->with('error',"You can't edit this post");
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate that all required fields are sent
        // This returns error messages that can be displayed
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        
        // Retrieve the post from the database, edit it, amnd save
        $post;
        try{
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            $post->save();
        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }

        
        return redirect('post/'.$id)->with('success','Post edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(){
        try{
            // Get the search key from the query string parameters
            $searchKey = Input::get('key');
            // Get posts with title containing the search key
            $posts = Post::where('title', 'LIKE', '%'.$searchKey.'%')->get();       
        }catch(Exception $e){
            return view('posts.error')->with('message',$dbErrorMsg);
        }
        return view('posts.search')->with('posts',$posts);
    }


    public function recommend($id){
        
        try{
            
            $post = Post::find($id);    
            
            // If no such post with that id
            if($post == null){
                response()->json(['success' => 'success'], 200);
            }

            $post->no_of_recomm += 1;
            $post->save();

        }catch(Exception $e){
            response()->json(['success' => 'success'], 200);
        }

        
        return response()->json(['ok' => 'ok']); // Return OK to user's browser
    }
}
