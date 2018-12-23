@extends('layouts.app')

@section('head')
<style>
        .left-side-pic{
            width: 150px !important;
            height: 100px;
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
    
        @if(count($posts)>0)
        <div class=" px-5">
            @foreach ($posts as $post)
            <div class="row p-4">
                    <a href="post/{{$post->id}}" >   
                <img class="left-side-pic" src="{{$post->pic_url}}" />
                    </a>
                    <div class="col-md-6">
                            <a  href="post/{{$post->id}}">  {{$post->title}} </a><br>
                            <a href="post/{{$post->id}}" ><small> {{$post->name}}</small> </a><br>
                            <a href="post/{{$post->id}}">  {{substr($post->body,0,230)."...."}} </a>
                    </div>
                </div>
            
            @endforeach
            
        </div>
        <!-- else -->
        @else
            <h2> No posts</h2>
        @endif
    
@endsection
