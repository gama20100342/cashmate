<div class="useresetpasswords form">
<?php echo $this->Form->create('Useresetpassword'); ?>
	<fieldset>
		<legend><?php echo __('Edit Useresetpassword'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('date_time');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Useresetpassword.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Useresetpassword.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Useresetpasswords'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
