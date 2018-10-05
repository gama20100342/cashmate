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


<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Cards', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Upload Pre-Generated Cards'				
			)	
		)
	);
?>


<div class="users form col-md-12">
	<fieldset>			
			<?php echo $this->Form->create('Cardpregen', array('class' => 'card_form noborder nopadding', 'id' => 'new_card_form')); ?>
			<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(
							array('input' => 'cardtype_id', 'label' => 'Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype', 'options' => $cardtypes, 'wrapper' => 'col-md-2 nopadding'),							
							array('input' => 'institution_id', 'label' => 'Institution', 'type' => 'select', 'empty' => true, 'class' => '_institution', 'options' => $institutions, 'wrapper' => 'col-md-7 nopadding'),							
							array('input' => 'product_id', 'label' => 'Product', 'type' => 'select', 'empty' => false, 'class' => '_product_type', 'options' => $products, 'wrapper' => 'col-md-3 nopadding', 'clear' => 1)												
						), true);		

					?>
			<div class="clear"></div>
			</form>
			
				<h5 class="nopadding m-t-10">Select The File to Upload</h5>
				<div class="note fs-9 text-success">Allowed file ( csv )</div>					
				<div class="col-md-12 nopadding text-left m-t-20">			
					<div id="fileuploader" class="pull-right"></div>
				</div>
				<div class="clear"></div>
				<div class="col-md-12 nopadding text-right">
					<div class="upload_message m-t-10 text-success"></div>
				</div>
				<div class="clear"></div>

	</fieldset>
	<div class="clear"></div>
	<button type="button" class="m-t-40 m-b-20 submitpic btn btn-sm btn-success pull-left">Upload & Continue</button>
	<div class="clear"></div>
	<div class="nodisplay" id="extraction_result">
		<h5>Upload Results</h5>
		<div class="related col-md-12 nopadding">	
			<?php echo $this->App->tHead(array("Card No", "Status"), 'blocked_account_'); ?>		
			<?php echo $this->App->tFFoot(); ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>


<?php
	echo $this->Html->script('jquery.uploadfile.min', array('inline' => true)); 

	echo $this->Js->Buffer('
		function _error_message(type, msg){
			$("._mem").html(msg);
			$("#_error_modal").modal(type).appendTo("body");
		}
				
	
		$(document).ready(function() {					
			
			var __data = [];
			var uploadObj;
			
			function showUploadForm(){
				uploadObj  = $("#fileuploader").uploadFile({
					url:"'.$this->webroot.'cards/upload_pregenerated",
					maxFileCount: 1,
					allowedTypes: "csv",
					fileName:"csvfile",
					formData:  $(".card_form").serialize(),				
					dragDrop: true,
					showCancel: true,
					cancelStr: "Remove",
					uploadStr: "Browse",
					showDone: false,			
					showError: true,				
					showDelete: true,				
					onSuccess:function(files,data,xhr,pd){
						
						_responseMsg(JSON.parse(data).message);	
						var _mdata = JSON.parse(data)._data;
						var _status = JSON.parse(data).status;
						
						//console.log(_mdata);
						
						
						if(_status===200){
							$("#extraction_result").removeClass("nodisplay");
							
							$.each(_mdata, function(i, item){
									__data.push(item);
								});
							
							$("#blocked_account_").DataTable({
								data: __data,
								destroy: true,							
								"scrollY": "180px",
								"scrollCollapse": false,
								"columnDefs": [{
									"targets": [1],
									"orderable": false
								}],
								"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
								"bStateSave": false, 
								"pagingType": "full_numbers",
								"bFilter": false,
								"fnPreDrawCallback": function(){	
									_loading_message("hide");
								}
							});
							
						
						}
						
					},
					onError: function(files,status,errMsg,pd){					
						_responseMsg(status + " - " + errMsg);
						$("#extraction_result").addClass("nodisplay");
						_loading_message("hide");
					},
					showProgress: false,
					autoSubmit: false,
					doneStr: "File successfully uploaded",	
					showStatusAfterSuccess: false,
					showFileCounter: true,
					showFileSize: true,
					showPreview: true,
					previewHeight: "200px",
					previewWidth: "200px",
					sequential:true,
					sequentialCount:1
				});
			
			}
			
			$("._institution, ._product_type").bind("change", function(){
				if($("._institution option:selected").val()===""){
				_responseMsg("Please select the institution");
				}else{
					showUploadForm();
				}
			});
			
			$(".submitpic").click( function(){		
				if($("._institution option:selected").val()===""){
					_responseMsg("Please select the institution");
				}else{
					_loading_message("show");
					uploadObj.startUpload();									
				}

			});
		});
	');
?>



