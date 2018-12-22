@extends('layouts.app')

@section('body')
    {!! Form::open([
        'action' => 'PostsController@store',
        'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

        <div>
            {{Form::label('title','Title')}}
            {{Form::text('title','', ['placeholder'=>'Title'])}}
        </div>

        <div>
            {{ Form::select('category', $categories, null) }}
           
        </div>
        <div class="form-group">
            {{Form::file('image')}}
        </div>
        <div>
            {{Form::label('body','Body')}}
            {{Form::textarea('body','', ['placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
        </div>
        
        @include('includes.messages')
        
        {{Form::submit('Submit')}}
    {!! Form::close() !!}
    
@endsection