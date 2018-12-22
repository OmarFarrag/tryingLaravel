@extends('layouts.app')

@section('body')
    {!! Form::open([
        'action' => ['PostsController@update',$post->id],
        'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div>
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title, ['placeholder'=>'Title'])}}
        </div>

        <div>
            {{Form::label('body','Body')}}
            {{Form::textarea('body',$post->body, ['placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
        </div>

        <div class="form-group">
            {{Form::file('image')}}
        </div>
        
        @include('includes.messages')
        
        {{Form::submit('Submit')}}
        {{Form::hidden('_method','PUT')}}
    {!! Form::close() !!}
    
@endsection