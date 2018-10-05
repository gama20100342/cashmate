<div class="cardweeklylimits index">
	<h2><?php echo __('Cardweeklylimits'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cardtype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('channel_atm'); ?></th>
			<th><?php echo $this->Paginator->sort('channel_pos'); ?></th>
			<th><?php echo $this->Paginator->sort('channel_bol'); ?></th>
			<th><?php echo $this->Paginator->sort('min_withdrawalvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('min_withdrawalfee'); ?></th>
			<th><?php echo $this->Paginator->sort('max_transvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('max_transfee'); ?></th>
			<th><?php echo $this->Paginator->sort('total_withdrawalvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('total_withdrawalfee'); ?></th>
			<th><?php echo $this->Paginator->sort('total_fundtransvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('total_fundtransfee'); ?></th>
			<th><?php echo $this->Paginator->sort('min_loadingvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('min_loadingfee'); ?></th>
			<th><?php echo $this->Paginator->sort('max_loadingvalue'); ?></th>
			<th><?php echo $this->Paginator->sort('max_loadingfee'); ?></th>
			<th><?php echo $this->Paginator->sort('added'); ?></th>
			<th><?php echo $this->Paginator->sort('addedby'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedby'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cardweeklylimits as $cardweeklylimit): ?>
	<tr>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cardweeklylimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $cardweeklylimit['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cardweeklylimit['Cardtype']['name'], array('controller' => 'cardtypes', 'action' => 'view', $cardweeklylimit['Cardtype']['id'])); ?>
		</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['channel_atm']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['channel_pos']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['channel_bol']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['min_withdrawalvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['min_withdrawalfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['max_transvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['max_transfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['total_withdrawalvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['total_withdrawalfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['total_fundtransvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['total_fundtransfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['min_loadingvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['min_loadingfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['max_loadingvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['max_loadingfee']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['added']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['addedby']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['modified']); ?>&nbsp;</td>
		<td><?php echo h($cardweeklylimit['Cardweeklylimit']['modifiedby']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cardweeklylimit['Cardweeklylimit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardweeklylimit['Cardweeklylimit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardweeklylimit['Cardweeklylimit']['id']), array(), __('Are you sure you want to delete # %s?', $cardweeklylimit['Cardweeklylimit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cardweeklylimit'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
