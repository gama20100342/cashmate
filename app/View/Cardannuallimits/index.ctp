<div class="cardannuallimits index">
	<h2><?php echo __('Cardannuallimits'); ?></h2>
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
	<?php foreach ($cardannuallimits as $cardannuallimit): ?>
	<tr>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cardannuallimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $cardannuallimit['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cardannuallimit['Cardtype']['name'], array('controller' => 'cardtypes', 'action' => 'view', $cardannuallimit['Cardtype']['id'])); ?>
		</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['channel_atm']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['channel_pos']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['channel_bol']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['min_withdrawalvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['min_withdrawalfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['max_transvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['max_transfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['total_withdrawalvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['total_withdrawalfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['total_fundtransvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['total_fundtransfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['min_loadingvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['min_loadingfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['max_loadingvalue']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['max_loadingfee']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['added']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['addedby']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['modified']); ?>&nbsp;</td>
		<td><?php echo h($cardannuallimit['Cardannuallimit']['modifiedby']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cardannuallimit['Cardannuallimit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardannuallimit['Cardannuallimit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardannuallimit['Cardannuallimit']['id']), array(), __('Are you sure you want to delete # %s?', $cardannuallimit['Cardannuallimit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Cardannuallimit'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
