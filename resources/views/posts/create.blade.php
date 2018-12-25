@extends('layouts.app')

@section('body')
    @include('includes.sidebar')
    {!! Form::open([
        'action' => 'PostsController@store',
        'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div class="p-4">
            {{Form::text('title','', ['placeholder'=>'Title','maxlength' => '50'])}}
        </div>

        <div class="p-4">
            {{Form::label('category','Category')}}
            {{ Form::select('category', $categories, null) }}
           
        </div>
        <div class="form-group p-4">
            {{Form::file('image')}}
        </div>
        <div class="p-4">
            
            {{Form::textarea('body','', ['placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
        </div>
        
        @include('includes.messages')
        <div class="p-4">
        {{Form::submit('Submit',['class' => 'btn btn-large btn-primary openbutton '])}}
       </div>
    {!! Form::close() !!}
    
@endsection