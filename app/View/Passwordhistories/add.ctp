<div class="passwordhistories form">
<?php echo $this->Form->create('Passwordhistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Passwordhistory'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('old_password');
		echo $this->Form->input('new_password');
		echo $this->Form->input('change_date');
		echo $this->Form->input('duration');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Passwordhistories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
