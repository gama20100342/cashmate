<?php echo $this->App->CommonHeaderWithButton(
	'Update Product Daily Cycle Limit',	
	$this->App->Showbutton(
						'Back', 
						'btn-violet pull-left fs-10', 
						'products', 
						'view/'.$productid.'/'.$duration,
						'reply'
					)
); ?>


<div class="carddailylimits form col-md-12">
<?php echo $this->Form->create('Carddailylimit', array('class' => 'data-form', 'id' => 'new_updatelimit_form')); ?>

	<fieldset>
	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('modified', array('type' => 'hidden', 'default' => date('Y-m-d'))); 
		echo $this->Form->hidden('modifiedby', array('type' => 'hidden', 'default' => $author)); 
		
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'product_id', 
				'label' => 'Product Type', 
				'type' => 'select', 
				'empty' => false, 
				'class' => 'noborder',
				'options' => $products, 
				'wrapper' => 'col-md-3',
				'read-only' => true
			),
			array(
				'input' => 'cardtype_id', 
				'label' => 'Card Type', 
				'type' => 'select', 
				'empty' => false, 
				'class' => 'noborder',
				'options' => $cardtypes, 
				'wrapper' => 'col-md-3',
				'read-only' => true
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
			<?php echo $this->Form->input('channel_atm', array('label' => false, 'type' => 'checkbox', 'class' => 'nomargin')); ?>
			<div class="m-l-15">ATM</div>		
		</label>
		<label class="checkbox-inline text-uppercase text-success fs-10 bold col-md-3">
			<?php echo $this->Form->input('channel_pos', array('label' => false, 'type' => 'checkbox', 'class' => 'nomargin')); ?>
			<div class="m-l-15">POS</div>		
		</label>
		<label class="checkbox-inline text-uppercase text-success fs-10 bold col-md-3">
			<?php echo $this->Form->input('channel_bol', array('label' => false, 'type' => 'checkbox', 'class' => 'nomargin')); ?>
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
				'class' => '',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'min_withdrawalfee', 
				'label' => 'Limit Fees', 
				'class' => 'currency_only',
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
				'class' => 'currency_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'max_transfee', 
				'label' => 'Limit Fees', 
				'class' => 'currency_only',
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
				'class' => 'currency_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'total_withdrawalfee', 
				'label' => 'Limit Fees', 
				'class' => 'currency_only',
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
				'class' => 'currency_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'total_fundtransfee', 
				'label' => 'Limit Fees', 
				'class' => 'currency_only',
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
					'class' => 'currency_only',
					'wrapper' => 'col-md-6'
				),
				array(
					'input' => 'min_loadingfee', 
					'label' => 'Limit Fees', 
					'class' => 'currency_only',
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
				'class' => 'currency_only',
				'wrapper' => 'col-md-6'
			),
			array(
				'input' => 'max_loadingfee', 
				'label' => 'Limit Fees', 
				'class' => 'currency_only',
				'wrapper' => 'col-md-6'
			)
		));
			
	?>
	</div>
	<div class="clear"></div>
	</fieldset>
	
	<?php echo $this->App->formEnd('Save Changes', '#new_updatelimit_form'); ?>
	
</div>
<div class="clear"></div>


