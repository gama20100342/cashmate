<div class="groupsettings form">
		<?php echo $this->Form->create('Groupsetting', array('class' => 'form-data', 'id' => 'new_groupsetting_form')); ?>
		<?php echo $this->App->Commonheader('Assign Capabilities'); ?>
		<div class="col-md-12">
			<fieldset>
			<div class="col-md-6 nopadding-left">
			<?php
				echo $this->Form->input('id');
				echo $this->App->showForminputs(array(				
					array('input' => 'name', 'label' => 'Name', 'placeholder' => 'e.g. View User Profile', 'class' => 'letters_only', 'read-only' => true),
				
				));	
	
			 
					echo $this->App->showForminputs(array(				
					
						array('input' => 'groupsettingscategory_id', 'label' => 'Select Category', 'read-only' => true, 'type' => 'select','options'=> $groupsettingscategories),				
						array('input' => 'description', 'label' => 'Description', 'Placeholder' => 'Description', 'read-only' => true, 'type' => 'textarea',  'class' => 'numbers_and_letters'),
					));	
				
				?>

			</div>
			<div class="col-md-6 nopadding">
			<?php
				echo $this->App->showForminputs(array(								
					array('input' => 'controller', 'label' => 'Set Controller', 'read-only' => true, 'placeholder' => 'e.g. reports', 'class' => 'numbers_and_letters'),
					array('input' => 'action', 'label' => 'Set Action', 'read-only' => true, 'placeholder' => 'e.g. generate', 'class' => 'numbers_and_letters'),
					array('input' => 'status_id', 'label' => 'Select Status', 'type' => 'select', 'options' => $statuses, 'empty' => false)
				));			
			?>
			</div>
			</fieldset>
			<?php echo $this->App->formEnd('SAVE CHANGES', '#new_groupsetting_form'); ?>
	</div>
	<div class="clear"></div>
</div>
