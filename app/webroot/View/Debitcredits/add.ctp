<div class="debitcredits form">
<?php echo $this->Form->create('Debitcredit'); ?>
	<fieldset>
		<legend><?php echo __('Add Debitcredit'); ?></legend>
	<?php
		echo $this->Form->input('account_name');
		echo $this->Form->input('cardno');
		echo $this->Form->input('cif_no');
		echo $this->Form->input('product');
		echo $this->Form->input('company');
		echo $this->Form->input('debit');
		echo $this->Form->input('credit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Debitcredits'), array('action' => 'index')); ?></li>
	</ul>
</div>
