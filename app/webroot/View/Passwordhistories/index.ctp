<div class="passwordhistories index">
	<h2><?php echo __('Passwordhistories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('old_password'); ?></th>
			<th><?php echo $this->Paginator->sort('new_password'); ?></th>
			<th><?php echo $this->Paginator->sort('change_date'); ?></th>
			<th><?php echo $this->Paginator->sort('duration'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($passwordhistories as $passwordhistory): ?>
	<tr>
		<td><?php echo h($passwordhistory['Passwordhistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($passwordhistory['User']['id'], array('controller' => 'users', 'action' => 'view', $passwordhistory['User']['id'])); ?>
		</td>
		<td><?php echo h($passwordhistory['Passwordhistory']['old_password']); ?>&nbsp;</td>
		<td><?php echo h($passwordhistory['Passwordhistory']['new_password']); ?>&nbsp;</td>
		<td><?php echo h($passwordhistory['Passwordhistory']['change_date']); ?>&nbsp;</td>
		<td><?php echo h($passwordhistory['Passwordhistory']['duration']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $passwordhistory['Passwordhistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $passwordhistory['Passwordhistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $passwordhistory['Passwordhistory']['id']), array(), __('Are you sure you want to delete # %s?', $passwordhistory['Passwordhistory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Passwordhistory'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
