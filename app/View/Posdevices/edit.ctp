<?php //echo $this->App->CommonHeader('Register Terminal', $breadcrumbs, $this->request['controller']); ?>

<?php echo $this->App->CommonHeaderWithButton(
	'Update Terminals',
	$this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'posdevices', 
		'index'
	)	
); ?>


<div class="posdevices form col-md-12">
<?php echo $this->Form->create('Posdevice', array('class' => 'data-form', 'id' => 'new_posdevice_form')); ?>
	<fieldset>
	<h5 class="bold bold m-t-20"><?php echo __('Terminal Information'); ?></h5>
	
			<?php		
				echo $this->Form->input('id');
				echo $this->App->showForminputs(array(
					array('input' => 'name', 'label' => 'Name *', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'model', 'label' => 'Item Model *', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'sn', 'label' => 'Serial Number *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'imei', 'label' => 'IMEI *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => true),							
					array('input' => 'ip', 'label' => 'IP Address *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'mac', 'label' => 'MAC Address *',  'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => true)
				), true);		
			?>
	</fieldset>	
	<?php echo $this->App->formEnd('Save', '#new_posdevice_form'); ?>	
</div>
<div class="clear"></div>
