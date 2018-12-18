<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use Nexmo\Client\Exception\Exception;

class CategoriesController extends Controller
{
    
    /**
     * Show all categories
     *
     * @return \Illuminate\Http\Response -- the categories view
     */ 
    public function showCategories(){
        
        // Retrieve the categories from the database
        $category;
        try{
            $category = Category::all();
        }catch(Exception $e){
            return view('posts.error')->with('message','Something went wrong');
        }
        
        // Pass the categories to the view to render based on them and return the view 
        return view('categories')->with('categories',$category);
   
    }

   
}
