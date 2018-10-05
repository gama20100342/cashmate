<div class="postations view">
<h2><?php echo __('Postation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($postation['Postation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($postation['Postation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($postation['Postation']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postation['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $postation['Branch']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postation'), array('action' => 'edit', $postation['Postation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postation'), array('action' => 'delete', $postation['Postation']['id']), array(), __('Are you sure you want to delete # %s?', $postation['Postation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('controller' => 'transbillspayments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transbalanceinquiries'); ?></h3>
	<?php if (!empty($postation['Transbalanceinquiry'])): ?>
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
	<?php foreach ($postation['Transbalanceinquiry'] as $transbalanceinquiry): ?>
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
	<h3><?php echo __('Related Transbillspayments'); ?></h3>
	<?php if (!empty($postation['Transbillspayment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Partner Id'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Accountnumber'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Amount Due'); ?></th>
		<th><?php echo __('Customer Charge'); ?></th>
		<th><?php echo __('Partner Charge'); ?></th>
		<th><?php echo __('Total Amount'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($postation['Transbillspayment'] as $transbillspayment): ?>
		<tr>
			<td><?php echo $transbillspayment['id']; ?></td>
			<td><?php echo $transbillspayment['transactiontype_id']; ?></td>
			<td><?php echo $transbillspayment['transcode']; ?></td>
			<td><?php echo $transbillspayment['card_id']; ?></td>
			<td><?php echo $transbillspayment['cardholder_id']; ?></td>
			<td><?php echo $transbillspayment['accountname']; ?></td>
			<td><?php echo $transbillspayment['partner_id']; ?></td>
			<td><?php echo $transbillspayment['terminal_id']; ?></td>
			<td><?php echo $transbillspayment['postation_id']; ?></td>
			<td><?php echo $transbillspayment['accountnumber']; ?></td>
			<td><?php echo $transbillspayment['transdate']; ?></td>
			<td><?php echo $transbillspayment['remaining_balance']; ?></td>
			<td><?php echo $transbillspayment['amount_due']; ?></td>
			<td><?php echo $transbillspayment['customer_charge']; ?></td>
			<td><?php echo $transbillspayment['partner_charge']; ?></td>
			<td><?php echo $transbillspayment['total_amount']; ?></td>
			<td><?php echo $transbillspayment['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transbillspayments', 'action' => 'view', $transbillspayment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transbillspayments', 'action' => 'edit', $transbillspayment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transbillspayments', 'action' => 'delete', $transbillspayment['id']), array(), __('Are you sure you want to delete # %s?', $transbillspayment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transloadcashes'); ?></h3>
	<?php if (!empty($postation['Transloadcash'])): ?>
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
	<?php foreach ($postation['Transloadcash'] as $transloadcash): ?>
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
	<?php if (!empty($postation['Transpurchase'])): ?>
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
	<?php foreach ($postation['Transpurchase'] as $transpurchase): ?>
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
