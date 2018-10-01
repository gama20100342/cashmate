<?php echo $this->App->CommonHeaderWithButton(
	'Update Merchant',
	$this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'merchants', 
		'index'
	)	
	);
?>
<div class="posdevices form col-md-12">
<?php echo $this->Form->create('Merchant', array('class' => 'data-form', 'id' => 'new_merchant_form')); ?>
	<fieldset>
	<?php if(!empty($posdevices)): ?>
	<h5 class="bold bold m-t-20"><?php echo __('Merchant Information'); ?></h5>
			<?php		
				echo $this->Form->input('id');
				
				echo $this->App->showForminputs(array(
					array(
						'input' => 'name', 
						'label' => 'Name *', 
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-6 nopadding'
					),							
					array(
						'input' => 'owner', 
						'label' => 'Owner',  
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-6 nopadding'
					),							
					array(
						'input' => 'code', 
						'label' => 'Code *',  
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-3 nopadding'
					),							
					array(
						'input' => 'address', 
						'label' => 'Address',  
						'class' => 'numbers_and_letters', 
						'wrapper' => 'col-md-9 nopadding'
					),							
					/*array(
						'input' => 'posdevice_id', 
						'label' => 'Assign POS Device *', 
						'type' => 'select', 
						'options' => $posdevices,						 
						'empty' => false, 
						'class' => 'letters_and_numbers', 
						'wrapper' => 'col-md-3 nopadding'
					),	*/						
					array(
						'input' => 'tel_no', 
						'label' => 'Tel No.', 
						'empty' => false, 
						'class' => 'letters_and_numbers tel_no', 
						'wrapper' => 'col-md-3 nopadding'
					),							
					array(
						'input' => 'contact_no', 
						'label' => 'Contact No. (+63)', 
						'empty' => false,   
						'class' => 'letters_and_numbers contact_no', 
						'wrapper' => 'col-md-3 nopadding'
					),							
					array(
						'input' => 'email', 
						'label' => 'Email Address', 
						'empty' => false, 
						'class' => 'letters_and_numbers', 
						'wrapper' => 'col-md-3 nopadding'
					)
					//array('input' => 'status', 'label' => 'Status *', 'empty' => false, 'type' => 'select', 'options' => $this->Lang->listOfStatus(), 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-1 nopadding'),												
				), true);		
				
				//echo $this->Form->hidden('registered', array('type' => 'hidden', 'default' => date('Y-m-d'))); 
				//echo $this->Form->hidden('status', array('type' => 'hidden', 'default' => 'Active')); 
			?>
	</fieldset>
	
	<?php echo $this->App->formEnd('Save', '#new_merchant_form'); ?>
		<?php else: ?>
		<div class="text-center text-danger">
			There are no available terminal at the moment <br />
			<?php echo $this->Html->link('Register Terminal', array('controller' => 'posdevices', 'action' => 'add'), array('class' => 'btn btn-success btn-xs', 'escape' => false)); ?>			
		</div>
	<?php endif; ?>
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
			$(".contact_no").inputmask("999-999-9999");
		});
	');
?>