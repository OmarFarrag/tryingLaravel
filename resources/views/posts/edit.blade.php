@extends('layouts.app')

@section('body')
    {!! Form::open([
        'action' => ['PostsController@update',$post->id],
        'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="p-4">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title, ['placeholder'=>'Title'])}}
        </div>

        <div class="p-4">
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body, ['placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
        </div>

        <div class="form-group p-4">
            {{Form::file('image')}}
        </div>
        
        @include('includes.messages')
        <div class="p-4">
        {{Form::submit('Submit',['class' => 'btn btn-large btn-primary openbutton'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
    
@endsection