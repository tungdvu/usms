<?php
	$this->set_css('assets/image_crud/css/fineuploader.css');
	$this->set_css('assets/image_crud/css/photogallery.css');
	$this->set_css('assets/image_crud/css/colorbox.css');

	$this->set_js('assets/image_crud/js/jquery-1.9.1.js');
	$this->set_js('assets/image_crud/js/jquery-ui-1.9.0.custom.min.js');
	// $this->set_js('assets/image_crud/js/fineuploader-3.2.min.js');
	$this->set_js('assets/image_crud/js/fineuploader-3.2.js');
	$this->set_js('assets/image_crud/js/jquery.colorbox-min.js');
	$this->set_js('assets/image_crud/js/jquery-ui.min.js');
	//$this->set_js('publics/admin/plugins/slimScroll/jquery.slimscroll.min.js');
?>
<script>
$(function(){
	<?php if ( ! $unset_upload) {?>
		createUploader();
	<?php }?>
		//loadColorbox();
});
function loadColorbox()
{
	$('.color-box').colorbox({
		rel: 'color-box'
	});
}
function loadPhotoGallery(){
	$.ajax({
		url: '<?php echo $ajax_list_url?>',
		cache: false,
		dataType: 'text',
		beforeSend: function()
		{
			$('.file-upload-messages-container:first').show();
			$('.file-upload-message').html("<?php echo $this->l('loading');?>");
		},
		complete: function()
		{
			$('.file-upload-messages-container').hide();
			$('.file-upload-message').html('');
		},
		success: function(data){
			$('#ajax-list').html(data);
			//loadColorbox();
		}
	});
}

function createUploader() {
	var uploader = new qq.FineUploader({
		element: document.getElementById('fine-uploader'),
		request: {
			 endpoint: '<?php echo $upload_url?>'
		},
		validation: {
			 allowedExtensions: ['jpeg', 'jpg', 'png', 'gif','txt','pdf','ppt','doc','docx','xls','xlsx','pptx','rar','zip'],
			 sizeLimit: 8192000 // 50 kB = 50 * 1024 bytes

		},		
		callbacks: {
			 onComplete: function(id, fileName, responseJSON) {
				 loadPhotoGallery();
			 }
		},
        text: {
            uploadButton: 'Chọn tệp...',
            cancelButton: 'Bỏ qua',
            retryButton: 'Thử lại',
            failUpload: 'Tải lên thất bại',
            dragZone: 'Kéo thả tệp tin vào đây để tải lên',
            dropProcessing: 'Processing dropped files...',
            formatProgress: "{percent}% of {total_size}",
            waitingForResponse: "Đang tải..."
        },       
		debug: true,
		// template: '<div class="qq-uploader">' +
		// 	'<div class="qq-upload-drop-area"><span><?php echo $this->l("upload-drop-area");?></span></div>' +
		// 	'<div class="qq-upload-button"><?php echo $this->l("upload_button");?></div>' +
		// 	'<ul class="qq-upload-list"></ul>' +
		// 	'</div>',
		// fileTemplate: '<li>' +
		// 	'<span class="qq-upload-file"></span>' +
		// 	'<span class="qq-upload-spinner"></span>' +
		// 	'<span class="qq-upload-size"></span>' +
		// 	'<a class="qq-upload-cancel" href="#"><?php echo $this->l("upload-cancel");?></a>' +
		// 	'<span class="qq-upload-failed-text"><?php echo $this->l("upload-failed");?></span>' +
		// 	'</li>',

	});
}

function saveTitle(data_id, data_title)
{
	  	$.ajax({
			url: '<?php echo $insert_title_url; ?>',
			type: 'post',
			data: {primary_key: data_id, value: data_title},
			beforeSend: function()
			{
				$('.file-upload-messages-container:first').show();
				$('.file-upload-message').html("<?php echo $this->l('saving_title');?>");
			},
			complete: function()
			{
				$('.file-upload-messages-container').hide();
				$('.file-upload-message').html('');
			}
			});
}

window.onload = createUploader;

</script>
<?php if(!$unset_upload){ ?><!-- <div id="file-uploader-demo1" class="floatL upload-button-container"></div>
<div class="file-upload-messages-container hidden">
	<div class="message-loading"></div>
	<div class="file-upload-message"></div>
	<div class="clear"></div>
</div>-->
<div id="fine-uploader"></div>
<?php }?>
<div class="clear"></div>
<div id='ajax-list'>
	<?php if(!empty($photos)){?>
	<script type='text/javascript'>
		$(function(){
			$('.delete-anchor').click(function(){
				if(confirm('<?php echo $this->l("alert_delete");?>'))
				{
					$("#full_screen").css({"display" : "block"});
					$.ajax({
						url:$(this).attr('href'),
						beforeSend: function()
						{
							$('.file-upload-messages-container:first').show();
							$('.file-upload-message').html("<?php echo $this->l('deleting');?>");
						},
						success: function(){
							loadPhotoGallery();
							$("#full_screen").css({"display" : "none"});
						}
					});
				}
				return false;
			});
			$(".color-box img").mousedown(function(){
				return false;
			});
    		$(".photos-crud").sortable({
        		handle: '.move-box',
        		opacity: 0.6,
        		cursor: 'move',
        		revert: true,
        		update: function() {
    				var order = $(this).sortable("serialize");
	    				$.post("<?php echo $ordering_url?>", order, function(theResponse){});
    			}
    		});
    		$('.ic-title-field').keyup(function(e) {
    			if(e.keyCode == 13) {
					var data_id = $(this).attr('data-id');
					var data_title = $(this).val();

					saveTitle(data_id, data_title);
    			}
    		});

    		$('.ic-title-field').bind({
    			  click: function() {
    				$(this).css('resize','both');
    			    $(this).css('overflow','auto');
    			    $(this).animate({height:80},6000);
    			  },
    			  blur: function() {
      			    $(this).css('resize','none');
      			  	$(this).css('overflow','hidden');
      			  	$(this).animate({height:20},6000);

					var data_id = $(this).attr('data-id');
					var data_title = $(this).val();

					saveTitle(data_id, data_title);
    			  }
    		});
		});
	</script>
	<ul class='photos-crud'>
	<?php 
	$file = array();
	//var_dump($photos);
	foreach($photos as $photo_num => $photo){
			$file[] = $photo->ID;
	?>
		<li style = "float:none;">
			<?php if(!$unset_delete){?>
			<?php echo $photo->Filename;?>
				<a href='<?php echo $photo->delete_url?>' class='delete-anchor' tabindex="-1"><i class="icon fa-close" aria-hidden="true"></i> Xóa</a>
			<?php }?>
				
		</li>
	<?php }?>
		</ul>
		<input name = "current_file" type = "text" hidden value = '<?php echo base64_encode(serialize($file));?>'/>
		<div class='clear'></div>
	<?php }?>
</div>
<script>
	$(".photo_common").hover(function(){
		$(this).find("#default_gallery").css({"visibility":"visible"});
	},function(){
		$(this).find("#default_gallery").css({"visibility":"hidden"});
	});
</script>