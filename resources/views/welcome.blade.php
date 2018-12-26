{{-- @extends('layouts.app')

@section('head')
    <style>
         body,html {
         height: 100%;
         margin: 0;
        }
        .bg_image{
            background-image: url('images/bg2.png');
            
            /* Full height */
            height: 100%; 
            
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover
        }

        .welcome-txt{
            color: aliceblue;
            font-size: 100px;
        }
    </style>
@endsection

@section('body') 
    <body class="bg_image">
        <p class="py-5 text-center welcome-txt">Share your story Now</p>
    </body>
@endsection --}}

@extends('layouts.app')

@section('head')
<style>
body {
        
        background-image: url('images/homepage.jpg');
        background-size:cover;background-repeat: no-repeat;
        }
    
    
span.psw {
float: right;
padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */

span.psw {
display: block;
float: none;
}
 </style>

    
@endsection


@section('body')
    

<body>

  
      <h1 style="color:black;float:right;margin-right: 20px;margin-top:400px;font-size:40px;font-family:times new roman;font-style:italic"> 
           Share Your Story
       </h1>    

</body>

@endsection