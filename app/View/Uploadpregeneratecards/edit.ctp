<div class="uploadpregeneratecards form">
<?php echo $this->Form->create('Uploadpregeneratecard'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uploadpregeneratecard'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('path');
		echo $this->Form->input('date_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Uploadpregeneratecard.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Uploadpregeneratecard.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Uploadpregeneratecards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
