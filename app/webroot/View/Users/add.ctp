<?php echo $this->App->CommonHeaderWithButton(
	'Register System Access',
	 $this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'users', 
		'index'
	)	
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'System Access', 		
				'users', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'users', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Register Access'
			)	
		)
	);
?>


<div class="users form col-md-12">
<?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'class' => 'form-data dropzone', 'id' => 'new_user_data')); ?>
	<fieldset>
	<div class="col-md-12 nopadding">
		<h5 class="bold text-danger nopadding nomargin"><?php echo __('Personal Information'); ?></h5>
	<?php
			echo $this->Form->hidden('added', array('default' => date('Y-m-d h:i:s'))); 
			echo $this->Form->hidden('added_by', array('default' => $author));
			
			echo $this->Form->input('refid', array('type' => 'hidden', 'default' => $refid));
			echo $this->App->showForminputs(array(									
					array('input' => 'title', 'label' => 'Title *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofTitle(), 'wrapper' => 'col-md-1 nopadding'),
					array('input' => 'firstname', 'label' => 'First Name * ', 'class' => 'letters_only', 'wrapper' => 'col-md-3 nopadding'),
					array('input' => 'middlename', 'label' => 'Middle Name * ', 'class' => 'letters_only', 'wrapper' => 'col-md-3 nopadding'),
					array('input' => 'lastname', 'label' => 'Last Name *', 'class' => 'letters_only', 'wrapper' => 'col-md-3 nopadding'),
					array('input' => 'suffix', 'label' => 'Suffix', 'class' => 'letters_only', 'wrapper' => 'col-md-2 nopadding', 'clear' => 1),
					array('input' => 'contact_no', 'label' => 'Mobile No. (+63) *', 'class' => 'contact_no', 'wrapper' => 'col-md-4 nopadding'),
					array('input' => 'tel_no', 'label' => 'Telephone No', 'class' => 'tel_no', 'wrapper' => 'col-md-4 nopadding'),									
					array('input' => 'email', 'label' => 'Email Address', 'wrapper' => 'col-md-4 nopadding', 'clear' => 1),									
				), true);	
	?>
	</div>
	<div class="col-md-12 nopadding m-t-10">
		<h5 class="bold text-danger nopadding nomargin"><?php echo __('Access Information'); ?></h5>
	<?php
			echo $this->App->showForminputs(array(				
					array('input' => 'group_id', 'label' => 'Access Type *', 'type' => 'select', 'options' => $groups, 'wrapper' => 'col-md-6 nopadding'),
					//array('input' => 'terminal_id', 'label' => 'Acccess Terminal *',  'class' => 'letters_only', 'type' => 'select', 'options' => $terminals, 'clear' => '1'),				
					array(
						'input' => 'username', 
						'label' => 'Username *', 
						'wrapper' => 'col-md-3 nopadding',
						'class'	=> '',						
						'n' => 'Username should be at least 6 alphanumeric characters and all uppercase'
					),
					array(
						'input' => 'password', 
						'default' => 'Brbdigital@1', 
						'type' => 'password', 
						'label' => 'Password *', 
						'n' => 'Password should be at least 8  alphanumeric characters with one (1) special character and one ( 1 ) upper case', 
						'wrapper' => 'col-md-3 nopadding', 'clear' => 1
					),															
					//array('input' => 'pass_expire_dummy', 'default' => $this->App->getTheDateAfter("+30 days", date('Y-m-d')), 'label' => 'Password Expires On *', 'class' => 'letters_and_numbers noborder', 'read-only' => true),
					array('input' => 'pass_expire_dummy', 'default' => date('Y-m-d'), 'label' => 'Password Expires On *', 'class' => 'letters_and_numbers noborder', 'read-only' => true),
				), true);	

			//echo $this->Form->input('pass_expire', array('type' => 'hidden', 'default' => $this->App->getTheDateAfter("+30 days", date('Y-m-d'))));
			echo $this->Form->input('pass_expire', array('type' => 'hidden', 'default' => date('Y-m-d')));
	?>
			
		
	</div>
	<div class="clear"></div>

	</fieldset>
	<?php echo $this->App->formEnd('Next', '#new_user_data'); ?>
</div>
<div class="clear"></div>
<?php 
	echo $this->Js->buffer('
		$(document).ready( function(){
			$(".tel_no").inputmask("999-999-9999");
			$(".contact_no").inputmask("999-999-9999");
		});
	');
?>

