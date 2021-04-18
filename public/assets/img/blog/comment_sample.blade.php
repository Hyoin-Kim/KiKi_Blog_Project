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
			            	<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
			            	<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
			          	</div>
			          		<a class="btn btn-sm btn-default fa fa-trash remove-note" href="#"></a>
			        </div>
			        <hr>		       
			</div>
	</div>
