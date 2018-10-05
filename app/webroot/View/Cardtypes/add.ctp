<?php echo $this->App->commonHeader('New Card Type'); ?>
<div class="cardtypes form col-md-12">
	<?php echo $this->Form->create('Cardtype', array('class' => 'form-data', 'id' => 'new_cardtype_form')); ?>
	<fieldset>	
	<div class="col-md-6 nopadding-left">
		<?php
			
			echo $this->App->showForminputs(array(				
					array('input' => 'name', 'label' => 'Name', 'class' => 'letters_only'),
					array('input' => 'alias', 'label' => 'Alias', 'class' => 'letters_only'),
					array('input' => 'status_id', 'label' => 'Set Status', 'empty' => false, 'type' => 'select', 'options' => $statuses)
			));
					
		?>
	</div>	
	</fieldset>
	<?php echo $this->App->formEnd('SAVE', '#new_cardtype_form'); ?>
</div>
