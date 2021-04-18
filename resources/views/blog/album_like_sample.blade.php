    <div class="col-md-12 single-note-item all-category"  data-id="{{$album->id}}">
        <div class="card card-body">
            <span class="side-stick"></span>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
            <p class="note-title-p">{{ $album->title }}</p>
            <i class="point fa fa-circle ml-1 font-10"></i>
            </h5>
            <p class="note-date font-12 text-muted">{{$album->created_at}}</p>
             <img id="imageResult-{{$album->id}}" @if($album->asset_id != 0) src="{{url('/assets/img/album/'.$album->asset_file_name.'.'.$album->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 400px; height: 400px"  alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            <div class="note-content">
                <p class="note-inner-content text-muted" data-notecontent="Blandit tempus   porttitor aasfs. Integer posuere erat a ante venenatis.">
                {{ $album->content}}
                </p>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-default btn-hover-success" style="font-size: 20px;">
                            <i class="fa fa-thumbs-up" onclick="likeAlbum(this, 1)" style="@if($is_like == "true")color:blue;@endif()"></i>{{ " ".$album_recommend_infos->like_count }}
                        </a>
                        <a class="btn btn-sm btn-default btn-hover-danger" style="font-size: 20px">
                            <i class="fa fa-thumbs-down" onclick="likeAlbum(this, 2)" style="@if($is_dislike == "true")color:blue;@endif()"></i>{{ " ".$album_recommend_infos->dislike_count }}
                        </a>
                    </div>
            </div>
        </div>
    </div>