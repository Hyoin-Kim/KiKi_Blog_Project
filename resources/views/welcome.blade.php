<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>KiKi Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


        <!-- Style -->
        <style>
            html, body {
                background-color: #fff;
                color: #FF5733 ;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">

    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">

    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/mononoke047.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 350px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/mononoke031.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 350px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


            <div class="content">
                <div class="title m-b-md">
                    KiKi Blog
                </div>


                <div class="links">
                    <a href="{{ url('/board') }}">Write</a>
                    <a href="https://laracasts.com">Album</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://www.instagram.com">Instagram</a>
                    <a href="https://www.facebook.com">Facebook</a>
                    <a href="https://www.kakaocorp.com/service/KakaoTalk">KakaoTalk</a>
                    <a href="https://vapor.laravel.com">AddFriend</a>
                
                </div>
            </div>

        </div>

 <!--    <img src="mononoke035.jpg" height="50"> -->
    </body>
</html>
