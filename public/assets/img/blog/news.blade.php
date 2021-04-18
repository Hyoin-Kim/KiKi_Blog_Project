@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ url("/css/profile.css") }}" type="text/css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header btn btn-warning">{{ __('알람') }}
                     <a href="#S"target="_blank"><i class="fas fa-user-plus" style="font-size: 20px"></a></i></div>
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/mimi024.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/mimi014.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/mimi037.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 450px">
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

                    {{ __('소식이 없습니다.') }}

                            <div id="feed" class="tab-pane">
          <div class="profile-feed row">
            <div class="col-sm-6">
              <div class="profile-activity clearfix">
                <div>
                  <img class="pull-left" alt="Alex Doe's avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                  <a class="user" href="#"> Alex Doe </a>
                  changed his profile photo.
                  <a href="#">Take a look</a>

                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    an hour ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <img class="pull-left" alt="Susan Smith's avatar" src="https://bootdey.com/img/Content/avatar/avatar2.png">
                  <a class="user" href="#"> Susan Smith </a>

                  is now friends with Alex Doe.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    2 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>
                  joined
                  <a href="#">Country Music</a>

                  group.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    5 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>
                  uploaded a new photo.
                  <a href="#">Take a look</a>

                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    5 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <img class="pull-left" alt="David Palms's avatar" src="https://bootdey.com/img/Content/avatar/avatar3.png">
                  <a class="user" href="#"> David Palms </a>

                  left a comment on Alex's wall.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    8 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>
            </div><!-- /.col -->

            <div class="col-sm-6">
              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>
                  published a new blog post.
                  <a href="#">Read now</a>

                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    11 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <img class="pull-left" alt="Alex Doe's avatar" src="https://bootdey.com/img/Content/avatar/avatar4.png">
                  <a class="user" href="#"> Alex Doe </a>

                  upgraded his skills.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    12 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>

                  logged in.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    12 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>

                  logged out.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    16 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>

              <div class="profile-activity clearfix">
                <div>
                  <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                  <a class="user" href="#"> Alex Doe </a>

                  logged in.
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    16 hours ago
                  </div>
                </div>

                <div class="tools action-buttons">
                  <a href="#" class="blue">
                    <i class="ace-icon fa fa-pencil bigger-125"></i>
                  </a>

                  <a href="#" class="red">
                    <i class="ace-icon fa fa-times bigger-125"></i>
                  </a>
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="space-12"></div>

          <div class="center">
            <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
              <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
              <span class="bigger-110">View more activities</span>

              <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
            </button>
          </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

