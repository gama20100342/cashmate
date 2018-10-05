<div class="transbillspayments form">
<?php echo $this->Form->create('Transbillspayment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transbillspayment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('transactiontype_id');
		echo $this->Form->input('transcode');
		echo $this->Form->input('card_id');
		echo $this->Form->input('cardholder_id');
		echo $this->Form->input('accountname');
		echo $this->Form->input('partner_id');
		echo $this->Form->input('terminal_id');
		echo $this->Form->input('postation_id');
		echo $this->Form->input('accountnumber');
		echo $this->Form->input('transdate');
		echo $this->Form->input('remaining_balance');
		echo $this->Form->input('amount_due');
		echo $this->Form->input('customer_charge');
		echo $this->Form->input('partner_charge');
		echo $this->Form->input('total_amount');
		echo $this->Form->input('status_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transbillspayment.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Transbillspayment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partners'), array('controller' => 'partners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partner'), array('controller' => 'partners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
