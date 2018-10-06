
					<div class="col-md-6">
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
							<button type="button" form="#new_user_password" url="<?php echo $this->webroot.'/users/changemypassword'; ?>" class="btn btn-success btnajaxsubmit pull-right m-t-10 m-b-10"><i class="fas fa-save fa-lg"></i> Save Changes</button>											
						</fieldset>
						
							
						</div>
					</div>
					<div class="clear"></div>
					
					
	 <div class="modal" id="_new_cardholder_noti" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
						<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
				<div class="modal-body text-center m-b-15">
					<p class="text-success fs-12 m-b-20 m-t-10 message_modal_text_nc"></p>
					<?php echo $this->Html->link('Ok', array(
						'controller' => 'users', 
						'action' => 'logout'
						),
						array('class' => 'btn btn-success btn-sm')); ?>											
				</div>
			</div>
		</div> 
   </div>
   

<?php 
	echo $this->Js->buffer('
		$(document).ready( function(){
			$(".btnajaxsubmit").click( function(e){			
			e.preventDefault();
			var _conf = confirm("You are about to submit changes. Please confirm.");			
			if(_conf){				
				var _url 	= $(this).attr("url");
				var _form 	= $(this).attr("form");
				
				$.ajax({
					method: "POST",
					url: _url,
					data: $(_form).serialize(),
					dataType: "JSON",
					cache: false,
					beforeSend: function(){						
						_loading_message("show");
					},
					success: function(resp){												
						if(resp.status==200){							
									$(".message_modal_text_nc").html(resp.message);
									$("#_new_cardholder_noti").modal("show");
								}else{
									_responseMsg(resp.message);	
								}		
					},
					error: function(xJq, er1, er2){
						_responseMsg("An error occured during update " + xJq + er1, + er2);						
					},
					complete: function(){
						_loading_message("hide");
					}
				});
				
			}else{
				return false;
			}
		});
		});
	');
?>

