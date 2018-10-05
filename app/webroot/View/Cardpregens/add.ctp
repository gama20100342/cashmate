<div class="cardpregens form">
<?php echo $this->Form->create('Cardpregen'); ?>
	<fieldset>
		<legend><?php echo __('Add Cardpregen'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('cardno');
		echo $this->Form->input('cardtype');
		echo $this->Form->input('product');
		echo $this->Form->input('institution');
		echo $this->Form->input('date_time');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cardpregens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
