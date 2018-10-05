<?php echo $this->App->commonHeader('User Avatar'); ?>
<div class="users form col-md-12">
<?php //echo $this->Form->create('Useravatar', array('enctype' => 'multipart/form-data', 'class' => 'form-data', 'id' => 'new_user_avatar')); ?>
	<fieldset>			
			<?php //echo $this->Form->hidden('user_id', array('id' => 'user_id', 'type' => 'text', 'default' => $user_id)); ?>
			<?php //echo $this->Form->hidden('refid', array('id' => 'refid', 'default' => $refid)); ?>
			
				<div class="col-md-12 nopadding text-left">
					<div id="fileuploader" class="pull-right">Upload</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12 nopadding text-right">
					<div class="upload_message m-t-10 m-b-10 text-success"></div>
				</div>
				<div class="clear"></div>

	</fieldset>
	<button type="button" class="m-t-10 submitpic btn btn-sm btn-success pull-right">Submit</button>
	<?php //echo $this->App->formEnd('SAVE', '#new_user_avatar'); ?>
</div>
<div class="clear"></div>
</div>

<?php
	echo $this->Html->script('jquery.uploadfile.min', array('inline' => true)); 

	echo $this->Js->Buffer('
		$(document).ready(function() {			
			var uploadObj  = $("#fileuploader").uploadFile({
				url:"'.$this->webroot.'/useravatars/add/'.$refid.'/'.$firstname.'/'.$lastname.'",
				maxFileCount: 1,
				allowedTypes: "jpg,png,jpeg",
				fileName:"userpic",
				formData: {
					user_id : "'.$user_id.'", refid : "'.$refid.'"
				},
				dragDrop: true,
				showCancel: true,
				cancelStr: "Remove",
				uploadStr: "Browse",
				showDone: false,			
				showError: false,				
				showDelete: true,				
				onSuccess:function(files,data,xhr,pd){
					$(".upload_message").html(JSON.parse(data).message);				
				},
				onError: function(files,status,errMsg,pd){
					$(".upload_message").html(status + " - " + errMsg);		
				},
				showProgress: false,
				autoSubmit: false,
				doneStr: "Avatar successfully uploaded",	
				showStatusAfterSuccess: false,
				showFileCounter: true,
				showFileSize: true,
				showPreview: true,
				previewHeight: "200px",
				previewWidth: "200px",
				sequential:true,
				sequentialCount:1
			});
			
			$(".submitpic").click( function(){
				uploadObj.startUpload();
			});
		});
	');
?>



