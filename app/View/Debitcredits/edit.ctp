<div class="debitcredits form">
<?php echo $this->Form->create('Debitcredit'); ?>
	<fieldset>
		<legend><?php echo __('Edit Debitcredit'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Debitcredit.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Debitcredit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Debitcredits'), array('action' => 'index')); ?></li>
	</ul>
</div>
