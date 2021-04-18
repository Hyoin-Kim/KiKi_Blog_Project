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
                     <a href="#S"target="_blank"></a></div>
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/laputa038.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/laputa007.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/laputa047.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 450px">
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

                           {{ __('소식이 없습니다.') }}
                            {{ session('status') }}
                        </div>
                    @endif

                   

        <div id="feed" class="tab-pane">
          <div class="profile-feed row">
            <div class="col-sm-6">
              @foreach($request_friends as $request_friend)
              <div class="profile-activity clearfix" id="profile-timeline"data-id="{{$request_friend->id}}">
                <div>                 
                  <img class="img-circle img-sm" style="width: 40px; height:40px" alt="Profile Picture" @if($request_friend->asset_id != 0) src="{{url('/assets/img/profile/'.$request_friend->asset_file_name.'.'.$request_friend->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
                  <a class="user" href="#" id="profile-addfriend"data-id="{{$request_friend->user_id}}"> {{$request_friend->user_name}} </a>
                  님에게서 친구신청이 왔습니다.
                  <a href="#">수락하시겠습니까?</a>


                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    an hour ago

                  </div>
                </div>
                <div class="tools action-buttons">
                    <a  class="btn btn-success fas fa-user-check" ref="#" title="AddFriend" onclick="completefriend(this)"></a>
                    <a  class="btn btn-danger   fas fa-trash-alt" href="#" title="Delete" onclick="refusefriend(this)"></a>
                </div>
              </div>
              @endforeach


              @foreach($messages as $message)
              <div class="profile-activity clearfix" id= "profile-message" data-id="{{$message->id}}">
                <div>
                  <img class="img-circle img-sm" style="width: 40px; height:40px" alt="Profile Picture" @if($message->asset_id != 0) src="{{url('/assets/img/profile/'.$message->asset_file_name.'.'.$message->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
                  <a class="user" href="#">{{$message->user_name}} </a>

                  님에게서 메세지가 도착하였습니다.
                   <div><a class="user" href="#" style="margin-left: 130px;font-size: 16px" ><p>{{$message->message_content}}</p></a></div>
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    2 hours ago
                  </div>
                </div>
                <div class="tools action-buttons">
                  <a href="#" class="blue">
              
                    <a  href="{{ url('/blog/messages') }}"class="btn btn-success fas fa-envelope-open-text" ref="#" title="Message"></a>
                   
                  </a>
                  <a href="#" class="red">
                     <a  class="btn btn-danger   fas fa-trash-alt" href="#" title="Delete" onclick="deletemessage(this)"></a>
                  </a>
                </div>
              </div>
              @endforeach


             @foreach($comments as $comment)
              <div class="profile-activity clearfix" id= "profile-message" data-id="{{$comment->id}}">
                <div>
                  <img class="img-circle img-sm" style="width: 40px; height:40px" alt="Profile Picture" @if($comment->asset_id != 0) src="{{url('/assets/img/profile/'.$comment->asset_file_name.'.'.$comment->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
                  <a class="user" href="#">{{$comment->friend_name}} </a>

                  님에게서 회원님의 게시물에 댓글이 달렸습니다.
                   <div><a class="user" href="#" style="margin-left: 130px;font-size: 16px" ><p>{{$comment->user_comment}}</p></a></div>
                  <div class="time">
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    2 hours ago
                  </div>
                </div>
                <div class="tools action-buttons">
                  <a href="#" class="blue">
              
                    <a  href="{{ url('/blog/album') }}" class="btn btn-success far fa-comments" ref="#" title="Message"></a>
                   
                  </a>
                  <a href="#" class="red">
                     <a  class="btn btn-danger   fas fa-trash-alt" href="#" title="Delete" onclick="deleteNewsComment(this)"></a>
                  </a>
                </div>
              </div>
              @endforeach 
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="space-12"></div>

        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">

  function completefriend(elem){
    var request_id=$(elem).parents("#profile-timeline").attr('data-id');
    var friend_id=$(elem).parents("#profile-timeline").find("#profile-addfriend").attr('data-id');
    console.log("data-id",request_id);
    console.log("data-id2",friend_id);


    var ajax_data={
      'request_id' : request_id,
      'friend_id' : friend_id
    }

    blog_ajax("post","/blog/completefriend",ajax_data,function(resp){
      alert("친구요청이 수락되었습니다. 친구들의 게시물을 확인해보세요!");
      $(elem).parents("#profile-timeline").hide();


    });
  }

  function refusefriend(elem){

    var friend_id=$(elem).parents("#profile-timeline").attr('data-id');

    var ajax_data={
      'friend_id' : friend_id
    }

    blog_ajax("post","/blog/refusefriend",ajax_data,function(resp){
      alert("친구요청을 거절하였습니다.");
      $(elem).parents("#profile-timeline").hide();

    });

  }

  function deletemessage(elem){
    var message_id=$(elem).parents("#profile-message").attr('data-id');

    var ajax_data={
      'message_id' : message_id
    }

    blog_ajax("put","/blog/deleteNewsMessage",ajax_data,function(resp){
      alert("알림창에서 삭제되었습니다.");

    });
  }

    function deleteNewsComment(elem){
    var message_id=$(elem).parents("#profile-message").attr('data-id');

    var ajax_data={
      'message_id' : message_id
    }

    blog_ajax("put","/blog/deleteNewsMessage",ajax_data,function(resp){
      alert("알림창에서 삭제되었습니다.");

    });
  }




</script>
@endsection

