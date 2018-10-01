<?php echo $this->App->CommonHeader('Register New Card &raquo; <span class="text-success">'.$cardholder['Cardholder']['fullname'].'</span>'); ?>
<div class="cards form col-md-12">
<?php echo $this->Form->create('Card', array('class' => 'form-data', 'id' => 'new_card_form')); ?>
	
	<div class="col-md-6 nopadding-left">
	<?php		
		echo $this->Form->input('refid', array('type' => 'hidden', 'label' => false, 'default' => $refid)); 
		echo $this->Form->input('pincode', array('type' => 'hidden', 'label' => false, 'default' => $pin)); 
		
		echo $this->App->showForminputs(array(				
				array('input' => 'cardno', 'label' => 'Card No.', 'class' => 'numbers_only'),				
				array('input' => 'cardtype_id', 'label' => 'Card Type', 'empty' => false, 'type' => 'select', 'options' => $cardtypes),
				array('input' => 'currency_id', 'label' => 'Currency', 'empty' => false, 'type' => 'select', 'options' => $currencies),
				array('input' => 'pincode_fake', 'label' => 'Personal Identification No. ( PIN )', 'default' => $pin, 'read-only' => true, 'class' => 'numbers_only'),				
			));
			
	?>
	</div>
	<div class="col-md-6 nopadding-right">
	<?php		
		echo $this->App->showForminputs(array(								
				array('input' => 'balance', 'label' => 'Current Balance', 'default' => '0.00', 'class' => 'numbers_and_letters'),
				array('input' => 'cardstatus_id', 'label' => 'Card Status', 'empty' => false, 'type' => 'select', 'options' => $cardstatuses),				
			));
			
	?>
	</div>
	<div class="clear"></div>
	<?php echo $this->App->formEnd('SAVE', '#new_card_form'); ?>
</div>
<div class="clear"></div>
