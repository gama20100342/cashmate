<?php //echo $this->App->commonHeader('Update User Avatar'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Upload User Avatar',
	 $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'branches', 
			'index'
	)	
); ?>
<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Branches', 		
				'branches', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'branches', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Register', 		
				'branches', 
				'add'
			),
			$this->App->ShowNormaLink(
				'Batch Branches Registration'
			)	
		)
	);
?>

<div class="users form col-md-12">
	<fieldset>	
			<h5 class="nopadding nomargin">Select The File to Upload</h5>
				<div class="note fs-9 text-success">Allowed file ( csv )</div>					
				<div class="col-md-12 nopadding text-left m-t-20">
					<div id="fileuploader" class="pull-right">Upload</div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12 nopadding text-right">
					<div class="upload_message m-t-10 m-b-10 text-success"></div>
				</div>
				<div class="clear"></div>

	</fieldset>
	
	<button type="button" class="m-b-20 submitpic btn btn-sm btn-success pull-right"><i class="fas fa-save fa-lg"></i> Upload & Save</button>
	<?php //echo $this->App->formEnd('SAVE', '#new_user_avatar'); ?>
</div>
<div class="clear"></div>
</div>

<?php
	
	
	echo $this->Html->script('jquery.uploadfile.min', array('inline' => true)); 
	
	echo $this->Js->Buffer('
		$(document).ready(function() {			
			var uploadObj  = $("#fileuploader").uploadFile({
				url:"'.$this->webroot.'branches/upload_branches/",
				maxFileCount: 1,
				allowedTypes: "csv",
				fileName:"branchfile",
				formData: { },
				dragDrop: true,
				showCancel: true,
				cancelStr: "Remove",
				uploadStr: "Browse",
				showDone: false,			
				showError: true,				
				showDelete: true,				
				onSuccess:function(files,data,xhr,pd){					
					_responseMsg(JSON.parse(data).message);		
					console.log(JSON.parse(data));
				},
				onError: function(files,status,errMsg,pd){					
					_responseMsg(status + " - " + errMsg);	
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
				uploadObj.startUpload();
			});
		});
	');
?>



