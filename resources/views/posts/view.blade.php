@extends('layouts.app')

@section('head')
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
    <img src="cinqueterre.jpg" class="img-responsive" alt="Cinque Terre"> 
    <h1>{{$post->title}}</h1>
   
    <div> {!!$post->body!!}</div>
    <br/>
    <div id='noOfRecomm'>{{$post->no_of_recomm}}</div>
    <br/>
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
        
    
    @auth
        <!-- only post author can edit it-->
        @if(Auth::user()->id == $post->author_id)
            <a href="/post/{{$post->id}}/edit">edit</a>
        @endif
    @endauth
    
@endsection