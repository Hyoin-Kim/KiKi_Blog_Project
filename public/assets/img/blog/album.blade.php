@extends('layouts.master')

@section('style')
<style type="text/css">
    html,body{
        background: #edf1f5;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid transparent;
        border-radius: 0;
    }
    .card {
        margin-bottom: 30px;
    }
    .card-body {
        flex: 1 1 auto;
        padding: 1.57rem;
    }

     .note-has-grid .nav-link {
         padding: .5rem
     }

     .note-has-grid .single-note-item .card {
         border-radius: 10px
     }

     .note-has-grid .single-note-item .favourite-note {
         cursor: pointer
     }

     .note-has-grid .single-note-item .side-stick {
         position: absolute;
         width: 3px;
         height: 35px;
         left: 0;
         background-color: rgba(82, 95, 127, .5)
     }

     .note-has-grid .single-note-item .category-dropdown.dropdown-toggle:after {
         display: none
     }

     .note-has-grid .single-note-item .category [class*=category-] {
         height: 15px;
         width: 15px;
         display: none
     }

     .note-has-grid .single-note-item .category [class*=category-]::after {
         content: "\f0d7";
         font: normal normal normal 14px/1 FontAwesome;
         font-size: 12px;
         color: #fff;
         position: absolute
     }

     .note-has-grid .single-note-item .category .category-business {
         background-color: rgba(44, 208, 126, .5);
         border: 2px solid #2cd07e
     }

     .note-has-grid .single-note-item .category .category-social {
         background-color: rgba(44, 171, 227, .5);
         border: 2px solid #2cabe3
     }

     .note-has-grid .single-note-item .category .category-important {
         background-color: rgba(255, 80, 80, .5);
         border: 2px solid #ff5050
     }

     .note-has-grid .single-note-item.all-category .point {
         color: rgba(82, 95, 127, .5)
     }

     .note-has-grid .single-note-item.note-business .point {
         color: rgba(44, 208, 126, .5)
     }

     .note-has-grid .single-note-item.note-business .side-stick {
         background-color: rgba(44, 208, 126, .5)
     }

     .note-has-grid .single-note-item.note-business .category .category-business {
         display: inline-block
     }

     .note-has-grid .single-note-item.note-favourite .favourite-note {
         color: #ffc107
     }

     .note-has-grid .single-note-item.note-social .point {
         color: rgba(44, 171, 227, .5)
     }

     .note-has-grid .single-note-item.note-social .side-stick {
         background-color: rgba(44, 171, 227, .5)
     }

     .note-has-grid .single-note-item.note-social .category .category-social {
         display: inline-block
     }

     .note-has-grid .single-note-item.note-important .point {
         color: rgba(255, 80, 80, .5)
     }

     .note-has-grid .single-note-item.note-important .side-stick {
         background-color: rgba(255, 80, 80, .5)
     }

     .note-has-grid .single-note-item.note-important .category .category-important {
         display: inline-block
     }

     .note-has-grid .single-note-item.all-category .more-options,
     .note-has-grid .single-note-item.all-category.note-favourite .more-options {
         display: block
     }

     .note-has-grid .single-note-item.all-category.note-business .more-options,
     .note-has-grid .single-note-item.all-category.note-favourite.note-business .more-options,
     .note-has-grid .single-note-item.all-category.note-favourite.note-important .more-options,
     .note-has-grid .single-note-item.all-category.note-favourite.note-social .more-options,
     .note-has-grid .single-note-item.all-category.note-important .more-options,
     .note-has-grid .single-note-item.all-category.note-social .more-options {
         display: none
     }

     @media (max-width:767.98px) {
         .note-has-grid .single-note-item {
             max-width: 100%
         }
     }

     @media (max-width:991.98px) {
         .note-has-grid .single-note-item {
             max-width: 216px
         }
     }



</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="page-content container note-has-grid">
    <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
        <li class="nav-item" onclick="viewPhotoType('all')">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                <i class="icon-layers mr-1"></i><span class="d-none d-md-block">All Photo</span>
            </a>
        </li>
        <li class="nav-item" onclick="viewPhotoType('selca')">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-Selca"> <i class="icon-briefcase mr-1"></i><span class="d-none d-md-block">Selca</span></a>
        </li>
        <li class="nav-item" onclick="viewPhotoType('social')">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-social"> <i class="icon-share-alt mr-1"></i><span class="d-none d-md-block">Social</span></a>
        </li>
        <li class="nav-item" onclick="viewPhotoType('important')">
            <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-important"> <i class="icon-tag mr-1"></i><span class="d-none d-md-block">Important</span></a>
        </li>
        <li class="nav-item ml-auto">
            <a href="javascript:void(0)" class="nav-link btn-warning rounded-pill d-flex align-items-center px-3" id="add-notes"> <i class="icon-note m-1"></i><span class="d-none d-md-block font-14"><img src="{{ url("/assets/icon10.png") }}" alt="first" style="display:inline-block;width:60px; height:40px">Add Photo</span></a>
        </li>
    </ul>

    <div class="tab-content bg-transparent">
        <div id="note-full-container" class="note-has-grid row">
            
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
                                        <label>Note Title</label>
                                        <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label>Note Description</label>
                                            <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                        {{-- <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0"> --}}
                        <input id="upload" type="file" class="form-control border-0" style="display:none;">
                        <label id="upload-label" class="font-weight-light text-muted"></label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>                 
                </div>
                <div class="modal-footer">
                    <button id="btn-n-save" class="float-left btn btn-success" style="display: none;">Save</button>
                    <button id="btn-n-discard" class="btn btn-danger" data-dismiss="modal">Discard</button>
                    <button id="btn-n-add" class="btn btn-info" onclick="addPhoto()">Add</button>
                    <button id="btn-n-edit" class="btn btn-info" onclick="updatePhoto(this)">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(function(){
        viewPhotoType('all');
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
            $(".modal-title").text("Add Notes");
        })

         

        $('#addnotesmodal').on('hidden.bs.modal', function (event) {
            event.preventDefault();
            document.getElementById('note-has-title').value = '';
            document.getElementById('note-has-description').value = '';
        })

        removeNote();
        favouriteNote();
        addLabelGroups();

        $('#btn-n-add').attr('disabled', 'disabled'); 
        $('#btn-n-edit').attr('disabled', 'disabled'); 


         $('#note-has-title').keyup(function() {
              var empty = false;
              $('#note-has-title').each(function() {
                  if ($(this).val() == '') {
                          empty = true;
                  }
              });

              if (empty) {
                  $('#btn-n-add').attr('disabled', 'disabled'); 
                  $('#btn-n-edit').attr('disabled', 'disabled'); 
              } else {

                $('#btn-n-add').removeAttr('disabled');
                $('#btn-n-edit').removeAttr('disabled');
              }
        });
    });

    function removeNote() {
        // $(".remove-note").off('click').on('click', function(event) {
        //   event.stopPropagation();
        //   $(this).parents('.single-note-item').remove();
        // })
    }

    function viewPhotoType(type){
        blog_ajax("get",'/blog/get-album-list',{'view_type' : type},function(resp){
            $("#note-full-container").html("");
            $("#note-full-container").append(resp);
        },false);
    }


    function updatePhotoType(elem, type){
        var photo_id = $(elem).parents(".single-note-item").attr("data-id");

        var ajax_data={
            'photo_id':photo_id,
            'photo_type':type
        }

        blog_ajax("put","/blog/update-photo-type",ajax_data,function(resp){

        });

        
    }

    function editPhoto(album){
        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-edit').show();
        $('#btn-n-discard').text("Cancel");
        $('#btn-n-add').hide();

        $("#note-has-title").val(album.title);
        $("#note-has-description").val(album.content);
        $(".modal-title").text("Edit Notes");
        $("#btn-n-edit").attr("data-id",album.id);
    }


    function expandAlbum(album){

        $('#addnotesmodal').modal('show');
        $('#btn-n-save').hide();
        $('#btn-n-edit').hide();
        $('#btn-n-discard').text("Cancel");
        $('#btn-n-add').hide();

        $("#note-has-title").val(album.title);
        $("#note-has-description").val(album.content);
        $(".modal-title").text("Edit Notes");
        $("#btn-n-edit").attr("data-id",album.id);

        


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
    /*  ==========================================
    SHOW UPLOADED IMAGE
    * ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removePhoto(elem){
        var photo_id = $(elem).parents(".single-note-item").attr('data-id');

        if (confirm("앨범을 정말 지우시겠습니까?")) { 
            blog_ajax("put","/blog/delete-photo",{'photo_id' : photo_id},function(resp){
                $(elem).parents('.single-note-item').remove();
            });
        }

        // $.confirm({
        //     // title: "앨범 삭제",
        //     // content: "정말지우시겠습니까?",
        //     // animation: "scale",
        //     // escapeKey: "cancel",
        //     // icon: "",
        //     // closeAnimation: "scale",
        //     // backgroundDismiss: "",
        //     // opacity: "0.5",
        //     // buttons: {
        //     //     confirm: {
        //     //         text: "YES",
        //     //         btnClass: 'btn btn-sm btn-primary msx-btn-positive',
        //     //         action: function(){
        //     //             blog_ajax("put","/blog/delete-photo",{'photo_id' : photo_id},function(resp){
        //     //                 $(elem).parents('.single-note-item').remove();
        //     //             });

        //     //             $(".jconfirm.jconfirm-light.jconfirm-open").unbind("keyup");
        //     //         },
        //     //     },
        //     //     cancel: {
        //     //         text: "Cancel",
        //     //         btnClass: 'btn btn-sm btn-danger msx-btn-negative',
        //     //         action: function () {
        //     //             if(obj.cancel_action != undefined)
        //     //                 obj.cancel_action();
        //     //             $(".jconfirm.jconfirm-light.jconfirm-open").unbind("keyup");
        //     //         },
        //     //     },
        //     // },
        //     // draggable: false,
        //     // onContentReady: function () {
        //     //     if(obj.ready_action != undefined)
        //     //         obj.ready_action();
        //     //     $(".jconfirm.jconfirm-light.jconfirm-open").focus();
        //     //     $(".jconfirm.jconfirm-light.jconfirm-open").keyup(function (event) {
        //     //         if(event.keyCode == 13) {
        //     //             $(".jconfirm-buttons .msx-btn-positive").click();
        //     //         }else if(event.keyCode == 27) {
        //     //             $(".jconfirm-buttons .msx-btn-negative").click();
        //     //         }
        //     //     });
        //     // }
        // });
    }


    function updatePhoto(elem){
        

        var photo_id = $(elem).attr('data-id');

        var update_title = $("#note-has-title").val();
        var update_description = $("#note-has-description").val();

        console.log("updatePhoto",photo_id);

        var ajax_data = {
            'photo_id' : photo_id,
            'update_title' : update_title,
            'update_description' : update_description
        }


        blog_ajax("put","/blog/update-photo",ajax_data,function(resp){
            console.log("resp",resp);
            $.each($(".single-note-item"), function(idx, note){
                if($(note).attr("data-id") == photo_id)
                {


                    $(note).find(".note-title-p").text(resp.title);
                    $(note).find(".note-inner-content").text(resp.content);
                }
            });
            // $("#note-full-container").prepend(resp);
            $('#addnotesmodal').modal('hide');
        });
    }

    function addPhoto(){
        console.log("addPhoto");
        // event.preventDefault();

        uploadPhoto('#upload','/upload/upload-photo','album');

        return ;

        var photo_title = $("#note-has-title").val();
        var photo_description = $("#note-has-description").val();

        var ajax_data = {
            'photo_title' : photo_title,
            'photo_description' : photo_description
        }
        

        blog_ajax("post","/blog/add-photo",ajax_data,function(resp){
            $("#note-full-container").prepend(resp);
            $('#addnotesmodal').modal('hide');
        });



            /* Act on the event */
          // var today = new Date();
          // var dd = String(today.getDate()).padStart(2, '0');
          // var mm = String(today.getMonth()); //January is 0!
          // var yyyy = today.getFullYear();
          // var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
          // today = dd + ' ' + monthNames[mm]  + ' ' + yyyy;

            // var $_noteTitle = document.getElementById('note-has-title').value;
            // var $_noteDescription = document.getElementById('note-has-description').value;

    //         $html =     '<div class="col-md-4 single-note-item all-category"><div class="card card-body">' +
    //                         '<span class="side-stick"></span>' +
    //                         '<h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="'+$_noteTitle+'">'+$_noteTitle+'<i class="point fa fa-circle ml-1 font-10"></i></h5>' +
    //                         '<p class="note-date font-12 text-muted">'+today+'</p>' +
    //                         '<div class="note-content">' +
    //                             '<p class="note-inner-content text-muted" data-noteContent="'+$_noteDescription+'">'+$_noteDescription+'</p>' +
    //                         '</div>' +
    //                         '<div class="d-flex align-items-center">' +
    //                             '<span class="mr-1"><i class="fa fa-star favourite-note"></i></span>' +
    //                             '<span class="mr-1"><i class="fa fa-trash remove-note"></i></span>' +
    //                             '<div class="ml-auto">' +
    //                                   '<div class="category-selector btn-group">' +
    //                                             '<a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
    //                                                 '<div class="category">' +
    //                                                     '<div class="category-business"></div>' +
    //                                                     '<div class="category-social"></div>' +
    //                                                     '<div class="category-important"></div>' +
    //                                                     '<span class="more-options text-dark"><i class="icon-options-vertical"></i></span>'+
    //                                                 '</div>' +
    //                                             '</a>' +
    //                                             '<div class="dropdown-menu dropdown-menu-right category-menu">' +
    //                                                 '<a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business</a>' +
    //                                                 '<a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social</a>' +
    //                                                 '<a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important</a>' +
    //                                         '</div>' +
    //                                  '</div>' +
    //                             '</div>' +
    //                         '</div>' +
    //                     '</div></div> ';

    // $("#note-full-container").prepend($html);
    // $('#addnotesmodal').modal('hide');

    // removeNote();
    // favouriteNote();
    // addLabelGroups();
    }

    $(function () {
        $('#upload').on('change', function () {
            readURL(input);
        });
    });

    /*  ==========================================
        SHOW UPLOADED IMAGE NAME
    * ========================================== */
    var input = document.getElementById( 'upload' );
    var infoArea = document.getElementById( 'upload-label' );

    input.addEventListener( 'change', showFileName );
    function showFileName( event ) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      infoArea.textContent = 'File name: ' + fileName;
    }
</script>
@endsection