<?php echo $this->App->CommonHeaderWithButton(
	'Update Account Group',
	$this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'groups', 
		'index'
	)	
	);
?>


<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Access Role', 		
				'groups', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'groups', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Update Role'
			)	
		)
	);
?>

<div class="groups form col-md-12">
	<div class="col-md-6 nopadding">
<?php echo $this->Form->create('Group', array('class' => 'data-form', 'id' => 'new_group_form')); ?>
	<fieldset>	
		
	<?php
		echo $this->Form->input('id');
		
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'name', 
				'label' => 'Role Name *', 
				'placeholder' => 'e.g. Branch Staff', 
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-12'
			)
		));
		
	?>
	
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save Changes', '#new_group_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>
