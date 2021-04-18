@extends('layouts.master')

@section('style')
<style type="text/css">
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
@endsection
@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="{{ url("/assets/majo050.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 470px">
                    </div>
                    <div class="carousel-item">
                      <img src="{{ url("/assets/majo014.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 470px">
                    </div>
                    <div class="carousel-item">
                       <img src="{{ url("/assets/majo008.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 470px">
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
        </div>
    </div>
</div>

<img src="{{ url("/assets/icon10.png") }}" alt="first" style="width:100px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon09.png") }}" alt="first" style="width:150px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon12.png") }}" alt="first" style="width:110px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon13.png") }}" alt="first" style="width:100px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon06.png") }}" alt="first" style="width:90px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon15.png") }}" alt="first" style="width:120px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon17.png") }}" alt="first" style="width:110px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon16.png") }}" alt="first" style="width:130px; height:80px;line-height: 0px;padding-left: 0px;">
<img src="{{ url("/assets/icon08.png") }}" alt="first" style="width:150px; height:80px;line-height: 0px;padding-left: 0px;">








    <!-- <div class="content">
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
    </div> -->
@endsection
