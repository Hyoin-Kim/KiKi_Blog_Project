<script type="text/javascript">
function blog_ajax(ajax_type,ajax_url,ajax_data,callback=function(){},m_async=true,process_data)
{
	$.ajax({
		type: ajax_type,
		url: ajax_url,
		data: ajax_data,
		cache: false,
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		async: m_async,
		success: function(response){
			if(response == -200)
			{
				console.log("error code");
                return;
			}
			else
			{
				callback(response);	
			}
		},
		error: function(response) {
			console.log(response);
			var error_message = "Error occured. Please refresh page using browser button.";
			if(response.status == 401)
			{
				error_message = "Unauthenticated. Please refresh page using browser button and login again.";
			}
			if($(".blockUI.blockMsg").length > 0)
				$(".blockUI.blockMsg").html(error_message);
		}
	});
}
function uploadPhoto(elem, url, type)
{
	// e.preventDefault();
	var files = $(elem)[0].files;
	var asset_id = -1;

	if(files.length != 0)
	{
		var form_data = new FormData();
		var file_count = $(elem)[0].files.length;
		console.log("files",files);
		for (var i = 0; i < file_count; i++)
        {
            var file = $(elem)[0].files[i];
            console.log("file",file);
            form_data.append("file", file);
        }
		form_data.append("type",type);

		$.ajax({
			type: 'post',
			url: url,
			data: form_data,
			cache: false,
			processData: false,
		    contentType: false,
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			async: false,
			success: function(response){
				if(response == -200)
				{
					console.log("error code");
	                return;
				}
				else
				{	
					asset_id = response;
					alert("성공적으로 업로드가 되었습니다.");
				}
			},
			error: function(response) {
				console.log(response);
				var error_message = "Error occured. Please refresh page using browser button.";
				if(response.status == 401)
				{
					error_message = "Unauthenticated. Please refresh page using browser button and login again.";
				}
				if($(".blockUI.blockMsg").length > 0)
					$(".blockUI.blockMsg").html(error_message);
			}
		});


		// console.log("type",typeof(form_data));
		// blog_ajax("post",url,form_data,function(resp){
		// 	alert("성공적으로 업로드가 되었습니다.");
		// },false);
	}

	console.log("util asset_id",asset_id);

	return asset_id;
}
function loadPreviewImage(img, previewName){  

	var isIE = (navigator.appName=="Microsoft Internet Explorer");  
	var path = img.value;  
	var ext = path.substring(path.lastIndexOf('.') + 1).toLowerCase();  

	if(ext == "gif" || ext == "jpeg" || ext == "jpg" ||  ext == "png" )  
	{       
		if(isIE) 
		{  
			$('#'+ previewName).attr('src', path);  
		}
		else
		{  
			if (img.files[0]) 
			{  
				var reader = new FileReader();  
				reader.onload = function (e) {  
					$('#'+ previewName).attr('src', e.target.result);  
				}
				reader.readAsDataURL(img.files[0]);  
			}  
		}  

	}
	else
	{  
		//incorrect file type  
	}   
}  
</script>