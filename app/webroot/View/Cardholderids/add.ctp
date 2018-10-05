<?php echo $this->App->CommonHeaderWithButton(
	'Register New Account'
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Accounts', 		
				'cardholders', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Enroll New Account', 		
				'cardholders', 
				'add'
			),
			$this->App->ShowNormaLink(
				'Upload Scanned ID'
			)	
		)
	);
?>


<div class="users form col-md-12">
	
	<?php echo $this->App->registrationLink(2); ?>
	
	<fieldset>						
				<div class="col-md-12 nopadding text-left">
					<h5 class="bold">
						<?php echo __('Card Holder Scanned ID') . $this->App->raquo(). $holder['Cardholder']['fullname']; ?> 
						<div class="note fs-9 text-success">Allowed files (jpg, jpeg, & png)</div>
					</h5>
					<div id="fileuploader" class="pull-right">Upload</div>					
					
				</div>
				<div class="clear"></div>
				<div class="col-md-12 nopadding text-right">
					<div class="upload_message m-t-10 m-b-10 text-success"></div>
				</div>
				<div class="clear"></div>

	</fieldset>	
	<button type="button" class="m-t-10 m-b-50 submitpic btn btn-sm btn-success pull-right"><i class="fas fa-save fa-lg"></i> Next</button>	
</div>
<div class="clear"></div>
</div>


 <div class="modal" id="_new_cardholder_noti" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
						<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
				<div class="modal-body text-center m-b-15">
					<p class="text-success fs-12 m-b-20 m-t-10 message_modal_text_nc"></p>
					<?php echo $this->Html->link('Ok', array(
						'controller' => 'cardholders', 
						'action' => 'add/new'
						),
						array('class' => 'btn btn-success btn-sm')); ?>
				</div>
			</div>
		</div> 
   </div>
   
   
   
<?php
	
	echo $this->Html->script('jquery.uploadfile.min', array('inline' => true)); 

	echo $this->Js->Buffer('
		$(document).ready(function() {			
			var uploadObj  = $("#fileuploader").uploadFile({
				url:"'.$this->webroot.'/cardholderids/add/'.$holderid.'/'.$refid.'/'.$status.'",
				maxFileCount: 1,
				allowedTypes: "jpg,png,jpeg",
				fileName:"userids",
				formData: {
					
				},
				dragDrop: true,
				showCancel: true,
				cancelStr: "Remove",
				uploadStr: "Browse",
				showDone: false,			
				showError: true,				
				showDelete: true,				
				onSuccess:function(files,data,xhr,pd){
					var _data  = JSON.parse(data);
					if(_data.status=="success"){
						//$(".upload_message").html(_data.message);
						//window.location.href="'.$this->webroot.'cards/add/'.$holderid.'/'.$refid.'/'.$status.'"
						//window.location.href="'.$this->webroot.'cardholders/add"
						$(".message_modal_text_nc").html(_data.message);
						$("#_new_cardholder_noti").modal("show");
						
					}else{
						$(".upload_message").html(_data.message);	
					}
				},
				onError: function(files,status,errMsg,pd){
					$(".upload_message").html(status + " - " + errMsg);		
				},
				showProgress: false,
				autoSubmit: false,
				doneStr: "Avatar successfully uploaded",	
				showStatusAfterSuccess: false,
				showFileCounter: false,
				showFileSize: true,
				showPreview: true,
				previewHeight: "800px",
				previewWidth: "800px",
				sequential:true,
				sequentialCount:1
			});
			
			$(".submitpic").click( function(){
				uploadObj.startUpload();
			});
		});
	');
?>



