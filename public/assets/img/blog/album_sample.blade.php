<!-- add photo 후-->
<div class="col-md-4 single-note-item all-category" data-id="{{$album->id}}">
    <div class="card card-body">
        <span class="side-stick"></span>
        <h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="{{ $album->title }}">
            <p class="note-title-p"><a href="{{ url('/blog/albumdetail?id='.$album->id) }}">{{ $album->title }}</p>
            <i class="point fa fa-circle ml-1 font-10"></i>
        </h5>
        <p class="note-date font-12 text-muted">{{ $album->created_at }}</p>
        <div class="note-content">
            <p class="note-inner-content text-muted" data-noteContent="{{$album->content}}">{{$album->content}}</p>
        </div>
            <div class="d-flex align-items-center">
                <span class="mr-1"><i class="fa fa-trash remove-note" onclick="removePhoto(this);"></i></span>
                <span class="mr-1"><i class="far fa-edit" onclick="editPhoto({{ $album }})"></i></span>
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