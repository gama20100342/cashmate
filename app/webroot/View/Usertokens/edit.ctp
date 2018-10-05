<div class="usertokens form">
<?php echo $this->Form->create('Usertoken'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usertoken'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('token');
		echo $this->Form->input('expiresIn');
		echo $this->Form->input('refreshToken');
		echo $this->Form->input('lastlogin');
		echo $this->Form->input('logindevice');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usertoken.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Usertoken.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usertokens'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
