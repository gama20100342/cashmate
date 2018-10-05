<div class="uploadpregeneratecards view">
<h2><?php echo __('Uploadpregeneratecard'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uploadpregeneratecard['User']['title'], array('controller' => 'users', 'action' => 'view', $uploadpregeneratecard['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Path'); ?></dt>
		<dd>
			<?php echo h($uploadpregeneratecard['Uploadpregeneratecard']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($uploadpregeneratecard['Uploadpregeneratecard']['date_time']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uploadpregeneratecard'), array('action' => 'edit', $uploadpregeneratecard['Uploadpregeneratecard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uploadpregeneratecard'), array('action' => 'delete', $uploadpregeneratecard['Uploadpregeneratecard']['id']), array(), __('Are you sure you want to delete # %s?', $uploadpregeneratecard['Uploadpregeneratecard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploadpregeneratecards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploadpregeneratecard'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
