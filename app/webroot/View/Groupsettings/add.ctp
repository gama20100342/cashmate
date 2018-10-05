<div class="groupsettings form">
		<?php echo $this->Form->create('Groupsetting', array('class' => 'form-data', 'id' => 'new_groupsetting_form')); ?>
		<?php echo $this->App->Commonheader('Assign Capabilities'); ?>
		<div class="col-md-12">
			<fieldset>
			<div class="col-md-6 nopadding-left">
			<?php
				echo $this->App->showForminputs(array(				
					array('input' => 'name', 'label' => 'Name', 'placeholder' => 'e.g. View User Profile', 'class' => 'letters_only'),
				
				));	
			
			 echo '<div class="col-md-12 text-success fs-10 bold nopadding"><label for="">SELECT GROUP(S) OF USER</label></div>';
			 echo '<div class="col-md-12 nopadding">';
			 foreach($groups as $key => $group): 

			?>
				<label class="checkbox-inline text-uppercase text-success fs-10 bold">
						<input type="checkbox" name="data[Groupsetting][group_id][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $group; ?></div>
						<?php //echo $this->Form->checkbox('group_id.', array('value' => $key)); ?><?php //echo $group; ?>
				</label>
				<div class="clear"></div>
				<?php 
				
			endforeach; 
				echo '</div>';
				echo '<div class="clear p-b-10"></div>';

					echo $this->App->showForminputs(array(				
					
						array('input' => 'groupsettingscategory_id', 'label' => 'Select Category', 'type' => 'select','options'=> $groupsettingscategories),				
						array('input' => 'description', 'label' => 'Description', 'Placeholder' => 'Description', 'type' => 'textarea',  'class' => 'numbers_and_letters'),
					));	
				
				?>

			</div>
			<div class="col-md-6 nopadding">
			
		
			<?php 
				 echo '<div class="col-md-12 text-success fs-10 bold nopadding"><label for="">SET ACTIONS</label></div>';
				echo '<div class="col-md-12 nopadding">';
				foreach($this->Lang->listofViews() as $key => $v): 

			?>
				<label class="checkbox-inline text-uppercase text-success fs-10 bold">
						<input type="checkbox" name="data[Groupsetting][action][]" value="<?php echo $v; ?>"><div class="m-t-3"><?php echo $v; ?></div>
						
				</label>
				<div class="clear"></div>
				<?php 
				
			endforeach; 
				echo '</div>';
			?>
			
			<?php
				echo $this->App->showForminputs(array(								
					array('input' => 'controller', 'label' => 'Set Controller', 'type' => 'select','options'=> $this->Lang->listofController()),				
					//array('input' => 'action', 'label' => 'Set Action ( Separated by Comma(,) )', 'placeholder' => 'e.g. add, edit, delete'),
					array('input' => 'status_id', 'label' => 'Select Status', 'type' => 'select', 'options' => $statuses, 'empty' => false)
				));			
			?>
				</div>
			</fieldset>
			<?php echo $this->App->formEnd('Save', '#new_groupsetting_form'); ?>
	</div>
	<div class="clear"></div>
</div>
