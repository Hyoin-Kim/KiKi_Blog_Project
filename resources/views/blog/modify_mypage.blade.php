@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ url("/css/profile.css") }}" type="text/css" />

@endsection
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" data-id={{ $user->id }}>
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
        </li>
      </ul>

      <div class="tab-content no-border padding-24">
        <div id="home" class="tab-pane in active">
          <div class="row">
            <div class="col-xs-12 col-sm-3 center">
              <span class="profile-picture">
                <img class="editable img-responsive" id="avatar2" name="avatar2" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 130px; height: 130px">
              </span>
                        
              <div class="space space-4"></div>
              <input id="upload" type="file" class="form-control border-0" style="display:none;" onchange="loadPreviewImage(this,'avatar2');">
              <label id="upload-label" class="font-weight-light text-muted"></label>
              <a href="#" class="btn btn-sm btn-block btn-primary">
               <label for="upload"><i class="fas fa-portrait"></i>
                <span class="bigger-110">Change my selfie</span></label>
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
                  <input type="text" id="user-has-name" class="form-control" minlength="25" value={{ $user->name}}>
                  <div class="profile-info-value">
                    <span></span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Id </div>
                  <input type="text" id="user-has-id" class="form-control" minlength="25" value={{ $user->user_id}}>


                  <div class="profile-info-value">
                    <span></span>
                  </div>
                </div>                                 

                <div class="profile-info-row">
                  <div class="profile-info-name"> E-mail </div>
                     <input type="email" id="user-has-email" class="form-control" minlength="25" value={{$user->email}}>
                  <div class="profile-info-value">
                    <span></span>
                  </div>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Age </div>
                  <input type="text" id="user-has-age" class="form-control" minlength="25" value={{$user->age}}>
                  <div class="profile-info-value">
                    <span></span>
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


        <a href="#" class="btn btn-sm btn-block btn-warning"  onclick= "updateProfile(this)">
              <i class="far fa-share-square"></i>
              <span class="bigger-110">save</span></a>
        </a>  


      </div>
    </div>
  </div>
  </div>

@endsection
@section('script')
<script type = "text/javascript">

  function updateProfile(elem)
  {
    var asset_id = uploadPhoto('#upload','/upload/upload-photo','user');

    var user_name = $("#user-has-name").val();
    var user_id = $("#user-has-id").val();
    var user_email = $("#user-has-email").val();
    var user_age = $("#user-has-age").val();

    var ajax_data = {
      'user_id' : user_id,
      'user_name' : user_name,
      'user_email' : user_email,
      'user_age' : user_age,
      'asset_id' : asset_id

    }
    blog_ajax("put","/blog/update-profile",ajax_data,function(resp){
      var result = confirm("프로필이 수정되었습니다.");
      if(result)
      { 
        window.location.href = '{{ env("URL_BLOG")."/blog/mypage" }}';
      }



    });
  }



</script>
@endsection

