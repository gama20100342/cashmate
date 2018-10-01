<?php echo $this->App->CommonHeaderWithButton(
	'Add Product Limit Cycle &raquo; '.$prd['Product']['name'],	
	$this->App->modalViewLinkCustom($this->webroot."products/view/".$productid, "Back", "reply", "#products_limit_").'
	<a href="#" data-dismiss="modal" class="btn btn-xs btn-danger pull-left fs-10"><i class="fas fa-times fa-lg"></i> Close</a>'

); ?>


<div class="productlimits form col-md-12">
<?php echo $this->Form->create('Productlimit', array('class' => 'data-form', 'id' => 'new_cycle_limit')); ?>
	<fieldset>
	<h5 class="bold"><?php echo __('Limit Cycle Information'); ?></h5>
	<?php
	
			echo $this->App->showForminputs(array(						
				array('input' => 'product_id', 'label' => 'Product *', 'type' => 'select', 'options' => $products, 'empty' => false, 'wrapper' => 'col-md-3 nopadding', 'clear' => true),
				array('input' => 'name', 'label' => 'Type of Limits *', 'type' => 'select', 'options' => $this->Lang->listOfCycleLimit(), 'empty' => false, 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'cardtype_id', 'label' => 'Card Type *', 'type' => 'select', 'options' => $cardtypes, 'empty' => false, 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'limit_cycle', 'label' => 'Limit Cycle *', 'type' => 'select', 'options' => $this->Lang->listLimitCycle(), 'empty' => false, 'wrapper' => 'col-md-3 nopadding'),				
				array('input' => 'limit_value', 'label' => 'Limit Cycle Value*', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'limit_fees', 'label' => 'Limit Cycle Fees*', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'channels', 'label' => 'Channels *', 'type' => 'select', 'options' => $this->Lang->listOfChannels(),  'empty' => false, 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'expiry_date', 'label' => 'Expiry Date *', 'type' => 'select', 'options' => $this->Lang->listOfExpirydate(),  'empty' => false, 'wrapper' => 'col-md-3 nopadding')
			));
						
	?>
	</fieldset>
	<?php echo $this->App->formEndAjax('Save', '#new_cycle_limit', $this->webroot.'productlimits/saveProductLimit/'); ?>
</div>
<div class="clear"></div>
