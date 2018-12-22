@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script type="text/javascript">

        // Called when recommend button is clicked 
        // Fires a get request 
        function recommend(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                // When call completes with Ok, increase the number of recommendations
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('noOfRecomm').innerText = Number.parseInt(document.getElementById('noOfRecomm').innerText) + 1;
                }
            };
            xhttp.open("GET", '/post/'+{{$post->id}}+'/recommend', true);
            xhttp.send();
        } 
        

        
        
    </script>    
   
@endsection



@section('body')
    <img src="/storage/posts_images/{{$post->pic_url}}" class="img-responsive" alt="Cinque Terre"> 
    <h1>{{$post->title}}</h1>
   
    <div> {!!$post->body!!}</div>
    <br/>
    <div id='noOfRecomm'>{{$post->no_of_recomm}}</div>
    <br/>

    <!-- comments section-->
    @foreach ($comments as $comment)
        {{$comment->commenter->name}}
        <br/>
        {{explode(' ',$comment->created_at)[0]}}
        <br/>
        body: {{$comment->body}}
        <br/>

    @endforeach

    <!-- Recommend button-->
    <button onclick="recommend();">
        recommend
    </button>
    <a  href="https://www.facebook.com/sharer/sharer.php?u=http://blogger.dev/post/{{$post->id}}">share</a>
            
    </a>
    
        
    
    @auth
        <!-- only post author can edit it-->
        @if(Auth::user()->id == $post->author_id)
            <a href="/post/{{$post->id}}/edit">edit</a>
        @endif

        <!-- Add Comment Field -->
        
            <br>
            {!! Form::open([
                'action' => ['PostsController@addComment',$post->id],
                'method' => 'POST']) !!}
        
               
                <div>
                   
                    {{Form::textarea('comment','', ['placeholder'=>'AddComment', 'id'=>'comment'])}}
                </div>

                {{Form::submit('Submit')}}
                
            {!! Form::close() !!}

    @endauth
    
@endsection