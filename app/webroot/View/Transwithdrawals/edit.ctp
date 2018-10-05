<div class="transwithdrawals form">
<?php echo $this->Form->create('Transwithdrawal'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transwithdrawal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('card_id');
		echo $this->Form->input('card_number');
		echo $this->Form->input('cardholder_id');
		echo $this->Form->input('account_name');
		echo $this->Form->input('trace_number');
		echo $this->Form->input('transaction_type');
		echo $this->Form->input('processing_code');
		echo $this->Form->input('channels');
		echo $this->Form->input('acquirer_institution');
		echo $this->Form->input('response');
		echo $this->Form->input('transaction_amount');
		echo $this->Form->input('service_charge');
		echo $this->Form->input('transaction_date');
		echo $this->Form->input('terminal_id');
		echo $this->Form->input('status');
		echo $this->Form->input('username');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transwithdrawal.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Transwithdrawal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transwithdrawals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
	</ul>
</div>
