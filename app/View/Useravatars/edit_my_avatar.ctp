<?php //echo $this->App->commonHeader('Update User Avatar'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Upload User Avatar',
	 $this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'users', 
		'viewmyprofile'
	)	
); ?>
<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'My Profile', 		
				'users', 
				'viewmyprofile'
			),			
			$this->App->ShowNormaLink(
				'Upload Avatar'
			)	
		)
	);
?>

<div class="col-md-12 text-center nodisplay m-t-30" id="form_action">
	<?php
		echo $this->App->Showbutton(
		'Register More Access', 
		'btn-success fs-10', 
		'users', 
		'add',
		'plus'
		);
		
		
		echo $this->App->Showbutton(
		'Manage Access', 
		'btn-success fs-10 m-l-3', 
		'users', 
		'index',
		'pen-alt'
		);
	?>
</div>


<div class="users form col-md-12 main_form">
<?php //echo $this->Form->create('Useravatar', array('enctype' => 'multipart/form-data', 'class' => 'form-data', 'id' => 'new_user_avatar')); ?>
	<fieldset>	
			<h5 class="nopadding nomargin"><?php echo $firstname.' '.$lastname; ?></h5>
			<div class="note fs-9 text-success">Allowed files (jpg, jpeg, & png)</div>
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
	
	<button type="button" class="m-b-20 submitpic btn btn-sm btn-success pull-right"><i class="fas fa-save fa-lg"></i> Save & Continue</button>
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
				showError: true,				
				showDelete: true,				
				onSuccess:function(files,data,xhr,pd){
					//$(".upload_message").html(JSON.parse(data).message);	
					_responseMsg(JSON.parse(data).message);			
					_loading_message("hide");
					//$(".main_form").hide();
					//$("#form_action").removeClass("nodisplay");
				},
				onError: function(files,status,errMsg,pd){
					//$(".upload_message").html(status + " - " + errMsg);		
					_responseMsg(status + " - " + errMsg);	
					_loading_message("hide");
				},
				showProgress: false,
				autoSubmit: false,
				doneStr: "Avatar successfully uploaded",	
				showStatusAfterSuccess: false,
				showFileCounter: false,
				showFileSize: true,
				showPreview: true,
				previewHeight: "200px",
				previewWidth: "200px",
				sequential:true,
				sequentialCount:1
			});
			
			$(".submitpic").click( function(){
				_loading_message("show");
				uploadObj.startUpload();
			});
		});
	');
?>



