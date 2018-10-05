<?php echo $this->App->CommonHeaderWithButton(
	'Add New Terminal',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'terminals', 
			'index'
		)
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Terminal', 		
				'terminals', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Update POS Terminal'
			)	
		)
	);
?>

<div class="groups form col-md-12">
	<div class="col-md-10 nopadding">
<?php echo $this->Form->create('Terminal', array('class' => 'data-form', 'id' => 'new_terminal_form')); ?>
	<fieldset>	
	<h4 class="nopadding bold text-success nodisplay">Device No. <?php echo $deviceno; ?></h4>
	<?php
		
		echo $this->Form->input('id');		
		echo $this->Form->hidden('modified', array('type' => 'hidden', 'default' => date('Y-m-d')));
		echo $this->Form->hidden('modifiedby', array('type' => 'hidden', 'default' => $author));			
		
		
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'deviceno', 
				'label' => 'Device No.', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-6 nopadding'
			),
			array(
				'input' => 'name', 
				'label' => 'Terminal Name', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-6 nopadding',
				'clear' => 1				
			),
			array(
				'input' => 'address',
				'label' => 'Address', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-12 nopadding',
				'clear' => 1
			),
			array(
				'input' => 'branch_id', 
				'label' => 'Select Branch', 				
				'type' => 'select',
				'options' => $branches,
				'empty'	=> false,					
				'wrapper' => 'col-md-10 nopadding'
			),
			array(
				'input' => 'type', 
				'label' => 'Device Type', 				
				'class' => 'numbers_and_letters',
				'default' => 'POS',					
				'wrapper' => 'col-md-2 nopadding',
				'clear' => 1
			),
			array(
				'input' => 'model_number', 
				'label' => 'Model Number', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-6 nopadding'
			),
			array(
				'input' => 'device_imei', 
				'label' => 'IMEI', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-6 nopadding',
				'clear' => 1
			),
			array(
				'input' => 'device_sn', 
				'label' => 'Serial Number', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-6 nopadding',
			),
			array(
				'input' => 'local_port', 
				'label' => 'Local Port', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-3 nopadding'				
			),
			array(
				'input' => 'keys', 
				'label' => 'Keys', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-3 nopadding',
				'clear' => 1				
			),

			array(
				'input' => 'ip_address', 
				'label' => 'IP Address', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-5 nopadding'
			),
			array(
				'input' => 'mac_address', 
				'label' => 'MAC Address', 				
				'class' => 'numbers_and_letters',
				'wrapper' => 'col-md-5 nopadding'
			),
			array(
				'input' => 'status', 
				'type' => 'select', 
				'label' => 'Status', 
				'options' => $this->Lang->listOfStatus(),
				'empty'		=> false,
				'wrapper' => 'col-md-2 nopadding',
				'clear' => 1
			)
		));
		
		
	?>
	
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save Changes', '#new_terminal_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>
<div class="clear"></div>	


