<?php echo $this->App->commonHeader('Add Menu'); ?>
<div class="groups form">
	<div class="col-md-12">
<?php echo $this->Form->create('Groupmenu', array('class' => 'data-form', 'id' => 'new_menu_form')); ?>
	<fieldset>	
		
	<?php
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'name', 
				'label' => 'Menu Name *', 		
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-6'
			)
		));
		
	?>
	
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save', '#new_menu_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>
