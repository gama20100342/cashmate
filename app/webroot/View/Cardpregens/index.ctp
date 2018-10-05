<div class="cardpregens index">
	<h2><?php echo __('Cardpregens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardno'); ?></th>
			<th><?php echo $this->Paginator->sort('cardtype'); ?></th>
			<th><?php echo $this->Paginator->sort('product'); ?></th>
			<th><?php echo $this->Paginator->sort('institution'); ?></th>
			<th><?php echo $this->Paginator->sort('date_time'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cardpregens as $cardpregen): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($cardpregen['User']['title'], array('controller' => 'users', 'action' => 'view', $cardpregen['User']['id'])); ?>
		</td>
		<td><?php echo h($cardpregen['Cardpregen']['cardno']); ?>&nbsp;</td>
		<td><?php echo h($cardpregen['Cardpregen']['cardtype']); ?>&nbsp;</td>
		<td><?php echo h($cardpregen['Cardpregen']['product']); ?>&nbsp;</td>
		<td><?php echo h($cardpregen['Cardpregen']['institution']); ?>&nbsp;</td>
		<td><?php echo h($cardpregen['Cardpregen']['date_time']); ?>&nbsp;</td>
		<td><?php echo h($cardpregen['Cardpregen']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cardpregen['Cardpregen']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardpregen['Cardpregen']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardpregen['Cardpregen']['id']), array(), __('Are you sure you want to delete # %s?', $cardpregen['Cardpregen']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cardpregen'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
