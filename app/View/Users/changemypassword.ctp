
					<div class="col-md-12">
					<h5 class="bold"><?php echo __('Change My Password'); ?></h5>
					<div id="response_msg"></div>
					<div class="nodisplay" id="ok-c"><?php echo $this->Html->link('Ok', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-success btn-sm')); ?></div>
					<div class="change_form">
						<?php echo $this->Form->create('User', array('class' => 'form-data', 'id' => 'new_user_password')); ?>
						<fieldset>						
						<?php						
								echo $this->App->showForminputs(array(																	
										array('input' => 'old_password', 'type' => 'password', 'label' => 'Current Password * ', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-12', 'clear' => 1),
										array('input' => 'new_password', 'type' => 'password', 'label' => 'New Password * ', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-12'),
										array('input' => 'con_password', 'type' => 'password', 'label' => 'Confirm New Password *', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-12'),																	
									), true);	
									
								echo $this->Form->hidden('pass_expire', array('type' => 'hidden', 'default' => $this->App->getTheDateAfter("+30 days", date('Y-m-d'))));
						?>					
						
						<div class="clear m-t-15"></div>					
							<button type="button" form="#new_user_password" url="<?php echo $this->webroot.'/users/changemypassword'; ?>" class="btn btn-success btnajaxsubmit pull-right m-b-20"><i class="fas fa-save fa-lg"></i> Save Changes</button>					
							<button type="button" data-dismiss="modal" class="btn btn-danger pull-left m-b-20"><i class="fas fa-times fa-lg"></i> Close</button>					
						</div>
						</fieldset>
						<div class="p-b-13"></div>
					</div>
					<div class="clear"></div>

<?php 
	/*
	echo $this->Js->buffer('
		$(window).load( function(){			
			//check empty fields
			function checkFormEmpty(formid){
				var empty = 0;
				$(formid).find("input").each( function(i, item){
					if($(item).val().length == 0){
						$("#" + $(this).attr("id")).addClass("danger-input");
						$("#response_msg").addClass("text-danger");                       
						$("#response_msg").html("Some info were missing, please try again.");	                          
						empty = 1;
					}else{
						$("#response_msg").removeClass("text-danger");                       
						$("#response_msg").html("");	  
						$("#" + $(this).attr("id")).removeClass("danger-input");
					}
				});

				return empty;
			}
			
			function showMessage(msg, status){
				if(status==401){
					$("#response_msg").addClass("text-danger");
					$("#response_msg").removeClass("text-success");
				}else{
					$("#response_msg").addClass("text-success");
					$("#response_msg").removeClass("text-danger");
				}
				
				$("#response_msg").html(msg);
			}
			
			//empty all fields
			function emptyAllFields(formid){        
				$(formid).find("input").each( function(i, item){
					$(item).val("");
				});
			}
		
			$("#changepass_modal").modal("show").appendTo("body");
			$("#changepass_modal").on("shown.bs.modal", function(){
				$(".btnupdatepass").click( function(e){
					e.preventDefault();
					  if(checkFormEmpty("#new_user_password")===0){
						$.ajax({
							method: "POST",
							url: "'.$this->webroot.'/users/changemypassword/'.$this->Session->read('Auth.User.refif').'"/"'.$this->Session->read('Auth.User.id').'",
							data: $("#new_user_password").serialize(),
							beforeSend: function(){
								$("#response_msg").html("Processing, please wait...");
							},
							success: function(res){
								var _res = JSON.parse(res);
								
								if(_res.status==200){
									$.get("'.$this->webroot.'/users/idle_warning", function(data, status){
										if(status=="success"){
											showMessage(_res.message, _res.status);
											$("#ok-c").removeClass("nodisplay");
											$("#ok-c").show();
											$(".change_form").hide();
										}
									});	
								}else{
									
									showMessage(_res.message, _res.status);	
								}
							},
							error: function(xhr, exception){						
								$("#response_msg").html(xhr.status + " " + exception);
							},
							complete: function(){
							}
						});
					  }
				});
			});
		});
	');*/
?>

