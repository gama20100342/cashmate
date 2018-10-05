<div class="useravatars view">
<h2><?php echo __('Useravatar'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($useravatar['Useravatar']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($useravatar['User']['id'], array('controller' => 'users', 'action' => 'view', $useravatar['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refid'); ?></dt>
		<dd>
			<?php echo h($useravatar['Useravatar']['refid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($useravatar['Useravatar']['added']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Useravatar'), array('action' => 'edit', $useravatar['Useravatar']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Useravatar'), array('action' => 'delete', $useravatar['Useravatar']['id']), array(), __('Are you sure you want to delete # %s?', $useravatar['Useravatar']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Useravatars'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Useravatar'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
