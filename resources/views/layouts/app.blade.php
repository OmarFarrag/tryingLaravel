<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            padding: 10px;
            margin:10px;
                
        }
        .container {
            border: 2px solid #ccc;
            background-color: #eee;
            border-radius: 1px;
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

    @yield('head')

</head>
<body>
    <div id="app">
        @include('includes.navbar')
        <div class=" right">
                <h2> Sponsored </h2>
                <hr/>
             <div  class="container">
                <img src="{{url('images/user_no_image.png')}}">
                <p><span>Chris Fox.</span> CEO at Mighty Schools.</p>
                <p>John Doe saved us from a web disaster.</p>
             </div>
             <div class="container">
                 <img src="{{url('images/user_no_image.png')}}">
                 <p><span>Chris Fox.</span> CEO at Mighty Schools.</p>
                 <p>John Doe saved us from a web disaster.</p>
             </div>
           </div>
        <main >
            @yield('body')
        </main>
    </div>
</body>
</html>
