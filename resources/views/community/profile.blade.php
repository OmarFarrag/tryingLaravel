@extends('layouts.app')

@section('head')
    <style>
        .card1 {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 300px;
                text-align: center;
                font-family: arial;
            }

            .right {
                position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
  margin:10px;
    
}
.container {
    border: 2px solid #ccc;
  background-color: #eee;
  border-radius: 5px;
  padding: 16px;
    margin: 15px;

}
    .container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}

.container span {
  font-size: 20px;
       margin: 15px;

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
                    <button class="btn btn-primary btn-block">Follow</button>
                    
                @endif    
            @endauth        
      </div>
      <div>
           

            <div class=" right">
                    <h2> Sponsored </h2>
                 <div  class="container">
                    <img src="homepage.JPG">
                    <p><span>Chris Fox.</span> CEO at Mighty Schools.</p>
                    <p>John Doe saved us from a web disaster.</p>
                 </div>
                 <div class="container">
                     <img src="homepage.JPG">
                     <p><span>Chris Fox.</span> CEO at Mighty Schools.</p>
                     <p>John Doe saved us from a web disaster.</p>
                 </div>
               </div>

          @if(count($posts)>0)
          <div class=" px-0 py-4">
               @foreach ($posts as $post)
               <div class="py-4">
               <div class="card" style="col-md-8" >
               <img class="card-img-top" src="{{$post->pic_url}}" alt="Card image" style="width:100%">
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
               <h2> No posts</h2>
          @endif

@endsection
