<!-- add photo 후-->
<div class="col-md-4 single-note-item all-category" data-id="{{$album->id}}">
    <div class="card card-body">
        <span class="side-stick"></span>
        <h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="{{ $album->title }}">
            <a href="{{ url('/blog/albumdetail?id='.$album->id) }}"><p class="note-title-p">{{ $album->title }}</p></a>
            <i class="point fa fa-circle ml-1 font-10"></i>
        </h5>
        <p class="note-date font-12 text-muted">{{ $album->created_at }}</p>
         <img id="imageResult-{{$album->id}}" @if($album->asset_id != 0) src="{{url('/assets/img/album/'.$album->asset_file_name.'.'.$album->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 200px; height: 200px"  alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            <div class="note-content">
        <div class="note-content">
            <p class="note-inner-content text-muted" data-noteContent="{{$album->content}}">{{$album->content}}</p>
        </div>
            <div class="d-flex align-items-center">
                <span class="mr-1"><i class="fa fa-trash remove-note" onclick="removePhoto(this);"></i></span>
                <span class="mr-1"><i class="far fa-edit" onclick="editPhoto({{ $album }})"></i></span>
                <span id="lock-off"><i class="fas fa-unlock-alt" onclick="clickhide(this,0)"></i></span>
                <span id="lock-on"><i class="fas fa-user-lock" onclick="clickopen(this,1)"></i></span>
                <div class="ml-auto">
                    <div class="category-selector btn-group">
                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                        <div class="category">
                            <div class="category-business"></div>
                            <div class="category-social"></div>
                            <div class="category-important"></div>
                            <span class="more-options text-dark"><i class="icon-options-vertical"></i></span>
                        </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right category-menu">
                        <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business</a>
                        <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social</a>
                        <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>