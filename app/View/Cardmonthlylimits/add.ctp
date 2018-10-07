<?php echo $this->App->CommonHeaderWithButton(
	$prd['Product']['name'].' &raquo; Add Product Monthly Cycle Limit',	
	$this->App->Showbutton(
						'Back', 
						'btn-violet pull-left fs-10', 
						'products', 
						'view/'.$prd['Product']['id'].'/'.$duration,
						'reply'
					)
); ?>

<div class="col-md-12">
		<h3 class="text-violet nopadding">
			<?php echo $prd['Product']['name']; ?>
			<div class="fs-11 bold text-danger"> Monthly Cycle Limit</div>
		</h3>		
		<div class="clear m-t-10"></div>				
</div>
<div class="clear"></div>

<div class="carddailylimits form col-md-12">
<?php echo $this->Form->create('Cardmonthlylimit', array('class' => 'data-form', 'id' => 'new_limit_form')); ?>

	<fieldset>
	
	<?php
		echo $this->Form->hidden('added', array('type' => 'hidden', 'default' => date('Y-m-d'))); 
		echo $this->Form->hidden('addedby', array('type' => 'hidden', 'default' => $author)); 
		
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'product_id', 
				'label' => 'Product Type', 
				'type' => 'select', 
				'empty' => false, 
				'options' => $products, 
				'wrapper' => 'col-md-3'
			),
			array(
				'input' => 'cardtype_id', 
				'label' => 'Card Type', 
				'type' => 'select', 
				'empty' => false, 
				'options' => $cardtypes, 
				'wrapper' => 'col-md-3'		
			),
			array(
				'input' => 'expiry_date', 
				'label' => 'Expiry Date', 
				'type' => 'select', 
				'empty' => false, 
				'options' => $this->Lang->listOfExpirydate(), 
				'wrapper' => 'col-md-3'		
			)
		));
	?>
	<div class="col-md-3 nopadding">	
		<h5 class="fs-12 text-danger"><?php echo __('Channels'); ?></h5>
		
		<label class="checkbox-inline text-uppercase text-success fs-10 bold col-md-3">
			<?php echo $this->Form->input('channel_atm', array('label' => false, 'type' => 'checkbox', 'default' => 0, 'class' => 'nomargin')); ?>
			<div class="m-l-15">ATM</div>		
		</label>
		<label class="checkbox-inline text-uppercase text-success fs-10 bold col-md-3">
			<?php echo $this->Form->input('channel_pos', array('label' => false, 'type' => 'checkbox', 'default' => 0, 'class' => 'nomargin')); ?>
			<div class="m-l-15">POS</div>		
		</label>
		<label class="checkbox-inline text-uppercase text-success fs-10 bold col-md-3">
			<?php echo $this->Form->input('channel_bol', array('label' => false, 'type' => 'checkbox', 'default' => 0, 'class' => 'nomargin')); ?>
			<div class="m-l-15">BOL</div>						
		</label>

				
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Minimum Withdrawal'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(			
			array(
				'input' => 'min_withdrawalvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'min_withdrawalfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
	?>
	</div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Maximum Amount per Transaction'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(		
			array(
				'input' => 'max_transvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'max_transfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
		
	
			
	?>
	</div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Total Amount for Cash Withdrawal'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(		
			array(
				'input' => 'total_withdrawalvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'total_withdrawalfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
	?>
	</div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Total Amount for Fund Transfer'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(		
			array(
				'input' => 'total_fundtransvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'total_fundtransfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
	?>
	</div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Minimum Loading'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(		
			array(
				'input' => 'min_loadingvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'min_loadingfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
		
	
			
	?>
	</div>
	<div class="col-md-3 nopadding m-t-10">		
		<h5 class="fs-12 text-danger"><?php echo __('Maximum Loading'); ?></h5>
	<?php
		echo $this->App->showForminputs(array(		
			array(
				'input' => 'max_loadingvalue', 
				'label' => 'Limit Cycle Value', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'max_loadingfee', 
				'label' => 'Limit Fees', 
				'class' => 'numbers_only',
				'wrapper' => 'col-md-6'
			)
		));
			
	?>
	</div>
	<div class="clear"></div>
	</fieldset>
	
	<?php echo $this->App->formEnd('Save', '#new_limit_form'); ?>
	
</div>
<div class="clear"></div>


