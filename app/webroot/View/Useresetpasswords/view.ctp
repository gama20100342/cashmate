<div class="useresetpasswords view">
<h2><?php echo __('Useresetpassword'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($useresetpassword['User']['title'], array('controller' => 'users', 'action' => 'view', $useresetpassword['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($useresetpassword['Useresetpassword']['date_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Useresetpassword'), array('action' => 'edit', $useresetpassword['Useresetpassword']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Useresetpassword'), array('action' => 'delete', $useresetpassword['Useresetpassword']['id']), array(), __('Are you sure you want to delete # %s?', $useresetpassword['Useresetpassword']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Useresetpasswords'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Useresetpassword'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
