<div class="deactivateaccounts form">
<?php echo $this->Form->create('Deactivateaccount'); ?>
	<fieldset>
		<legend><?php echo __('Edit Deactivateaccount'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cardholder_id');
		echo $this->Form->input('processed_date');
		echo $this->Form->input('processed_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Deactivateaccount.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Deactivateaccount.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Deactivateaccounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
