<div class="approvedaccounts index">
	<h2><?php echo __('Approvedaccounts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardholder_id'); ?></th>
			<th><?php echo $this->Paginator->sort('approved_date'); ?></th>
			<th><?php echo $this->Paginator->sort('approved_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($approvedaccounts as $approvedaccount): ?>
	<tr>
		<td><?php echo h($approvedaccount['Approvedaccount']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($approvedaccount['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $approvedaccount['Cardholder']['id'])); ?>
		</td>
		<td><?php echo h($approvedaccount['Approvedaccount']['approved_date']); ?>&nbsp;</td>
		<td><?php echo h($approvedaccount['Approvedaccount']['approved_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $approvedaccount['Approvedaccount']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $approvedaccount['Approvedaccount']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $approvedaccount['Approvedaccount']['id']), array(), __('Are you sure you want to delete # %s?', $approvedaccount['Approvedaccount']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Approvedaccount'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
