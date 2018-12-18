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
   @if ($posts==null || count($posts)==0)
    <h1>Didn't find anything !</h1>
   @else
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
   @endif
@endsection
