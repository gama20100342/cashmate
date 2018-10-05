<div class="approvedaccounts form">
<?php echo $this->Form->create('Approvedaccount'); ?>
	<fieldset>
		<legend><?php echo __('Add Approvedaccount'); ?></legend>
	<?php
		echo $this->Form->input('cardholder_id');
		echo $this->Form->input('approved_date');
		echo $this->Form->input('approved_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Approvedaccounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
