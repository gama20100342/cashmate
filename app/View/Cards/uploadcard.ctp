<?php echo $this->App->CommonHeaderWithButton(
	'Upload Pre Generated Cards',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'cards', 
			'index'
		)	
	);
?>
<div class="users form col-md-12">
<?php //echo $this->Form->create('Useravatar', array('enctype' => 'multipart/form-data', 'class' => 'form-data', 'id' => 'new_user_avatar')); ?>
	<fieldset>			
			<?php //echo $this->Form->hidden('user_id', array('id' => 'user_id', 'type' => 'text', 'default' => $user_id)); ?>
			<?php //echo $this->Form->hidden('refid', array('id' => 'refid', 'default' => $refid)); ?>
			
				<div class="col-md-12 nopadding text-left m-t-20">
					<div id="fileuploader" class="pull-right">Upload</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12 nopadding text-right">
					<div class="upload_message m-t-10 text-success"></div>
				</div>
				<div class="clear"></div>

	</fieldset>
	<div class="clear"></div>
	<button type="button" class="m-t-40 m-b-20 submitpic btn btn-sm btn-success pull-left">Upload & Continue</button>
	<?php //echo $this->App->formEnd('SAVE', '#new_user_avatar'); ?>
</div>
<div class="clear"></div>
</div>

<?php
	echo $this->Html->script('jquery.uploadfile.min', array('inline' => true)); 

	echo $this->Js->Buffer('
		function _error_message(type, msg){
			$("._mem").html(msg);
			$("#_error_modal").modal(type).appendTo("body");
		}
	
		$(document).ready(function() {			
			var uploadObj  = $("#fileuploader").uploadFile({
				url:"'.$this->webroot.'cards/extract_uploaded/",
				maxFileCount: 1,
				//allowedTypes: "",
				fileName:"userpic",
				formData: {
					username : "'.$author.'"
				},
				dragDrop: true,
				showCancel: true,
				cancelStr: "Remove",
				uploadStr: "Browse",
				showDone: false,			
				showError: true,				
				showDelete: true,				
				onSuccess:function(files,data,xhr,pd){
					_responseMsg(JSON.parse(data).message);
					console.log(data);
					
					//$(".upload_message").html(JSON.parse(data).message);				
				},
				onError: function(files,status,errMsg,pd){
					
					_responseMsg(status + " - " + errMsg);
					//$(".upload_message").html(status + " - " + errMsg);		
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



