<?php

// Fill These In!
define('S3_BUCKET', 'imediatrans-upload-sg');
define('S3_KEY',    'AKIAINWS3WKBAE6CMNMA');
define('S3_SECRET', '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');
define('S3_REGION', 'ap-southeast-1');        // S3 region name: http://amzn.to/1FtPG6r
define('S3_ACL',    'public-read'); // File permissions: http://amzn.to/18s9Gv7
// Stop Here

$algorithm = "AWS4-HMAC-SHA256";
$service = "s3";
$date = gmdate('Ymd\THis\Z');
$shortDate = gmdate('Ymd');
$requestType = "aws4_request";
$expires = '86400'; // 24 Hours
$successStatus = '201';

$scope = [
    S3_KEY,
    $shortDate,
    S3_REGION,
    $service,
    $requestType
];
$credentials = implode('/', $scope);

$policy = [
    'expiration' => gmdate('Y-m-d\TG:i:s\Z', strtotime('+6 hours')),
    'conditions' => [
        ['bucket' => S3_BUCKET],
        ['acl' => S3_ACL],
        ['starts-with', '$key', ''],
        ['starts-with', '$Content-Type', ''],
        ['success_action_status' => $successStatus],
        ['x-amz-credential' => $credentials],
        ['x-amz-algorithm' => $algorithm],
        ['x-amz-date' => $date],
        ['x-amz-expires' => $expires],
    ]
];
$base64Policy = base64_encode(json_encode($policy));

// Signing Keys
$dateKey = hash_hmac('sha256', $shortDate, 'AWS4' . S3_SECRET, true);
$dateRegionKey = hash_hmac('sha256', S3_REGION, $dateKey, true);
$dateRegionServiceKey = hash_hmac('sha256', $service, $dateRegionKey, true);
$signingKey = hash_hmac('sha256', $requestType, $dateRegionServiceKey, true);

// Signature
$signature = hash_hmac('sha256', $base64Policy, $signingKey);

?>

<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 9.1.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta charset="utf-8">
<title>jQuery File Upload Demo</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload.css">
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<style type="text/css">

#dropzone {
    background: palegreen;
    /*height: 50px;*/
    line-height: 50px;
    text-align: center;
    font-weight: bold;
    margin-top: 20px;
}
#dropzone.in {
    height: 200px;
    line-height: 200px;
    font-size: larger;
}
#dropzone.hover {
    background: lawngreen;
}
#dropzone.fade {
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
    opacity: 1;
}

</style>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
</head>
<body>
    <div id="preloader">
      <div id="loader">
      </div>
    </div>
<div class="container">
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" 
                  method="POST"
                  enctype="multipart/form-data"
                  class="direct-upload">
        <input type="hidden" name="key" value="${filename}">
        <input type="hidden" name="Content-Type" value="">
        <input type="hidden" name="acl" value="<?php echo S3_ACL; ?>">
        <input type="hidden" name="success_action_status" value="<?php echo $successStatus; ?>">
        <input type="hidden" name="policy" value="<?php echo $base64Policy; ?>">

        <input type="hidden" name="X-amz-algorithm" value="<?php echo $algorithm; ?>">
        <input type="hidden" name="X-amz-credential" value="<?php echo $credentials; ?>">
        <input type="hidden" name="X-amz-date" value="<?php echo $date; ?>">
        <input type="hidden" name="X-amz-expires" value="<?php echo $expires; ?>">
        <input type="hidden" name="X-amz-signature" value="<?php echo $signature; ?>">


                    <div>
                        <div id="dropzone" class="fade well">Drop files here</div>
                    </div>


        <!-- Redirect browsers with JavaScript disabled to the origin page -->
        <!-- <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript> -->
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file" name="file" multiple>
                </span>
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>
</div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<!-- <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script> -->
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<!-- <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script> -->
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- blueimp Gallery script -->
<!-- <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script> -->
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<!-- <script src="js/jquery.fileupload-image.js"></script> -->
<!-- The File Upload audio preview plugin -->
<!-- <script src="js/jquery.fileupload-audio.js"></script> -->
<!-- The File Upload video preview plugin -->
<!-- <script src="js/jquery.fileupload-video.js"></script> -->
<!-- The File Upload validation plugin -->
<!-- <script src="js/jquery.fileupload-validate.js"></script> -->
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<!-- <script src="js/main.js"></script> -->
<script type="text/javascript">

/*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

var subdirectory = "src/";
$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    var form = $('#fileupload');
    $('#fileupload').fileupload({
        // sequentialUploads: true,

        // url: form.attr('action'),
        limitConcurrentUploads: 3,
        type: 'POST',
        dataType: 'text',
        done: function (e, data) {
            

            // console.log('done');
            // console.log(data);
            $.post('/dsfds/dsfds', {
                result: data.result
            });
            // console.log(data.textStatus);
            data.result = {
                  "files": [
                    {
                      "name": data.files[0].name,
                      "type": "",
                      "size": data.files[0].size,
                    }
                  ]
                };


            if (e.isDefaultPrevented()) {
                return false;
            }
            var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                getFilesFromResponse = data.getFilesFromResponse ||
                    that.options.getFilesFromResponse,
                files = getFilesFromResponse(data),
                template,
                deferred;
            if (data.context) {
                data.context.each(function (index) {
                    var file = files[index] ||
                            {error: 'Empty file upload result'};
                    deferred = that._addFinishedDeferreds();
                    that._transition($(this)).done(
                        function () {
                            var node = $(this);
                            template = that._renderDownload([file])
                                .replaceAll(node);
                            that._forceReflow(template);
                            that._transition(template).done(
                                function () {
                                    data.context = $(this);
                                    that._trigger('completed', e, data);
                                    that._trigger('finished', e, data);
                                    deferred.resolve();
                                }
                            );
                        }
                    );
                });
            } else {
                template = that._renderDownload(files)[
                    that.options.prependFiles ? 'prependTo' : 'appendTo'
                ](that.options.filesContainer);
                that._forceReflow(template);
                deferred = that._addFinishedDeferreds();
                that._transition(template).done(
                    function () {
                        data.context = $(this);
                        that._trigger('completed', e, data);
                        that._trigger('finished', e, data);
                        deferred.resolve();
                    }
                );
            }


        },
        add: function (e, data) {


            // Give the file being uploaded it's current content-type
            // It doesn't retain it otherwise.
            form.find('input[name="key"]').val( subdirectory + data.originalFiles[0].name + makeid() );
            form.find('input[name="Content-Type"]').val( data.originalFiles[0].type );

            // Message on unLoad.
            // Shows 'Are you sure you want to leave message', just to confirm.
            window.onbeforeunload = function () {
                return 'You have unsaved changes.';
            };

            // Actually submit to form, sending the data.


            if (e.isDefaultPrevented()) {
                return false;
            }
            var $this = $(this),
                that = $this.data('blueimp-fileupload') ||
                    $this.data('fileupload'),
                options = that.options;
            data.context = that._renderUpload(data.files)
                .data('data', data)
                .addClass('processing');
            options.filesContainer[
                options.prependFiles ? 'prepend' : 'append'
            ](data.context);
            that._forceReflow(data.context);
            that._transition(data.context);
            data.process(function () {
                return $this.fileupload('process', data);
            }).always(function () {
                data.context.each(function (index) {
                    $(this).find('.size').text(
                        that._formatFileSize(data.files[index].size)
                    );
                }).removeClass('processing');
                that._renderPreviews(data);
            }).done(function () {
                data.context.find('.start').prop('disabled', false);
                if ((that._trigger('added', e, data) !== false) &&
                        (options.autoUpload || data.autoUpload) &&
                        data.autoUpload !== false) {
                    data.submit();
                }
            }).fail(function () {
                if (data.files.error) {
                    data.context.each(function (index) {
                        var error = data.files[index].error;
                        if (error) {
                            $(this).find('.error').text(error);
                        }
                    });
                }
            });
            data.submit();

        },

        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        // url: '/videos/upload?folder_id='
        url: "//<?php echo S3_BUCKET . "." . $service . "-" . S3_REGION; ?>.amazonaws.com"
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )

    );

    // Load existing files:
    // $('#fileupload').addClass('fileupload-processing');
    // $.ajax({
    //     // Uncomment the following to send cross-domain cookies:
    //     //xhrFields: {withCredentials: true},
    //     url: $('#fileupload').fileupload('option', 'url'),
    //     dataType: 'json',
    //     context: $('#fileupload')[0]
    // }).always(function () {
    //     $(this).removeClass('fileupload-processing');
    // }).done(function (result) {
    //     $(this).fileupload('option', 'done')
    //         .call(this, $.Event('done'), {result: result});
    // });


    $(document).bind('dragover', function (e) {
        var dropZone = $('#dropzone'),
            timeout = window.dropZoneTimeout;
        if (!timeout) {
            dropZone.addClass('in');
        } else {
            clearTimeout(timeout);
        }
        if (e.target === dropZone[0]) {
            dropZone.addClass('hover');
        } else {
            dropZone.removeClass('hover');
        }
        window.dropZoneTimeout = setTimeout(function () {
            window.dropZoneTimeout = null;
            dropZone.removeClass('in hover');
        }, 100);
            
        
    });


});

</script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body>
</html>
