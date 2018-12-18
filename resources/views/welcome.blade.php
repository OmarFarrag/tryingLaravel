@extends('layouts.app')

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
@endsection