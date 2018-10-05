<div class="atmstations view">
<h2><?php echo __('Atmstation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($atmstation['Atmstation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($atmstation['Atmstation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($atmstation['Atmstation']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($atmstation['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $atmstation['Branch']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Atmstation'), array('action' => 'edit', $atmstation['Atmstation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Atmstation'), array('action' => 'delete', $atmstation['Atmstation']['id']), array(), __('Are you sure you want to delete # %s?', $atmstation['Atmstation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transcashouts'), array('controller' => 'transcashouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transbalanceinquiries'); ?></h3>
	<?php if (!empty($atmstation['Transbalanceinquiry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($atmstation['Transbalanceinquiry'] as $transbalanceinquiry): ?>
		<tr>
			<td><?php echo $transbalanceinquiry['id']; ?></td>
			<td><?php echo $transbalanceinquiry['transactiontype_id']; ?></td>
			<td><?php echo $transbalanceinquiry['transcode']; ?></td>
			<td><?php echo $transbalanceinquiry['card_id']; ?></td>
			<td><?php echo $transbalanceinquiry['cardholder_id']; ?></td>
			<td><?php echo $transbalanceinquiry['accountname']; ?></td>
			<td><?php echo $transbalanceinquiry['terminal_id']; ?></td>
			<td><?php echo $transbalanceinquiry['transdate']; ?></td>
			<td><?php echo $transbalanceinquiry['postation_id']; ?></td>
			<td><?php echo $transbalanceinquiry['atmstation_id']; ?></td>
			<td><?php echo $transbalanceinquiry['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transbalanceinquiries', 'action' => 'view', $transbalanceinquiry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transbalanceinquiries', 'action' => 'edit', $transbalanceinquiry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transbalanceinquiries', 'action' => 'delete', $transbalanceinquiry['id']), array(), __('Are you sure you want to delete # %s?', $transbalanceinquiry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transcashouts'); ?></h3>
	<?php if (!empty($atmstation['Transcashout'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Cashout Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($atmstation['Transcashout'] as $transcashout): ?>
		<tr>
			<td><?php echo $transcashout['id']; ?></td>
			<td><?php echo $transcashout['transactiontype_id']; ?></td>
			<td><?php echo $transcashout['transcode']; ?></td>
			<td><?php echo $transcashout['card_id']; ?></td>
			<td><?php echo $transcashout['cardholder_id']; ?></td>
			<td><?php echo $transcashout['accountname']; ?></td>
			<td><?php echo $transcashout['terminal_id']; ?></td>
			<td><?php echo $transcashout['remaining_balance']; ?></td>
			<td><?php echo $transcashout['cashout_amount']; ?></td>
			<td><?php echo $transcashout['current_balance']; ?></td>
			<td><?php echo $transcashout['transdate']; ?></td>
			<td><?php echo $transcashout['atmstation_id']; ?></td>
			<td><?php echo $transcashout['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transcashouts', 'action' => 'view', $transcashout['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transcashouts', 'action' => 'edit', $transcashout['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transcashouts', 'action' => 'delete', $transcashout['id']), array(), __('Are you sure you want to delete # %s?', $transcashout['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transloadcashes'); ?></h3>
	<?php if (!empty($atmstation['Transloadcash'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Load Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($atmstation['Transloadcash'] as $transloadcash): ?>
		<tr>
			<td><?php echo $transloadcash['id']; ?></td>
			<td><?php echo $transloadcash['transactiontype_id']; ?></td>
			<td><?php echo $transloadcash['transcode']; ?></td>
			<td><?php echo $transloadcash['card_id']; ?></td>
			<td><?php echo $transloadcash['cardholder_id']; ?></td>
			<td><?php echo $transloadcash['accountname']; ?></td>
			<td><?php echo $transloadcash['user_id']; ?></td>
			<td><?php echo $transloadcash['terminal_id']; ?></td>
			<td><?php echo $transloadcash['transdate']; ?></td>
			<td><?php echo $transloadcash['remaining_balance']; ?></td>
			<td><?php echo $transloadcash['load_amount']; ?></td>
			<td><?php echo $transloadcash['current_balance']; ?></td>
			<td><?php echo $transloadcash['atmstation_id']; ?></td>
			<td><?php echo $transloadcash['postation_id']; ?></td>
			<td><?php echo $transloadcash['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transloadcashes', 'action' => 'view', $transloadcash['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transloadcashes', 'action' => 'edit', $transloadcash['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transloadcashes', 'action' => 'delete', $transloadcash['id']), array(), __('Are you sure you want to delete # %s?', $transloadcash['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transpurchases'); ?></h3>
	<?php if (!empty($atmstation['Transpurchase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Total Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Soa'); ?></th>
		<th><?php echo __('Ornumber'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($atmstation['Transpurchase'] as $transpurchase): ?>
		<tr>
			<td><?php echo $transpurchase['id']; ?></td>
			<td><?php echo $transpurchase['transactiontype_id']; ?></td>
			<td><?php echo $transpurchase['transcode']; ?></td>
			<td><?php echo $transpurchase['user_id']; ?></td>
			<td><?php echo $transpurchase['card_id']; ?></td>
			<td><?php echo $transpurchase['cardholder_id']; ?></td>
			<td><?php echo $transpurchase['accountname']; ?></td>
			<td><?php echo $transpurchase['terminal_id']; ?></td>
			<td><?php echo $transpurchase['transdate']; ?></td>
			<td><?php echo $transpurchase['remaining_balance']; ?></td>
			<td><?php echo $transpurchase['total_amount']; ?></td>
			<td><?php echo $transpurchase['current_balance']; ?></td>
			<td><?php echo $transpurchase['postation_id']; ?></td>
			<td><?php echo $transpurchase['atmstation_id']; ?></td>
			<td><?php echo $transpurchase['status_id']; ?></td>
			<td><?php echo $transpurchase['soa']; ?></td>
			<td><?php echo $transpurchase['ornumber']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transpurchases', 'action' => 'view', $transpurchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transpurchases', 'action' => 'edit', $transpurchase['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transpurchases', 'action' => 'delete', $transpurchase['id']), array(), __('Are you sure you want to delete # %s?', $transpurchase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
