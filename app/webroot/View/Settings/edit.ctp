<?php echo $this->App->CommonHeaderWithButton(
	'BRB Info Settings'
	
); ?>

<div class="users form col-md-12">
<?php echo $this->Form->create('Setting', array('id' => 'system_setting')); ?>
	<fieldset>
	<div class="col-md-12 nopadding">
		<h5 class="bold"><?php echo __('Bank Information'); ?></h5>
	<?php
			echo $this->Form->input('id');
			echo $this->App->showForminputs(array(									
					array('input' => 'name', 'label' => 'Bank Name *', 'type' => 'text', 'wrapper' => 'col-md-12',  'class' => 'letters_and_numbers'),
					array('input' => 'address1', 'label' => 'Address 1 * ', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-6'),
					array('input' => 'address2', 'label' => 'Address 2 * ', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-6'),
					array('input' => 'bin', 'label' => 'BIN *', 'class' => 'numbers_only', 'wrapper' => 'col-md-4'),
					array('input' => 'currency_account', 'label' => 'Currency of Account', 'class' => 'letters_only', 'wrapper' => 'col-md-4'),				
					array('input' => 'tel_no', 'label' => 'Telephone No', 'class' => 'tel_no', 'wrapper' => 'col-md-4'),									
				), true);	
	?>


	</div>
	<div class="clear"></div>

	</fieldset>
	<?php echo $this->App->formEnd('Save Changes', '#system_setting'); ?>
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
