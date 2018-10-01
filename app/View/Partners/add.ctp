<?php echo $this->App->commonHeader('Register New Partner'); ?>
<div class="cardtypes form col-md-12">
	<?php echo $this->Form->create('Partner', array('class' => 'form-data', 'id' => 'new_partner_form')); ?>
	<fieldset>	
	<div class="col-md-6 nopadding-left">
		<?php
			
			echo $this->App->showForminputs(array(				
					array('input' => 'name', 'label' => 'Name', 'class' => 'letters_only'),
					array('input' => 'address', 'label' => 'Alias', 'class' => 'letters_and_numbers', 'type' => 'textarea'),
					array('input' => 'contactno', 'label' => 'Contact No.', 'class' => 'numbers_only'),
					array('input' => 'contact_person', 'label' => 'Contact Person', 'class' => 'letters_only'),
					array('input' => 'telno', 'label' => 'Tel No.', 'class' => 'numbers_only'),
					//array('input' => 'status_id', 'label' => 'Set Status', 'empty' => false, 'type' => 'select', 'options' => $statuses)
			));
					
		?>
	</div>	
	</fieldset>
	<?php echo $this->App->formEnd('Save', '#new_partner_form'); ?>
</div>
