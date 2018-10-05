<div class="debitcredits index">
	<h2><?php echo __('Debitcredits'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_name'); ?></th>
			<th><?php echo $this->Paginator->sort('cardno'); ?></th>
			<th><?php echo $this->Paginator->sort('cif_no'); ?></th>
			<th><?php echo $this->Paginator->sort('product'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th><?php echo $this->Paginator->sort('debit'); ?></th>
			<th><?php echo $this->Paginator->sort('credit'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($debitcredits as $debitcredit): ?>
	<tr>
		<td><?php echo h($debitcredit['Debitcredit']['id']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['account_name']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['cardno']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['cif_no']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['product']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['company']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['debit']); ?>&nbsp;</td>
		<td><?php echo h($debitcredit['Debitcredit']['credit']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $debitcredit['Debitcredit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $debitcredit['Debitcredit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $debitcredit['Debitcredit']['id']), array(), __('Are you sure you want to delete # %s?', $debitcredit['Debitcredit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Debitcredit'), array('action' => 'add')); ?></li>
	</ul>
</div>
