<?php echo $this->App->CommonHeaderWithButton(
	'Register Branch',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'branches', 
			'index'
		)	
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Branches', 		
				'branches', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'branches', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Register'
			)	
		)
	);
?>

<div class="posdevices form col-md-8">
<?php echo $this->Form->create('Branch', array('class' => 'data-form', 'id' => 'new_branch_form')); ?>
	<fieldset>	
	<?php //if(!empty($posdevices)): ?>
	<h5 class="bold bold m-t-20"><?php echo __('Branch Information'); ?></h5>	
			<?php		
				echo $this->App->showForminputs(array(
					array(
						'input' => 'name', 
						'label' => 'Name *', 
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-9 nopadding'
					),							
					array(
						'input' => 'branchcode', 
						'label' => 'Branch Code',  
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-3 nopadding'
					),/*,		
					array(
						'input' => 'posdevice_id', 
						'label' => 'Select POS Terminal *', 
						'type' => 'select', 
						'options' => $posdevices,						 
						'empty' => false, 
						'class' => 'letters_and_numbers', 
						'wrapper' => 'col-md-3 nopadding'
					),		*/
					array(
						'input' => 'address', 
						'label' => 'Address',  
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-6 nopadding'
					),							
					array(
						'input' => 'branch_manager', 
						'label' => 'Branch Manager', 						
						'class' => 'letters_and_numbers', 
						'wrapper' => 'col-md-6 nopadding'
					),
					array(
						'input' => 'email', 
						'label' => 'Email Address', 
						'empty' => false, 
						'class' => 'letters_and_numbers', 
						'wrapper' => 'col-md-6 nopadding'
					),							
					array(
						'input' => 'tel_no', 
						'label' => 'Tel No.', 
						'empty' => false, 
						'class' => 'letters_and_numbers tel_no', 
						'wrapper' => 'col-md-3 nopadding'
					),		
					
					array(
						'input' => 'contactno', 
						'label' => 'Contact No. (+63)', 
						'empty' => false,   
						'class' => 'letters_and_numbers contact_no', 
						'wrapper' => 'col-md-3 nopadding'
					)						
										
					
					//array('input' => 'status', 'label' => 'Status *', 'empty' => false, 'type' => 'select', 'options' => $this->Lang->listOfStatus(), 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-2 nopadding'),												
				), true);		
				
				echo $this->Form->input('registered', array('type' => 'hidden', 'default' => date('Y-m-d'))); 
			?>
	</fieldset>
	<?php echo $this->App->formEnd('Save', '#new_branch_form'); ?>
	<?php //else: ?>
		<div class="text-center text-danger nodisplay">
			There are no available terminal at the moment <br />
			<?php echo $this->Html->link('Register Terminal', array('controller' => 'posdevices', 'action' => 'add'), array('class' => 'btn btn-success btn-xs', 'escape' => false)); ?>			
		</div>
	<?php //endif; ?>
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("._cardtype").change( function(){
				$("._ptype").val($(this).val());
				$("._ptype").html($(this).val());
			});

			$(".tel_no").inputmask("999-999-9999");
			$(".contact_no").inputmask("9-99-999-9999");
		});
	');
?>