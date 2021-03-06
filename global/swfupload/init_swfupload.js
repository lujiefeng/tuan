
		var swfu;

		$(document).ready(function() {
			var settings = {
				flash_url : TMPL_PATH+"swfupload.swf",
				upload_url: UPLOAD_PATH,
				post_params: {"PHPSESSID" : SESSION_ID},
				file_size_limit : MAX_FILE_SIZE+"MB",
				file_types : "*.jpg;*.gif;*.png",
				file_types_description : "Image File",
				file_upload_limit : 5,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: TMPL_PATH+"TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '上传图片',
				button_text_left_padding: 6,
				button_text_top_padding: 4,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};

			swfu = new SWFUpload(settings);
	     });
