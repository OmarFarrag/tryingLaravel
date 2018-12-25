@extends('layouts.app')

@section('head')
    <script type="text/javascript">
        // Called when follow button is clicked 
        // Fires a get request 
        function follow(id){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(id).remove();
                    }
            
            };
            xhttp.open("GET", '/follow/'+id, true);
            xhttp.send();
        } 
    </script>
    <style>
        .card1 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                text-align: center;
                font-family: arial;
            }



        .split {
            height: 80%;
            
            z-index: 1;
            top: 0;
            overflow-x: hidden;
            padding-top: 20px;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
        }

        .left {
            left: 0;
            width:50%; 
            
        }
    </style>
@endsection

@section('body')
        

<div class="split left ">
        <div class="card1 "> 
                <img src="{{url('images/user_no_image.png')}}">
            <h3>{{$user->name}}</h3> 
            <br>

            <!-- Following/Followers section -->
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Following</th>
                        <th scope="col">Followers</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$noOfFollowings}}</td>
                        <td>{{$noOfFollowers}}</td>                        
                      </tr>
                     
                    </tbody>
            </table>

            <!-- Display follow button for logged in users-->
            @auth
                <!-- Check if the user can follow this author-->
                @if ($canFollow)
                    <button id="{{$user->id}}" class="btn btn-primary btn-block" onClick="follow({{$user->id}});">Follow</button>
                    
                @endif    
            @endauth        
      </div>
      <div>
           

          @auth
          @if (auth()->user()->id == $user->id)
              
          
          <a href="/post/create"><button id="{{$user->id}}" class="btn btn-primary " >Add post</button>   </a>
          @endif
          @endauth
           
          @if(count($posts)>0)
          <div class=" px-0 py-4">
               @foreach ($posts as $post)
               <div class="py-4">
               <div class="card" style="col-md-8" >
               <img class="card-img-top" src="/storage/posts_images/{{$post->pic_url}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">{{$post->title}}</h4>
                      <p class="card-text">{{substr($post->body,0,100)."..."}}</p>
                    <a href="/post/{{$post->id}}" class="btn btn-primary">View</a>
                    </div>
                  </div>
      
                </div>
               @endforeach
            </div> 
              
          
           <!-- else -->
          @else
               <h2 class="py-4"> No posts</h2>
          @endif

@endsection
