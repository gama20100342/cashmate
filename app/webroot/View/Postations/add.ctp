<div class="postations form">
<?php echo $this->Form->create('Postation'); ?>
	<fieldset>
		<legend><?php echo __('Add Postation'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('alias');
		echo $this->Form->input('branch_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Postations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('controller' => 'transbillspayments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
