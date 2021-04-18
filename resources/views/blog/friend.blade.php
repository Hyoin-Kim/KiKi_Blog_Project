@extends('layouts.master')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<style type="text/css">
  body{
    background:#eee;
}
.avatar.avatar-xl {
    width: 5rem;
    height: 5rem;
}
.avatar {
    width: 2rem;
    height: 2rem;
    line-height: 2rem;
    border-radius: 50%;
    display: inline-block;
    background: #ced4da no-repeat center/cover;
    position: relative;
    text-align: center;
    color: #868e96;
    font-weight: 600;
    vertical-align: bottom;
}
.card {
    background-color: #fff;
    border: 0 solid #eee;
    border-radius: 0;
}
.card {
    margin-bottom: 30px;
    -webkit-box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
    box-shadow: 2px 2px 2px rgba(0,0,0,0.1), -1px 0 2px rgba(0,0,0,0.05);
}
.card-body {
    padding: 1.25rem;
}
.tile-link {
    position: absolute;
    cursor: pointer;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    z-index: 30;
}

body {
    background-color: #f0f6ff;
    color: #28384d;

}
/*social */
.card-one {
    position: relative;
    width: 300px;
    background: #fff;
    box-shadow: 0 10px 7px -5px rgba(0, 0, 0, 0.4);
}
.card {
    margin-bottom: 35px;
    box-shadow: 0 10px 20px 0 rgba(26, 44, 57, 0.14);
    border: none;
}

.follower-wrapper li {
    list-style-type: none;
    color: #fff;
    display: inline-block;
    float: left;
    margin-right: 20px;
}

.social-profile {
    color: #fff;
}

.social-profile a {
    color: #fff;
}

.social-profile {
    position: relative;
    margin-bottom: 150px;
}

.social-profile .user-profile {
    position: absolute;
    bottom: -75px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    left: 50px;
}

.social-nav {
    position: absolute;
    bottom: 0;
}

.social-prof {
    color: #333;
    text-align: center;
}

.social-prof .wrapper {
    width: 70%;
    margin: auto;
    margin-top: -100px;
}

.social-prof img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 5px solid #fff;
    /*border: 10px solid #70b5e6ee;*/
}

.social-prof h3 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 0;
}

.social-prof p {
    font-size: 18px;
}

.social-prof .nav-tabs {
    border: none;
}

.card .nav>li {
    position: relative;
    display: block;
}

.card .nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    font-weight: 300;
    border-radius: 4px;
}

.card .nav>li>a:focus,
.card .nav>li>a:hover {
    text-decoration: none;
    background-color: #eee;
}

.card .s-nav>li>a.active {
    text-decoration: none;
    background-color: #FFBF00;
    color: #fff;
}

.text-blue {
    color: #FFBF00;
}

ul.friend-list {
    margin: 0;
    padding: 0;
}

ul.friend-list li {
    list-style-type: none;
    display: flex;
    align-items: center;
}

ul.friend-list li:hover {
    background: rgba(0, 0, 0, .1);
    cursor: pointer;
}

ul.friend-list .left img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 20px;
}

ul.friend-list li {
    padding: 10px;
}

ul.friend-list .right h3 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 0;
}

ul.friend-list .right p {
    font-size: 11px;
    color: #6c757d;
    margin: 0;
}

.social-timeline-card .dropdown-toggle::after {
    display: none;
}

.info-card h4 {
    font-size: 15px;
}

.info-card h2 {
    font-size: 18px;
    margin-bottom: 20px;
}

.social-about .social-info {
    font-size: 16px;
    margin-bottom: 20px;
}

.social-about p {
    margin-bottom: 20px;
}

.info-card i {
    color: #FFBF00;
}

.card-one {
    position: relative;
    width: 300px;
    background: #fff;
    box-shadow: 0 10px 7px -5px rgba(0, 0, 0, 0.4);
}

.card-one .header {
    position: relative;
    width: 100%;
    height: 60px;
    background-color: #FFBF00;
}

.card-one .header::before,
.card-one .header::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: inherit;
}

.card-one .header::before {
    -webkit-transform: skewY(-8deg);
    transform: skewY(-8deg);
    -webkit-transform-origin: 100% 100%;
    transform-origin: 100% 100%;
}

.card-one .header::after {
    -webkit-transform: skewY(8deg);
    transform: skewY(8deg);
    -webkit-transform-origin: 0 100%;
    transform-origin: 0 100%;
}

.card-one .header .avatar {
    position: absolute;
    left: 50%;
    top: 30px;
    margin-left: -50px;
    z-index: 5;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    background: #ccc;
    border: 3px solid #fff;
}

.card-one .header .avatar img {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 100px;
    height: auto;
}

.card-one h3 {
    position: relative;
    margin: 80px 0 30px;
    text-align: center;
}

.card-one h3::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    margin-left: -15px;
    width: 30px;
    height: 1px;
    background: #000;
}

.card-one .desc {
    padding: 0 1rem 2rem;
    text-align: center;
    line-height: 1.5;
    color: #777;
}

.card-one .contacts {
    width: 200px;
    max-width: 100%;
    margin: 0 auto 3rem;
}

.card-one .contacts a {
    display: block;
    width: 33.333333%;
    float: left;
    text-align: center;
    color: #c8c;
}

.card-one .contacts a:hover {
    color: #333;
}

.card-one .contacts a:hover .fa::before {
    color: #fff;
}

.card-one .contacts a:hover .fa::after {
    width: 100%;
    height: 100%;
}

.card-one .contacts a .fa {
    position: relative;
    width: 40px;
    height: 40px;
    line-height: 39px;
    overflow: hidden;
    text-align: center;
    font-size: 1.3em;
}

.card-one .contacts a .fa:before {
    position: relative;
    z-index: 1;
}

.card-one .contacts a .fa::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background: #c8c;
    transition: width .3s, height .3s;
}

.card-one .contacts a:last-of-type .fa {
    line-height: 36px;
}

.card-one .footer {
    position: relative;
    padding: 1rem;
    background-color: #FFBF00;
    text-align: center;
}

.card-one .footer a {
    padding: 0 1rem;
    color: #e2e2e2;
    transition: color .4s;
}

.card-one .footer a:hover {
    color: #c8c;
}

.card-one .footer::before {
    content: '';
    position: absolute;
    top: -27px;
    left: 50%;
    margin-left: -15px;
    border: 15px solid transparent;
    border-bottom-color: #FFBF00;
}

#gallery li {
    width: 24%;
    float: left;
    margin: 6px;
   
}


/*end social*/
</style>
@endsection

@section('content')



<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
               <div class="card-header btn btn-warning" >{{ __('친구추가') }}
                     <span><i class="fas fa-user-plus"style="font-size: 20px"  onclick="openaddfriends(this)"></i></span></div>
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/chihiro037.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/chihiro044.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/chihiro048.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 450px">
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
                            {{ __('친구 목록이 없습니다.') }}
                        </div>
                    @endif
                
                {{-- <div class="container"> --}}
                  <div class="row col-lg-12" style="margin-left:unset!important;">
                    @foreach($friends as $friend)
                      <div class="col-lg-4">
                          <div class="card card-one"  id="friend-profile" data-id="{{$friend->partner_id}}">
                              <div class="header">
                                  <div class="avatar">
                                      <img class="img-circle img-sm" alt="Profile Picture" @if($friend->asset_id != 0) src="{{url('/assets/img/profile/'.$friend->asset_file_name.'.'.$friend->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
                                  </div>
                              </div>
                              <h3>{{$friend->user_name}}</h3>
                              <div class="desc">
                                <p class="card-text text-muted">ID : {{$friend->user_id}}</p>
                                <p class="card-text text-muted"> E-mail : {{$friend->user_email}}</p>
                                <p class="card-text text-muted">Joined : {{$friend->created_at}}</p>
                              </div>
                              <div class="contacts" id="friend-board ">
                                  <!--<a title="board" onclick="friendBoard(this)" ><i class="far fa-clipboard"></i></a>-->
                                  <a href="#" title="album" onclick="friendAlbum(this);"><i class="far fa-images"></i></a>
                                  <a href="#" title="message" onclick="message(this, {{$friend->partner_id}})"><i class="fas fa-envelope"></i></a>
                                  <a href="#" title="delete friend" onclick="deletefriend(this)"><i class="fas fa-trash-alt"></i></a>
                                  <div class="clear"></div>
                              </div>
                              <div class="footer">
                                  <a href="#" title="facebook"><i class="fab fa-facebook"></i></a>
                                  <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                                  <a href="#" title="instagram"><i class="fab fa-instagram"></i></a>
                              </div>
                          </div>
                      </div>
                    @endforeach
                  </div>
                {{-- </div> --}}
            </div>





<div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title text-white">친구 추가하기</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="javascript:void(0);" id="addnotesmodalTitle">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                    <label>아이디 입력</label>
                                    <input type="text" id="note-has-id" class="form-control" minlength="25" placeholder="Id" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Discard</button>
            <button id="btn-n-add" class="btn btn-info" onclick="addfriends(this)">Add</button>
            </div>
        </div>
    </div>



 <div class="modal fade" id="send-message" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" data-id={{$friend->id}}>
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title text-white"> Send Message to your Friend ! </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <form action="javascript:void(0);" id="addnotesmodalTitle">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label>Message</label>
                                            <textarea  class="form-control"  id="note-has-message"minlength="60" placeholder="Message" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button id="btn-n-add" class="btn btn-info" onclick="sendMessage(this)">Send</button>
                </div>
            </div>
        </div>
    </div>
          </div>
        </div>
      </div>
    </div>
@endsection


@section('script')
<script type="text/javascript">
  var message_partner_id = 0;

  function openaddfriends(elem){
    console.log('hello');
        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-add').show();
        $('#btn-n-discard').text("Cancel");
  }


  function addfriends(elem){

    var friend_id =$("#note-has-id").val();
    console.log("addfriends",friend_id);

    var ajax_data={
      'friend_id' : friend_id
    }
    blog_ajax("post","/blog/add-friends",ajax_data,function(resp){
      if(resp == "failed")
      {
        $('#addnotesmodal').modal('hide');
        alert("해당하는 아이디가 존재하지않습니다.");
      }
      else
      {
        $('#addnotesmodal').modal('hide');
        alert("친구요청이 전송완료되었습니다.");

      }
    });
  }

  function message(elem, partner_id){
    message_partner_id = partner_id;
    $('#send-message').modal('show');
    $('#btn-n-save').hide();
    $('#btn-n-add').show();
    $('#btn-n-discard').text("Cancel");

  }

  function sendMessage(elem){
    var partner_id = message_partner_id;
    var content =$("#note-has-message").val();

    console.log(partner_id);
    console.log(content);

    var ajax_data={
      'partner_id' : partner_id,
      'content' : content
    }

    blog_ajax("post","/blog/sendMessage",ajax_data,function(resp){
      alert("해당 친구에게 메세지가 성공적으로 전송완료되었습니다.");
      $('send-message').modal('hide');

    });


  }

  function friendAlbum(elem){

    var friend_id =$(elem).parents("#friend-profile").attr('data-id');
    console.log(friend_id);

    window.location.href = "{{ env("BLOG_URL").'blog/friend-album/' }}" + friend_id

    // blog_ajax("get","/blog/friend-album",ajax_data,function(resp){
    //   alert("해당 친구의 Album으로 이동합니다.");
      
    // });

  }
  
  function friendBoard(elem){

    var friend_id =$(elem).parents("#friend-profile").attr('data-id');
    console.log(friend_id);

    var ajax_data={
      'friend_id' : friend_id
    }

    blog_ajax("post","/board/friendBoard",ajax_data,function(resp){
       alert("해당 친구의 Board로 이동합니다.");

    });   
  }

  function deletefriend(elem){
    var friend_id =$(elem).parents("#friend-profile").attr('data-id');
    console.log(friend_id);

    var ajax_data={
      'friend_id' : friend_id
    }

    blog_ajax("put","/blog/deleteFriend",ajax_data,function(resp){
       confirm("해당 친구를 정말 삭제하시겠습니까?");

    });   
  }
</script>
@endsection
