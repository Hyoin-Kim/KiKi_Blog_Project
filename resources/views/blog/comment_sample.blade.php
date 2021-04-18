	<div class="media-block comment-full-container" data-id="{{$comment->id}}">
			<a class="media-left" href="#"><img class="editable img-responsive" alt=" Avatar" id="avatar2" @if($user->asset_id != 0) src="{{url('/assets/img/profile/'.$user->asset_file_name.'.'.$user->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 50px; height: 50px;margin-right: 10px"></a>
			 	<div class="media-body">
			        <div class="mar-btm">
			          <a href="#" class="btn-link text-semibold media-heading box-inline">{{ $user->name}}</a>
			          <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> {{ $comment->created_at }}</p>
			        </div>
			        	<div>{{ $comment->user_comment}}</div>
                        @if($comment->asset_id !=0) 
                            <img id="imageResult-{{$comment->id}}" src="{{url('/assets/img/comment/'.$comment->asset_file_name.'.'.$comment->asset_file_extension)}}" style="width: 200px; height: 200px"  alt="" class="img-fluid rounded shadow-sm mx-auto d-block"> 
                        @else
                        @endif
			        <div class="pad-ver">
			          	<div class="btn-group">
			            	<a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up">
			            		{{$comment->is_like}}
			            	</i></a>
			            	<a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down">
			            		 {{$comment->is_bad}}
			            	</i></a>
			          	</div>
			          		<a class="btn btn-sm btn-default fa fa-trash remove-note" href="#"></a>
			        </div>
			        <hr>		       
			</div>
	</div>
