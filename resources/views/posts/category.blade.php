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
        @include('includes.sidebar')
        
        <h1 class="p-4">{{$categoryName}} <span class="label label-default"></span></h1>
        @if(count($posts)>0)
        <div class=" px-5">
            @foreach ($posts as $post)
            <div class="row p-4">
                    <a href="post/{{$post->id}}" >   
                <img class="left-side-pic" src="/storage/posts_images/{{$post->pic_url}}" />
                    </a>
                    <div class="col-md-6">
                            <a style="font-weight: bold;" href="post/{{$post->id}}">  {{$post->title}} </a><br>
                            <a href="post/{{$post->id}}">  {{substr($post->body,0,300)."...."}} </a>
                    </div>
                </div>
            
            @endforeach
            
        </div>
        <!-- else -->
        @else
            <h2 class="p-4"> No posts</h2>
        @endif
@endsection
