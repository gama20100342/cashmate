<div class="passwordhistories view">
<h2><?php echo __('Passwordhistory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($passwordhistory['Passwordhistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($passwordhistory['User']['id'], array('controller' => 'users', 'action' => 'view', $passwordhistory['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Password'); ?></dt>
		<dd>
			<?php echo h($passwordhistory['Passwordhistory']['old_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('New Password'); ?></dt>
		<dd>
			<?php echo h($passwordhistory['Passwordhistory']['new_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Change Date'); ?></dt>
		<dd>
			<?php echo h($passwordhistory['Passwordhistory']['change_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Duration'); ?></dt>
		<dd>
			<?php echo h($passwordhistory['Passwordhistory']['duration']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Passwordhistory'), array('action' => 'edit', $passwordhistory['Passwordhistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Passwordhistory'), array('action' => 'delete', $passwordhistory['Passwordhistory']['id']), array(), __('Are you sure you want to delete # %s?', $passwordhistory['Passwordhistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Passwordhistories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Passwordhistory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
