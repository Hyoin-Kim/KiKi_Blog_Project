@foreach($albums as $idx => $album)
    <div class="col-md-4 single-note-item all-category @if($album->is_selca == 1) note-business @elseif($album->is_important == 1) note-important @elseif($album->is_social == 1) note-social @endif" style="" data-id="{{$album->id}}">
        <div class="card card-body">
            <span class="side-stick"></span>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                <p class="note-title-p"><a href="{{ url('/blog/albumdetail?id='.$album->id) }}">{{ $album->title }}</p>
                <i class="point fa fa-circle ml-1 font-10"></i>
            </h5>
            <p class="note-date font-12 text-muted">{{$album->created_at}}</p>
           <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            <div class="note-content">
                <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                    {{ $album->content}}
                </p>
            </div>
            <div class="d-flex align-items-center">
                <span class="mr-1"><a href="javascript:void(0)" ><i class="fa fa-trash remove-note" onclick="removePhoto(this);"></i></span>
                <span class="mr-1"><a href="javascript:void(0)"><i class="far fa-edit" onclick="editPhoto({{ $album }})"></i></span>
                <div class="ml-auto">
                    <div class="category-selector btn-group">
                        <a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                            <div class="category">
                                <div class="category-selca"></div>
                                <div class="category-social"></div>
                                <div class="category-important"></div>
                                <span class="more-options text-dark"><i class="icon-options-vertical"></i></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right category-menu">
                            <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);" onclick="updatePhotoType(this,'selca')">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Selca
                            </a>
                            <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);" onclick="updatePhotoType(this,'social')">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social
                            </a>
                            <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);" onclick="updatePhotoType(this,'important')">
                                <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach