<?php echo $this->App->CommonHeader('Update Device', $breadcrumbs, $this->request['controller']); ?>
<div class="posdevices form col-md-12">
<?php echo $this->Form->create('Posdevice', array('class' => 'data-form', 'id' => 'new_posdevice_form')); ?>
	<fieldset>
	<h5 class="bold bold m-t-20"><?php echo __('Device Information'); ?></h5>		
			<?php		
				echo $this->Form->input('id'); 
				echo $this->App->showForminputs(array(
					array('input' => 'model', 'label' => 'Item Model', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'sn', 'label' => 'Serial Number *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'imei', 'label' => 'IMEI *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'status', 'label' => 'Device Status *', 'empty' => false, 'type' => 'select', 'options' => $this->Lang->listOfStatus(), 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-3 nopadding'),							
				), true);		
			?>
	</fieldset>
	<div class="m-t-50"></div>
	<?php echo $this->App->formEnd('Save Changes', '#new_posdevice_form'); ?>
	<div class="clear"></div>
	<div class="p-t-20"></div>
</div>
<div class="clear"></div>
