<div class="cardstatuses view">
<h2><?php echo __('Cardstatus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardstatus['Cardstatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cardstatus['Cardstatus']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardstatus['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $cardstatus['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($cardstatus['Cardstatus']['color']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardstatus'), array('action' => 'edit', $cardstatus['Cardstatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardstatus'), array('action' => 'delete', $cardstatus['Cardstatus']['id']), array(), __('Are you sure you want to delete # %s?', $cardstatus['Cardstatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('controller' => 'cardapplications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cardapplications'); ?></h3>
	<?php if (!empty($cardstatus['Cardapplication'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Refid'); ?></th>
		<th><?php echo __('Cardstatus Id'); ?></th>
		<th><?php echo __('Registered'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardstatus['Cardapplication'] as $cardapplication): ?>
		<tr>
			<td><?php echo $cardapplication['id']; ?></td>
			<td><?php echo $cardapplication['refid']; ?></td>
			<td><?php echo $cardapplication['cardstatus_id']; ?></td>
			<td><?php echo $cardapplication['registered']; ?></td>
			<td><?php echo $cardapplication['user_id']; ?></td>
			<td><?php echo $cardapplication['branch_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cardapplications', 'action' => 'view', $cardapplication['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cardapplications', 'action' => 'edit', $cardapplication['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cardapplications', 'action' => 'delete', $cardapplication['id']), array(), __('Are you sure you want to delete # %s?', $cardapplication['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cards'); ?></h3>
	<?php if (!empty($cardstatus['Card'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cardapplication Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardstatus Id'); ?></th>
		<th><?php echo __('Refno'); ?></th>
		<th><?php echo __('Cardtype Id'); ?></th>
		<th><?php echo __('Last Transaction'); ?></th>
		<th><?php echo __('Pincode'); ?></th>
		<th><?php echo __('Balance'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardstatus['Card'] as $card): ?>
		<tr>
			<td><?php echo $card['id']; ?></td>
			<td><?php echo $card['cardapplication_id']; ?></td>
			<td><?php echo $card['cardno']; ?></td>
			<td><?php echo $card['cardstatus_id']; ?></td>
			<td><?php echo $card['refno']; ?></td>
			<td><?php echo $card['cardtype_id']; ?></td>
			<td><?php echo $card['last_transaction']; ?></td>
			<td><?php echo $card['pincode']; ?></td>
			<td><?php echo $card['balance']; ?></td>
			<td><?php echo $card['currency_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cards', 'action' => 'view', $card['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cards', 'action' => 'edit', $card['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cards', 'action' => 'delete', $card['id']), array(), __('Are you sure you want to delete # %s?', $card['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
