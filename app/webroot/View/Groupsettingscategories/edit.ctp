<div class="groupsettingscategories form">
<?php echo $this->Form->create('Groupsettingscategory', array('class' => 'form-data', 'id' => 'new_groupcat_form')); ?>
	<fieldset>
		<legend><?php echo __('NEW ACCESS CATEGORY'); ?></legend>
		<div class="col-md-6">
	<?php
		echo $this->Form->input('id');
		echo $this->App->showForminputs(array(				
			array('input' => 'name', 'label' => 'Category Name <br /> <div class="fs-10"> ( Please specify the Access Category )</div>', 'placeholder' => 'e.g. Access Management', 'class' => 'numbers_and_letters')
		));
		
	?>
	</div>
	</fieldset>
	<?php echo $this->App->formEnd('SAVE CHANGES', '#new_groupcat_form'); ?>
</div>
