<div class="userattempts view">
<h2><?php echo __('Userattempt'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userattempt['User']['title'], array('controller' => 'users', 'action' => 'view', $userattempt['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($userattempt['Userattempt']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($userattempt['Userattempt']['date_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($userattempt['Userattempt']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Userattempt'), array('action' => 'edit', $userattempt['Userattempt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Userattempt'), array('action' => 'delete', $userattempt['Userattempt']['id']), array(), __('Are you sure you want to delete # %s?', $userattempt['Userattempt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Userattempts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userattempt'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
