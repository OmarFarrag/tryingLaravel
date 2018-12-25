@extends('layouts.app')

@section('head')
    <style>
        .borderd{
            /*border: 1px solid black;*/
        }

        div img {
             width: 100%;
             height: 250px;
        }
        
        .category-card{
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            opacity: 1;
            transition: 0.3s;
            cursor:pointer;

        }

        .category-card:hover {
            opacity: 0.6;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        
        a{
            color:darkgrey;
        }
        a:hover{
            text-decoration: none;
            
        }
    </style>
@endsection

@section('body')
    <!-- The cover photo-->
    
   <div class="container py-4">
    <!-- Loop on categories and create card for each one -->
    @foreach ($categories as $category)
        <!-- Check if the category is first, fourth, eigth... as for each create new row-->
        @if($loop->index %3 == 0 && $loop->index != 0)
         </div >
        @endif
        @if($loop->index %3 == 0)
            <div class="row py-4 ">
        @endif
        
            <div class="col-md-4 px-0 category-card" >
               <a href="/post?category={{$category->name}}"> <img src="{{$category->img_url}}" />
               <h2 class="text-center my-2">{{$category->name}}</h2>
               </a>
            </div>

            

       
    @endforeach
   </div>
@endsection
