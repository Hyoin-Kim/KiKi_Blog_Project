@extends('layouts.master')
@section('style')
<style type="text/css">
  body{

background-color:#eee;
}
/*================================
Filter Box Style
====================================*/
.job-box-filter label {
    width: 100%;
}
.job-box-filter select.input-sm {
    display: inline-block;
    max-width: 120px;
    margin: 0 5px;
    border: 1px solid #e8eef1;
    border-radius: 2px;
    height: 34px;
    font-size: 15px;
}
.job-box-filter label input.form-control {
    max-width: 200px;
    display: inline-block;
    border: 1px solid #e8eef1;
    border-radius: 2px;
    height: 34px;
    margin-left:5px;
    font-size: 15px;
}
.text-right{
text-align:right;
}
.job-box-filter {
    padding: 12px 15px;
    background: #ffffff;
    border-bottom: 1px solid #e8eef1;
    margin-bottom: 20px;
}
.job-box {
    background: #ffffff;
    display: inline-block;
    width: 100%;
    padding: 0 0px 40px 0px;
    border: 1px solid #e8eef1;
}
.job-box-filter a.filtsec {
    margin-top: 8px;
    display: inline-block;
    margin-right: 15px;
    padding: 4px 10px;
    font-family: 'Quicksand', sans-serif;
  transition: all ease 0.4s;
    background: #edf0f3;
    border-radius: 50px;
    font-size: 13px;
    color: #81a0b1;
    border: 1px solid #e2e8ef;
}
.job-box-filter a.filtsec.active {
    color: #ffffff;
    background: #16262c;
  border-color:#16262c;
}
.job-box-filter a.filtsec i {
    color: #03A9F4;
    margin-right: 5px;
}
.job-box-filter a.filtsec:hover, .job-box-filter a.filtsec:focus {
    color: #ffffff;
    background: #07b107;
    border-color: #07b107;
}
.job-box-filter a.filtsec:hover i, .job-box-filter a.filtsec:focus i{
color:#ffffff;
}
.job-box-filter h4 i {
    margin-right: 10px;
}

/*=====================================
Inbox Message Style
=======================================*/
.inbox-message ul {
    padding: 0;
    margin: 0;
}
.inbox-message ul li {
    list-style: none;
    position: relative;
    padding: 15px 20px;
  border-bottom: 1px solid #e8eef1;
}
.inbox-message ul li:hover, .inbox-message ul li:focus {
    background: #eff6f9;
}
.inbox-message .message-avatar {
    position: absolute;
    left: 30px;
    top: 50%;
    transform: translateY(-50%);
}
.message-avatar img {
    display: inline-block;
    width: 54px;
    height: 54px;
    border-radius: 50%;
}
.inbox-message .message-body {
    margin-left: 85px;
    font-size: 15px;
    color:#62748F;
}
.message-body-heading h5 {
    font-weight: 600;
  display:inline-block;
    color:#62748F;
    margin: 0 0 7px 0;
    padding: 0;
}
.message-body h5 span {
    border-radius: 50px;
    line-height: 14px;
    font-size: 12px;
    color: #fff;
    font-style: normal;
    padding: 4px 10px;
    margin-left: 5px;
    margin-top: -5px;
}
.message-body h5 span.unread{
  background:#07b107; 
}
.message-body h5 span.important{
  background:#dd2027; 
}
.message-body h5 span.pending{
  background:#2196f3; 
}
.message-body-heading span {
    float: right;
    color:#62748F;
    font-size: 14px;
}
.messages-inbox .message-body p {
    margin: 0;
    padding: 0;
    line-height: 27px;
    font-size: 15px;
}

a:hover{
    text-decoration:none;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header btn btn-warning">{{ __('메세지함') }}
                     <a href="#S"target="_blank"></a></div>
                          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/mononoke044.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/mononoke047.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/mononoke035.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 450px">
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
</div>

<div class="container">
<div class="row">
<div class="col-md-12">
  <div class="chat_container">
    <div class="job-box">
      <div class="job-box-filter">
        <div class="row">
          <div class="col-md-6 col-sm-6">
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="filter-search-box text-right">
              
            </div>
          </div>
        </div>
      </div>
      <div class="inbox-message">
        <ul>
          @foreach($messages as $message)
          <li>
            <a href="#">
              <div class="message-avatar">
                <img style="width: 60px; height:60px" alt="Profile Picture" @if($message->asset_id != 0) src="{{url('/assets/img/profile/'.$message->asset_file_name.'.'.$message->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif >
              </div>
              <div class="message-body" id="message-main" data-id={{$message->id}}>
                <div class="message-body-heading">
                  <h5>{{$message->user_name}}<span class="unread">메세지</span></h5>
                  <span>7 hours ago</span>
                     <a  class="fas fa-trash-alt" href="#" title="Delete" style="margin-left: 10px"onclick="deletemessage(this)"></a>
                    </a>
                </div>
                <p>{{$message->message_content}}</p>


              </div>
            </a>
          </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">


function deletemessage(elem){
    var message_id=$(elem).parents("#message-main").attr('data-id');

    var ajax_data={
      'message_id' : message_id
    }

    blog_ajax("put","/blog/deleteMessage",ajax_data,function(resp){
      confirm("해당 메세지를 영구삭제하시겠습니까?");

    });
}



</script>
@endsection

