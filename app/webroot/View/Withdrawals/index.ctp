<div class="withdrawals index">
	<h2><?php echo __('Withdrawals'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transactiontype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transcode'); ?></th>
			<th><?php echo $this->Paginator->sort('card_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('accountname'); ?></th>
			<th><?php echo $this->Paginator->sort('terminal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('transdate'); ?></th>
			<th><?php echo $this->Paginator->sort('remaining_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('withdrawal_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('current_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($withdrawals as $withdrawal): ?>
	<tr>
		<td><?php echo h($withdrawal['Withdrawal']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($withdrawal['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $withdrawal['Transactiontype']['id'])); ?>
		</td>
		<td><?php echo h($withdrawal['Withdrawal']['transcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($withdrawal['Card']['id'], array('controller' => 'cards', 'action' => 'view', $withdrawal['Card']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($withdrawal['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $withdrawal['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($withdrawal['Withdrawal']['accountname']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($withdrawal['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $withdrawal['Terminal']['id'])); ?>
		</td>
		<td><?php echo h($withdrawal['Withdrawal']['transdate']); ?>&nbsp;</td>
		<td><?php echo h($withdrawal['Withdrawal']['remaining_balance']); ?>&nbsp;</td>
		<td><?php echo h($withdrawal['Withdrawal']['withdrawal_amount']); ?>&nbsp;</td>
		<td><?php echo h($withdrawal['Withdrawal']['current_balance']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($withdrawal['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $withdrawal['Status']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $withdrawal['Withdrawal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $withdrawal['Withdrawal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $withdrawal['Withdrawal']['id']), array(), __('Are you sure you want to delete # %s?', $withdrawal['Withdrawal']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
