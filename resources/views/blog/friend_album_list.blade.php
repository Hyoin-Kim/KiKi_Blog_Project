@foreach($albums as $idx => $album)
    <div class="col-md-4 single-note-item all-category @if($album->is_selca == 1) note-business @elseif($album->is_important == 1) note-important @elseif($album->is_social == 1) note-social @endif" style="" data-id="{{$album->id}}">
        <div class="card card-body">
            <span class="side-stick"></span>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">
                <a href="{{ url('/blog/albumdetail?id='.$album->id) }}"><p class="note-title-p">{{ $album->title }}</p></a>
                <i class="point fa fa-circle ml-1 font-10"></i>
            </h5>
            <p class="note-date font-12 text-muted">{{$album->created_at}}</p>
           <img id="imageResult-{{$album->id}}" @if($album->asset_id != 0) src="{{url('/assets/img/album/'.$album->asset_file_name.'.'.$album->asset_file_extension)}}" @else src="{{ url("/assets/mononoke111.jpg") }}" @endif style="width: 200px; height: 200px"  alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
            <div class="note-content">
                <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                    {{ $album->content}}
                </p>
            </div>
            <div class="d-flex align-items-center">


            </div>
        </div>
    </div>
@endforeach