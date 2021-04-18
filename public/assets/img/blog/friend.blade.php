@extends('layouts.master')
@section('style')
<style type="text/css">
  body{
    margin-top:20px;
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
</style>
@endsection

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header btn btn-warning" >{{ __('친구추가') }}
                     <span><i class="fas fa-user-plus"style="font-size: 20px"  onclick="addfriends(this)"></i></span></div>
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
                        </div>
                    @endif

                    {{ __('친구 목록이 없습니다.') }}

                    <div class="container">
  <div class="row">
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar6.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Nielsen Cobb</h5>
              <p class="card-text text-uppercase text-muted">Memora</p>
              <p class="card-text">
                 
                nielsencobb@memora.com<br><abbr title="Phone">P:  </abbr>+1 (851) 552-2735
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar7.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Margret Cote</h5>
              <p class="card-text text-uppercase text-muted">Zilidium</p>
              <p class="card-text">
                 
                margretcote@zilidium.com<br><abbr title="Phone">P:  </abbr>+1 (893) 532-2218
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar8.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Rachel Vinson</h5>
              <p class="card-text text-uppercase text-muted">Chorizon</p>
              <p class="card-text">
                 
                rachelvinson@chorizon.com<br><abbr title="Phone">P:  </abbr>+1 (891) 494-2060
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar1.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Gabrielle Aguirre</h5>
              <p class="card-text text-uppercase text-muted">Comverges</p>
              <p class="card-text">
                 
                gabrie@comv.com<br><abbr title="Phone">P:  </abbr>+1 (805) 459-3869
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar2.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Spears Collier</h5>
              <p class="card-text text-uppercase text-muted">Remold</p>
              <p class="card-text">
                 
                spearscollier@remold.com<br><abbr title="Phone">P:  </abbr>+1 (910) 555-2436
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4">                       
      <div class="card">
        <div class="card-body">
          <div class="media align-items-center"><span style="background-image: url(https://bootdey.com/img/Content/avatar/avatar3.png)" class="avatar avatar-xl mr-3"></span>
            <div class="media-body overflow-hidden">
              <h5 class="card-text mb-0">Keisha Thomas</h5>
              <p class="card-text text-uppercase text-muted">Euron</p>
              <p class="card-text">
                 
                keishathomas@euron.com<br><abbr title="Phone">P:  </abbr>+1 (958) 405-3392
              </p>
            </div>
          </div><a href="#" class="tile-link"></a>
        </div>
      </div>
    </div>

                </div>
            </div>
        </div>
    </div>
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
                                    <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Id" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Discard</button>
            <button id="btn-n-add" class="btn btn-info" onclick="()">Add</button>
            </div>
        </div>
    </div>
@endsection


@section('script')
<script type="text/javascript">

  function addfriends(elem){
    console.log('hello');
        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-add').show();
        $('#btn-n-discard').text("Cancel");
  }
</script>
@endsection
