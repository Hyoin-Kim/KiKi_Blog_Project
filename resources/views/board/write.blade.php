@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: right;padding-right: 50px;padding-bottom: 10px;">
            <a href="javascript:void(0)" id="add-notes"> <i class="icon-note m-1"></i><span class="d-none d-md-block font-14"><img src="{{ url("/assets/icon05.png") }}" alt="first" style="display:inline-block;width:100px; height:70px"><button type="button" class="btn btn-warning">글쓰기</button>
        </div>
    </div>

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header btn btn-warning col-md-12">Board</div>


               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ url("/assets/totoro044.jpg") }}" class="d-block w-100" alt="first" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
      <img src="{{ url("/assets/totoro050.jpg") }}" class="d-block w-100" alt="second" style="width: 580px;height: 450px">
    </div>
    <div class="carousel-item">
       <img src="{{ url("/assets/totoro030.jpg") }}" class="d-block w-100" alt="third" style="width: 580px;height: 450px">
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
    <div class="row col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Name</th>
                    <th style="width:20px;">Edit</th>
                    <th style="width:20px;">Trash</th>
                </tr>
            </thead>
            <tbody id="board-table">
            @foreach($boards as $idx => $board)
                <tr class="board-tr" data-id="{{$board->id}}">
                    <td>
                        {{ $idx + 1 }}
                    </td>
                    <td><p class="board-t">
                        {{ $board->title }}
                    </p></td>
                    <td><p class="board-c">
                        {{ $board->content}}
                    </p></td>
                    <td>
                        {{ $board->user_name }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning"  onclick="editBoard({{ $board }})"><i class="fas fa-pencil-alt"></i></button>

                    </td>
                    <td>
                         <button type="button" class="btn btn-warning"  onclick="removeBoard(this)"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

 <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title text-white">Add Notes</h5>
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
                                            <label>Title</label>
                                            <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label>Content</label>
                                            <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button>
                    <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Discard</button>
                    <button id="btn-n-add" class="btn btn-info" disabled="disabled" onclick="addBoard(this)">Add</button>
                   <button id="btn-n-edit" class="btn btn-info" onclick="updateBoard(this)">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript">
    $(function(){
        var $btns = $('.note-link').click(function() {
            if (this.id == 'all-category') {
              var $el = $('.' + this.id).fadeIn();
              $('#note-full-container > div').not($el).hide();
            } if (this.id == 'important') {
              var $el = $('.' + this.id).fadeIn();
              $('#note-full-container > div').not($el).hide();
            } else {
              var $el = $('.' + this.id).fadeIn();
              $('#note-full-container > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');  
        })      

        $('#add-notes').on('click', function(event) {
            $('#addnotesmodal').modal('show');
            $('#btn-n-save').hide();
            $('#btn-n-add').show();
            $('#btn-n-discard').text("Cancel");
        })

        // Button add
        $("#btn-n-add").on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth()); //January is 0!
          var yyyy = today.getFullYear();
          var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
          today = dd + ' ' + monthNames[mm]  + ' ' + yyyy;

            var $_noteTitle = document.getElementById('note-has-title').value;
            var $_noteDescription = document.getElementById('note-has-description').value;

            $html =     '<div class="col-md-4 single-note-item all-category"><div class="card card-body">' +
                                    '<span class="side-stick"></span>' +
                                    '<h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="'+$_noteTitle+'">'+$_noteTitle+'<i class="point fa fa-circle ml-1 font-10"></i></h5>' +
                                    '<p class="note-date font-12 text-muted">'+today+'</p>' +
                                    '<div class="note-content">' +
                                        '<p class="note-inner-content text-muted" data-noteContent="'+$_noteDescription+'">'+$_noteDescription+'</p>' +
                                    '</div>' +
                                    '<div class="d-flex align-items-center">' +
                                        '<span class="mr-1"><i class="fa fa-star favourite-note"></i></span>' +
                                        '<span class="mr-1"><i class="fa fa-trash remove-note"></i></span>' +
                                        '<div class="ml-auto">' +
                                              '<div class="category-selector btn-group">' +
                                                        '<a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
                                                            '<div class="category">' +
                                                                '<div class="category-business"></div>' +
                                                                '<div class="category-social"></div>' +
                                                                '<div class="category-important"></div>' +
                                                                '<span class="more-options text-dark"><i class="icon-options-vertical"></i></span>'+
                                                            '</div>' +
                                                        '</a>' +
                                                        '<div class="dropdown-menu dropdown-menu-right category-menu">' +
                                                            '<a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business</a>' +
                                                            '<a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social</a>' +
                                                            '<a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important</a>' +
                                                    '</div>' +
                                             '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div></div> ';

            $("#note-full-container").prepend($html);
            $('#addnotesmodal').modal('hide');

            //removeNote();
            favouriteNote();
            addLabelGroups();
        });

        $('#addnotesmodal').on('hidden.bs.modal', function (event) {
            event.preventDefault();
            document.getElementById('note-has-title').value = '';
            document.getElementById('note-has-description').value = '';
        })

        // removeNote();
        // favouriteNote();
        // addLabelGroups();

        $('#btn-n-add').attr('disabled', 'disabled'); 

         $('#note-has-title').keyup(function() {
              var empty = false;
              $('#note-has-title').each(function() {
                  if ($(this).val() == '') {
                          empty = true;
                  }
              });

              if (empty) {
                  $('#btn-n-add').attr('disabled', 'disabled'); 
              } else {
                  $('#btn-n-add').removeAttr('disabled');
              }
        });
    });




    function addBoard(elem){
        console.log("hellokiki");



        var note_title=$("#note-has-title").val();
        var note_description=$("#note-has-description").val();

        var ajax_data={
            'note_title':note_title,
            'note_description':note_description

        }

        blog_ajax("post","/board/add-board",ajax_data,function(resp){
            $("#board-table").prepend(resp);
            $('#addnotesmodal').modal('hide');
        });

    }


    function removeBoard(elem) {
        var note_id = $(elem).parents('.board-tr').attr('data-id');

        if(confirm("게시물을 정말 지우시겠습니까?")){
            blog_ajax("put","/board/delete-board",{'note_id':note_id},function(resp){
                $(elem).parents('.board-tr').remove();

            });
        }
    }

    function favouriteNote() {
        $(".favourite-note").off('click').on('click', function(event) {
          event.stopPropagation();
          $(this).parents('.single-note-item').toggleClass('note-favourite');
        })
    }

    function addLabelGroups() {
        $('.category-selector .badge-group-item').off('click').on('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          var getclass = this.className;
          var getSplitclass = getclass.split(' ')[0];
          if ($(this).hasClass('badge-business')) {
            $(this).parents('.single-note-item').removeClass('note-social');
            $(this).parents('.single-note-item').removeClass('note-important');
            $(this).parents('.single-note-item').toggleClass(getSplitclass);
          } else if ($(this).hasClass('badge-social')) {
            $(this).parents('.single-note-item').removeClass('note-business');
            $(this).parents('.single-note-item').removeClass('note-important');
            $(this).parents('.single-note-item').toggleClass(getSplitclass);
          } else if ($(this).hasClass('badge-important')) {
            $(this).parents('.single-note-item').removeClass('note-social');
            $(this).parents('.single-note-item').removeClass('note-business');
            $(this).parents('.single-note-item').toggleClass(getSplitclass);
          }
        });
    }


    function editBoard(board){



        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-edit').show();
        $('#btn-n-discard').text("Cancel");
        $('#btn-n-add').hide();

        $("#note-has-title").val(board.title);
        $("#note-has-description").val(board.content);
        $(".modal-title").text("Edit Notes");
        $("#btn-n-edit").attr("data-id",board.id);

    }

    function updateBoard(elem){
        

        var note_id = $(elem).attr('data-id');

        var update_title = $("#note-has-title").val();
        var update_description = $("#note-has-description").val();
        
        console.log("updateboard1",update_title);
        console.log("updateboard2",update_description);

        var ajax_data={

            'note_id' : note_id,
            'update_title' : update_title,
            'update_description' : update_description

        }

        blog_ajax("put","/board/edit-board",ajax_data,function(resp){
            console.log("resp",resp);
            $.each($(".board-tr"), function(idx, board){
                
                if($(board).attr("data-id") == note_id)
                {
                   
                    $(board).find(".board-t").text(resp.title);
                    $(board).find(".board-c").text(resp.content);
                 }
            });          

            $('#addnotesmodal').modal('hide');

        });
    }
</script>
@endsection

