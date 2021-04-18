@extends('layouts.master')

@section('style')

<style type="text/css">
	body{
    margin-top:0px;
    background:#ebeef0;
}

.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}

.form-group.fl_icon .icon {
    position: absolute;
    top: 1px;
    left: 16px;
    width: 48px;
    height: 48px;
    background: #f6f6f7;
    color: #b5b8c2;
    text-align: center;
    line-height: 50px;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-bottom-left-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-bottomleft: 2px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
}

.form-group .form-input {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

.form-group.fl_icon .form-input {
    padding-left: 70px;
}

.form-group textarea.form-input {
    height: 150px;
}

</style>
@endsection

@section('content')

<div class="col-md-12">
  <div class="card">
	<div class="card-header btn btn-warning">{{ __('Board') }}</div></div></div>
    	<div class="col-md-12 single-note-item all-category style="  data-id="{{$album->id}}">
        	<div class="card card-body">
            	<span class="side-stick"></span>
            	<h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                	<p class="note-title-p">{{ $album->title }}</p>
                	<i class="point fa fa-circle ml-1 font-10"></i>
            	</h5>
            	<p class="note-date font-12 text-muted">{{$album->created_at}}</p>
           <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            	<div class="note-content">
                	<p class="note-inner-content text-muted" data-notecontent="Blandit tempus 	porttitor aasfs. Integer posuere erat a ante venenatis.">
                    	{{ $album->content}}
                	</p>
            	</div>
        	</div>
    	</div>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootdey">
	<div class="col-md-12 bootstrap snippets">
		<div class="panel">
		  <div class="panel-body">
		    <textarea class="form-control " rows="3" placeholder="댓글을 남겨보세요 !" id="comments-note"></textarea>
		    <div class="mar-top clearfix">

		      <button class="btn btn-sm btn-warning pull-right" type="button" onclick="addcomments({{$album->id}});"><i class="fa fa-pencil fa-fw"></i> 완료</button>

		      <button class="btn btn-sm btn-warning pull-right" type="button" style="margin-right: 10px "><a href="{{ url('/blog/album') }}"><i class="fas fa-undo-alt"></i> 뒤로가기</button>

			      <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"><input id="upload" type="file"  style="margin-left: 10px"></a>
		    </div>
		  </div>
		</div>
		<div class="panel">
			<div class="panel-body" id="comment-wrapper">
			    <!-- Newsfeed Content -->
			    <!--===================================================-->
			  <?php
			  	\Log::info("comments".json_encode($comments));
			  ?>
			  @foreach($comments as $idx => $comment)
                <div class="media-block comment-full-container" data-id="{{$comment->id}}">
                    <a class="media-left" href="#"><img class="img-circle img-sm" style="margin-right: 10px" alt="Profile Picture" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                    <div class="media-body">
                        <div class="mar-btm">
                            <a href="#" class="btn-link text-semibold media-heading box-inline">{{ $comment->user_name}}</a>
                            <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> {{ $comment->created_at }}</p>
                        </div>
                        <div>{{ $comment->user_comment}}</div>
                        <div class="pad-ver">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up" onclick="likeComment(this)"></i></a>
                                <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down" onclick="worseComment(this)"></i></a>
                            </div>
                            <a class="btn btn-sm btn-default fa fa-trash remove-note" onclick="deleteComment(this)"></a>
                        </div>
                        <hr>
                    </div>
                </div>
			    @endforeach

			  
			  </div>
		</div>
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">

	function addcomments(album_id){
		console.log("addcomments");
		var photo_comment = $("#comments-note").val();
		var ajax_data={
			'photo_comment' : photo_comment,
			'album_id' : album_id 
		}

		blog_ajax("post","/blog/add-comment",ajax_data,function(resp){
			$("#comment-wrapper").prepend(resp);
			$('#comments-note').val("");


		});
	}

	function deleteComment(elem){
		console.log("deleteComment",$(elem).parents(".comment-full-container"));
		var comment_id = $(elem).parents(".comment-full-container").attr('data-id');

        console.log("comment_id",comment_id);

		var ajax_data={
			'comment_id' : comment_id
		}

		if(confirm("댓글을 정말 지우시겠습니까?")){
			blog_ajax("put","/blog/delete-comment",ajax_data,function(resp){

				$(elem).parents('.comment-full-container').remove();


			});
		}

	}
    function likeComment(elem){

    }
    function worseComment(elem){

    }





        


</script>
@endsection
