@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ url("/css/profile.css") }}" type="text/css" />

@endsection
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div id="user-profile-2" class="user-profile">
    <div class="tabbable">
      <ul class="nav nav-tabs padding-18">
        <li class="active">
          <a data-toggle="tab" href="#home">
            <i class="green ace-icon fa fa-user bigger-120"></i>
            Profile
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#friends">
            <i class="blue ace-icon fa fa-users bigger-120"></i>
            Friends
          </a>
        </li>
      </ul>

      <div class="tab-content no-border padding-24">
        <div id="home" class="tab-pane in active">
          <div class="row">
            <div class="col-xs-12 col-sm-3 center">
              <span class="profile-picture">
                <img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 130px; height: 130px">
              </span>



                        
              <div class="space space-4"></div>
              <input id="upload" type="file" class="form-control border-0" style="display:none;">
              <label id="upload-label" class="font-weight-light text-muted"></label>

              <a href="{{ url('/blog/modify_mypage') }}" class="btn btn-sm btn-block btn-success">
                <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                <span class="bigger-110">Modify my profile</span></a>
              </a>
            



            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-9">
              <h4 class="blue">
                <span class="middle">{{ $user->name }}</span>

                <span class="label label-purple arrowed-in-right">
                  <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                  online
                </span>
              </h4>

              <div class="profile-user-info">
                <div class="profile-info-row">
                  <div class="profile-info-name"> Name </div>

                  <div class="profile-info-value">
                    <span>{{ $user->name}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Id </div>

                  <div class="profile-info-value">
                    <span>{{ $user->user_id}}</span>
                  </div>
                </div>                                 

                <div class="profile-info-row">
                  <div class="profile-info-name"> E-mail </div>

                  <div class="profile-info-value">
                    <span>{{$user->email}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Age </div>

                  <div class="profile-info-value">
                    <span>{{$user->age}}</span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Joined </div>

                  <div class="profile-info-value">
                    <span>{{$user->created_at}}</span>
                  </div>
                </div>
              </div>

              <div class="hr hr-8 dotted"></div>

              <div class="profile-user-info">
                <div class="profile-info-row">
                  <div class="profile-info-name"> Website </div>

                  <div class="profile-info-value">
                    <a href="#" target="_blank">www.alexdoe.com</a>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">
                    <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                  </div>

                  <div class="profile-info-value">
                    <a href="#">Find me on Facebook</a>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name">
                    <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                  </div>

                  <div class="profile-info-value">
                    <a href="#">Follow me on Twitter</a>
                  </div>
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="space-20"></div>

        </div><!-- /#home -->

        <div id="friends" class="tab-pane">
          <div class="profile-users clearfix">
            <div class="itemdiv memberdiv">
              <div class="inline pos-rel">
                <div class="user">
                  <a href="#">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Bob Doe's avatar">
                  </a>
                </div>

                <div class="body">
                  <div class="name">
                    <a href="#">
                      <span class="user-status status-online"></span>
                      Bob Doe
                    </a>
                  </div>
                </div>

                <div class="popover">
                  <div class="arrow"></div>

                  <div class="popover-content">
                    <div class="bolder">Content Editor</div>

                    <div class="time">
                      <i class="ace-icon fa fa-clock-o middle bigger-120 orange"></i>
                      <span class="green"> 20 mins ago </span>
                    </div>

                    <div class="hr dotted hr-8"></div>

                    <div class="tools action-buttons">
                      <a href="#">
                        <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                      </a>

                      <a href="#">
                        <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                      </a>

                      <a href="#">
                        <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="itemdiv memberdiv">
              <div class="inline pos-rel">
                <div class="user">
                  <a href="#">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Rose Doe's avatar">
                  </a>
                </div>

                <div class="body">
                  <div class="name">
                    <a href="#">
                      <span class="user-status status-offline"></span>
                      Rose Doe
                    </a>
                  </div>
                </div>

                <div class="popover">
                  <div class="arrow"></div>

                  <div class="popover-content">
                    <div class="bolder">Graphic Designer</div>

                    <div class="time">
                      <i class="ace-icon fa fa-clock-o middle bigger-120 grey"></i>
                      <span class="grey"> 30 min ago </span>
                    </div>

                    <div class="hr dotted hr-8"></div>

                    <div class="tools action-buttons">
                      <a href="#">
                        <i class="ace-icon fa fa-facebook-square blue bigger-150"></i>
                      </a>

                      <a href="#">
                        <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                      </a>

                      <a href="#">
                        <i class="ace-icon fa fa-google-plus-square red bigger-150"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          <div class="hr hr10 hr-double"></div>

          <ul class="pager pull-right">
            <li class="previous disabled">
              <a href="#">← Prev</a>
            </li>

            <li class="next">
              <a href="#">Next →</a>
            </li>
          </ul>
        </div><!-- /#friends -->
      </div>
    </div>
  </div>
  </div>

@endsection

