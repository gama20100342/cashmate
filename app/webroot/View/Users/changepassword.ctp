
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

<?php 
	echo $this->Js->buffer('
		$(document).ready( function(){
			ajaxFormSubmit();
		});
	');
?>

