@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header btn btn-warning">{{ __('Dashboard') }}</div>
                                               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/mononoke007.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 350px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/mononoke031.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 350px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/mononoke035.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 350px">
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

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('로그인에 성공하였습니다.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
