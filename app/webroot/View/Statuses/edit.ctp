<div class="statuses form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend><?php echo __('Edit Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Status.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Status.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('controller' => 'cardstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupsettings'), array('controller' => 'groupsettings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupsetting'), array('controller' => 'groupsettings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('controller' => 'transbillspayments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transcashouts'), array('controller' => 'transcashouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transchangepins'), array('controller' => 'transchangepins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transchangepin'), array('controller' => 'transchangepins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Withdrawals'), array('controller' => 'withdrawals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
	</ul>
</div>
