<?php echo $this->App->CommonHeaderWithButton(
	'Update Product Information',
	$this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'products', 
		'index'
	)	
	);
?>
<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Products', 		
				'products', 
				'index'
			),			
			$this->App->ShowNormaLink(
				'Manage', 		
				'products', 
				'index'
			),	
			$this->App->ShowNormaLink(
				'Update Product'		
			),
		)
	);
?>

<div class="groups form">
	<div class="col-md-8">
<?php echo $this->Form->create('Product', array('class' => 'data-form', 'id' => 'new_product_form')); ?>
	<fieldset>	
		
	<?php
		echo $this->Form->input('id');
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'name', 
				'label' => 'Name *', 
				'placeholder' => 'e.g. Co-Branded', 
				'class' => 'numbers_and_letters comonkeypress nopadding',
				'wrapper' => 'col-md-10 nopadding'
			),
			array(
				'input' => 'expiration', 
				'label' => 'Expiration *', 				
				'type' 	=> 'select',
				'options'	 => $this->Lang->listOfExpirydate(),
				'empty' => false,
				'class' => 'comonkeypress ',
				'wrapper' => 'col-md-2 nopadding'
			)
		));
		
	?>
	
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save Changes', '#new_product_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>
