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
   
    <style>
        .title{
            font-weight: bold;
        } 

        .post-body { 
            font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
            font-size: 24px;
            font-style: normal;
            font-variant: normal;
            font-weight: 100;
            line-height: 26.4px; 
            }
        
        .fa {
            font-size: 20px;
            cursor: pointer;
            user-select: none;
        }

.fa:hover {
  color: darkblue;
}

a:hover {
  text-decoration: none;
  color: black;
}
       
    </style>
@endsection



@section('body')
    
    <div class="container">
            <div class="row py-4">
                    <div class="col-md-2">
                            <img src="{{url('images/user_no_image.png')}}" class="img-responsive" alt="Cinque Terre">
                    </div>
                    <h2 class="col-md-4" style="margin-top:30px;"><a href="/community/{{$author->id}}">{{$author->name}}</a><br><small>{{explode(' ',$post->created_at)[0]}}</small></h2>
                    
                </div>
                
        <div class="row">
            <div class="col-md-1">
                    <img src="/storage/posts_images/{{$post->pic_url}}" class="img-responsive" alt="Cinque Terre">
            </div>
        </div>
    
    
        <h1 class="title">{{$post->title}}</h1>
        <br>
        
    <div class="post-body"> {!!$post->body!!}</div>
    <br/>
    <!-- Recommend button-->
    <i onclick="recommend();" class="fa fa-thumbs-up"></i>
    <!-- No of likes -->
    <h  id='noOfRecomm' >{{$post->no_of_recomm}}</h> likes
    <!-- share button-->
    <a  href="https://www.facebook.com/sharer/sharer.php?u=http://blogger.dev/post/{{$post->id}}">share</a>      
    </a>
    
        
    
    @auth
        <!-- only post author can edit it-->
        @if(Auth::user()->id == $post->author_id)
            <a href="/post/{{$post->id}}/edit">edit</a>
            
        @endif

        <!-- Add Comment Field -->
        <br>
            <br>
            {!! Form::open([
                'action' => ['PostsController@addComment',$post->id],
                'method' => 'POST']) !!}
        
               
                
                  <div class="row"> 
                    {{Form::textarea('comment','', ['placeholder'=>' Add comment', 'id'=>'comment','style'=>'height:50px;width:700px;margin-left:15px;'])}}
               
               
                {{Form::submit('Submit',['class'=>'btn btn-large btn-primary openbutton','style'=>'height:50px;margin-left:20px;'])}}
                  </div>
            {!! Form::close() !!}

    @endauth
    
                  <br/><br/>

     <!-- comments section-->
     @foreach ($comments as $comment)

     <hr>
     <h5>{{$comment->commenter->name}}</h5>
     
     <small>{{explode(' ',$comment->created_at)[0]}}</small>
     <br/>
     <p>{{$comment->body}}</p>
    
     
    
     
 @endforeach

    </div>
@endsection