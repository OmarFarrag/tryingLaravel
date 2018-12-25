
<nav class="navbar navbar-expand-lg navbar-light bg-dark" >
        
            <a style="color:orange;" class="navbar-brand" href="/">
                Blogger
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                
                    @auth  
                        <li class="navbar-nav mr-auto" >
                                <a style="color:white;" class="nav-link" href="{{route('home')}}" >Home</a>
                        </li>
                    @endauth
                        
                    <li class="navbar-nav mr-auto">
                    <a style="color:white;"  class="nav-link" href="{{route('categories')}}">Categories</a>
                    </li>

                    <!-- Community button-->
                    @auth
                        <li class="navbar-nav mr-auto">
                            <a style="color:white;"  class="nav-link" href="{{route('community')}}">Community</a>
                        </li>
                    @endauth        

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Search bar -->
                    <li class="navbar-nav mr-auto">
                            @include('includes.searchbar')
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="{{ route('register') }}">Become a member</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a style="color:white;" class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                       
                    @else
                        <li class="nav-item dropdown">
                            <a style="color:white;"  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=" /community/{{auth()->user()->id}}"
                                        >
                                         Profile
                                      </a>

                                      <a class="dropdown-item" href=" /saved/{{auth()->user()->id}}"
                                        >
                                         Saved
                                      </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>

                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </nav>