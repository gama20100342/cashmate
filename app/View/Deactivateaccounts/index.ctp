<div class="deactivateaccounts index">
	<h2><?php echo __('Deactivateaccounts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('processed_date'); ?></th>
			<th><?php echo $this->Paginator->sort('processed_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($deactivateaccounts as $deactivateaccount): ?>
	<tr>
		<td><?php echo h($deactivateaccount['Deactivateaccount']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deactivateaccount['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $deactivateaccount['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($deactivateaccount['Deactivateaccount']['processed_date']); ?>&nbsp;</td>
		<td><?php echo h($deactivateaccount['Deactivateaccount']['processed_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $deactivateaccount['Deactivateaccount']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $deactivateaccount['Deactivateaccount']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $deactivateaccount['Deactivateaccount']['id']), array(), __('Are you sure you want to delete # %s?', $deactivateaccount['Deactivateaccount']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Deactivateaccount'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
