<?php echo $this->App->commonHeader('New Type of Transaction'); ?>
<div class="cardtypes form col-md-12">
	<?php echo $this->Form->create('Transactiontype', array('class' => 'form-data', 'id' => 'new_transtype_form')); ?>
	<fieldset>	
	<div class="col-md-6 nopadding-left">
		<?php
			
			echo $this->App->showForminputs(array(				
					array('input' => 'name', 'label' => 'Name', 'class' => 'letters_only'),					
					array('input' => 'status_id', 'label' => 'Set Status', 'empty' => false, 'type' => 'select', 'options' => $statuses)
			));
					
		?>
	</div>	
	</fieldset>
	<?php echo $this->App->formEnd('Save', '#new_transtype_form'); ?>
</div>

