<?php
    if(Auth::check())
    {
        $user = \App\User::leftjoin('assets',function($q){
                $q->on('assets.id','=','users.asset_id')
                    ->on('assets.deleted',DB::raw(0));
                })
                ->select(
                    'users.*'
                    ,'assets.file_name as asset_file_name'
                    ,'assets.id as asset_id'
                    ,'assets.file_extension as asset_file_extension'
                )
                ->find(Auth::user()->id);
    }
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ url('/assets/bootstrap.min') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/libs/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('/libs/jquery-confirm/jquery-confirm.min.css') }}" type="text/css" />

    @yield('style')
    <style type="text/css">

    .navbar .navbar-brand {
        font-family: 'Lobster', cursive;
        font-size: 2.5rem;
            }
    .main-category a, .main-category a:hover
    {
        text-decoration: none !important;
    }
    .sub-category a:hover{
        text-decoration: none !important;
        color: #92bdff;
    }
    li.active .main-category a, li.active .main-category a:hover
    {
        color: #609FFF;
    }
    .nav-catergories:hover li.active .sub-category, .nav-catergories:hover li .cateogry-name
    {
        display: contents;
    }
    .sub-category, .cateogry-name{
        display: none;
    }
    .main-category{
        text-align: left;
        text-align: left;
        padding: 45px 25px;
        padding-bottom:10px;
    }
    .main-category a{
        color:#000000!important
    }   
    
    .navbar-nav{
        color : #000000;
        margin-right:20px;

    }      

        /*.bg-dark.navbar, .bg-dark.side-navbar{background-color: #243140 !important; border-color: #243140 !important; }
        .nav-link.active .nav-text{color: white; }
        .side-navbar li.active > a > .nav-text{ color: white; }
        .navbar-dark .navbar-nav .nav-link, .nav-text, .nav-icon {color: var(--nav-color); }
        .sidenav .nav li.active > a { background-color: var(--msx-blue-color); }*/

        /*.dropdown-menu{ background-color: var(--msx-dropdown-background-color); }*/

/*        .sidenav .nav li li a { padding-left: 3.5rem }*/
        


        /*.page-container{ width: 100% !important; max-width: unset !important; margin-top: 55px; height: calc(100% - 55px); overflow-y: scroll; padding: 15px; position: relative;}
        .side-navbar{ font-size: 0.8rem; }
        .sidenav .nav-icon, .sidenav a{ color: white; }
*/

       /* a.btn.btn-primary{
            color: #fff;
            background-color: #158CBA;
        }*/

/*        #aside{
          height: 100%;
          width: 0;
          position: fixed;          
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;          
          padding-top: 60px;
          transition: 0.5s;
        }*/


    </style>
</head>
<body>
    <div id="app">
        <div class="content-catergory" style="height: 100vh; width: 70px; position: fixed;" >
            <div class="msx-logo" style="height: 80px; line-height: 90px; text-align: left; padding-left: 10px;">
                <a href="/">
                <img src="{{ url("/assets/icon03.png") }}" alt="first" style="width:55px; height:60px;line-height: 0px;padding-left: 0px;">
                </svg>
                </a>
            </div>
            <div class="nav-catergories">
                @include('layouts.side_menu')
            </div>
        </div>
        <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="width:calc(100% - 70px);margin-left:70px;">
            <div class="container" style="margin-left: 20px;margin-right: 20px;padding-right: 15px;min-width: calc(100% - 70px)!important;">
                <a class="navbar-brand" href="{{ url('/blog') }}" style="font-size: 30px;color:#FF5733" >
                    <img src="{{ url("/assets/icon01.png") }}" alt="first" style="display:inline-block;width:100px; height:70px">
                    {{ config('app.name', 'KiKi Blog') }}
                </a>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
           
          


                    


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                         
                        @guest
                         <img src="{{ url("/assets/icon07.png") }}" alt="first" style="display:inline-block;width:170px; height:70px;margin-right: 40px">


                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"style="font-size:18px">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"style="font-size:18px">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li><a href="#" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Home</a></li>
                    <li><a href="{{ url('/board') }}" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Board</a></li>
                    <li><a href="{{ url('/blog/album') }}" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Album</a></li>
                    <li><a href="{{ url('/blog/friend') }}" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Friends</a></li>
                    <li><a href="https://www.instagram.com" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Instagram</a></li>
                      <li><a href="https://www.facebook.com" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Facebook</a></li>
                    
                </ul>
            </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 <img src="{{ url("/assets/icon07.png") }}" alt="first" style="display:inline-block;width:170px; height:70px;margin-right: 40px">

                        <li class="nav-item">
                            <a href="{{ url('/blog/messages') }}"><i class="far fa-comment-dots"  title="message"style="font-size: 25px; margin-right:5px;"></i></a>
                             <a href="{{ url('/blog/news') }}"><i class="far fa-bell" title="alarm"style="font-size: 25px; margin-right:5px;"></i></a>


                             <a class="media-left" href="#"><img class="img-circle img-sm" style="width: 40px; height:40px" alt="Profile Picture" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif ></a>
                            </li> 

                            
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                

                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/blog/mypage') }}">
                                        {{ __('마이페이지') }}
                                    </a>
                                     <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('로그아웃') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>

        <div class="py-4" style="width:calc(100% - 70px); margin-left:70px;">
            @yield('content')
        </div>
    </div>

    
<script type="text/javascript" src="{{ url("/libs/jquery/dist/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-blockui/jquery.blockUI.js') }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-dateformat/jquery-dateformat.js') }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url("/libs/jquery-confirm/jquery-confirm.min.js") }}"></script>
@include('layouts.util')
<script type="text/javascript">
</script>
@yield('script')
</body>
</html>
