@extends('layouts.basic_template')

@section('body')
    {!! Form::open([
        'action' => 'PostsController@store',
        'method' => 'POST']) !!}

        <div>
            {{Form::label('title','Title')}}
            {{Form::text('title','', ['placeholder'=>'Title'])}}
        </div>

        <div>
            {{Form::label('body','Body')}}
            {{Form::textarea('body','', ['placeholder'=>'Body', 'id'=>'article-ckeditor'])}}
        </div>
        
        @include('includes.messages')
        
        {{Form::submit('Submit')}}
    {!! Form::close() !!}
    
@endsection