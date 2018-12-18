@extends('layouts.app')

@section('head')
    <style>
       .left-side-pic{
           width: 100px !important;
           height: auto;
       }

       a {
            color: black;
            text-decoration: none; /* no underline */
        }

        a:hover{
            text-decoration: none;
            color: black;
        }
    </style>
@endsection

@section('body')
   <h1>{{$categoryName}}</h1>
   <!-- If there are posts display them-->
   @if(count($posts)>0)
   <div class=" px-0">
        @foreach ($posts as $post)
         <div class="row p-4">
                <a href="post/{{$post->id}}" >   
            <img class="left-side-pic" src="{{$post->pic_url}}" />
                </a>
                <div class="col-md-6">
                        <a href="post/{{$post->id}}">  {{$post->title}} </a>
                </div>
            </div>
       
        @endforeach
       
   </div>
    <!-- else -->
   @else
        <h2> No posts</h2>
   @endif
@endsection
