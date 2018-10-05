<?php echo $this->App->CommonHeader('Register New Card'); ?>
<div class="cards form">
<?php echo $this->Form->create('Card'); ?>
	<fieldset>
	<?php

		echo $this->Form->input('cardno');
		echo $this->Form->input('cardstatus_id');
		echo $this->Form->input('refno');
		echo $this->Form->input('cardtype_id');
		echo $this->Form->input('last_transaction');
		echo $this->Form->input('pincode');
		echo $this->Form->input('balance');
		echo $this->Form->input('currency_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('controller' => 'cardapplications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('controller' => 'cardstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
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
