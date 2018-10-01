<div class="statuses view">
<h2><?php echo __('Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($status['Status']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), array(), __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('controller' => 'cardstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupsettings'), array('controller' => 'groupsettings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupsetting'), array('controller' => 'groupsettings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('controller' => 'transbalanceinquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('controller' => 'transbalanceinquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('controller' => 'transbillspayments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('controller' => 'transbillspayments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transcashouts'), array('controller' => 'transcashouts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transchangepins'), array('controller' => 'transchangepins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transchangepin'), array('controller' => 'transchangepins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('controller' => 'transloadcashes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('controller' => 'transpurchases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Withdrawals'), array('controller' => 'withdrawals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cardstatuses'); ?></h3>
	<?php if (!empty($status['Cardstatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Color'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Cardstatus'] as $cardstatus): ?>
		<tr>
			<td><?php echo $cardstatus['id']; ?></td>
			<td><?php echo $cardstatus['name']; ?></td>
			<td><?php echo $cardstatus['status_id']; ?></td>
			<td><?php echo $cardstatus['color']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cardstatuses', 'action' => 'view', $cardstatus['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cardstatuses', 'action' => 'edit', $cardstatus['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cardstatuses', 'action' => 'delete', $cardstatus['id']), array(), __('Are you sure you want to delete # %s?', $cardstatus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cardtypes'); ?></h3>
	<?php if (!empty($status['Cardtype'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Cardtype'] as $cardtype): ?>
		<tr>
			<td><?php echo $cardtype['id']; ?></td>
			<td><?php echo $cardtype['name']; ?></td>
			<td><?php echo $cardtype['alias']; ?></td>
			<td><?php echo $cardtype['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cardtypes', 'action' => 'view', $cardtype['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cardtypes', 'action' => 'edit', $cardtype['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cardtypes', 'action' => 'delete', $cardtype['id']), array(), __('Are you sure you want to delete # %s?', $cardtype['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Groupsettings'); ?></h3>
	<?php if (!empty($status['Groupsetting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Groupsettingscategory Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Groupsetting'] as $groupsetting): ?>
		<tr>
			<td><?php echo $groupsetting['id']; ?></td>
			<td><?php echo $groupsetting['name']; ?></td>
			<td><?php echo $groupsetting['group_id']; ?></td>
			<td><?php echo $groupsetting['groupsettingscategory_id']; ?></td>
			<td><?php echo $groupsetting['status_id']; ?></td>
			<td><?php echo $groupsetting['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groupsettings', 'action' => 'view', $groupsetting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groupsettings', 'action' => 'edit', $groupsetting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groupsettings', 'action' => 'delete', $groupsetting['id']), array(), __('Are you sure you want to delete # %s?', $groupsetting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Groupsetting'), array('controller' => 'groupsettings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transactiontypes'); ?></h3>
	<?php if (!empty($status['Transactiontype'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Transactiontype'] as $transactiontype): ?>
		<tr>
			<td><?php echo $transactiontype['id']; ?></td>
			<td><?php echo $transactiontype['name']; ?></td>
			<td><?php echo $transactiontype['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactiontypes', 'action' => 'view', $transactiontype['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactiontypes', 'action' => 'edit', $transactiontype['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactiontypes', 'action' => 'delete', $transactiontype['id']), array(), __('Are you sure you want to delete # %s?', $transactiontype['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transbalanceinquiries'); ?></h3>
	<?php if (!empty($status['Transbalanceinquiry'])): ?>
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
	<?php foreach ($status['Transbalanceinquiry'] as $transbalanceinquiry): ?>
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
	<?php if (!empty($status['Transbillspayment'])): ?>
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
	<?php foreach ($status['Transbillspayment'] as $transbillspayment): ?>
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
	<h3><?php echo __('Related Transcashouts'); ?></h3>
	<?php if (!empty($status['Transcashout'])): ?>
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
	<?php foreach ($status['Transcashout'] as $transcashout): ?>
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
	<h3><?php echo __('Related Transchangepins'); ?></h3>
	<?php if (!empty($status['Transchangepin'])): ?>
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
		<th><?php echo __('Old Pin'); ?></th>
		<th><?php echo __('New Pin'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Transchangepin'] as $transchangepin): ?>
		<tr>
			<td><?php echo $transchangepin['id']; ?></td>
			<td><?php echo $transchangepin['transactiontype_id']; ?></td>
			<td><?php echo $transchangepin['transcode']; ?></td>
			<td><?php echo $transchangepin['card_id']; ?></td>
			<td><?php echo $transchangepin['cardholder_id']; ?></td>
			<td><?php echo $transchangepin['accountname']; ?></td>
			<td><?php echo $transchangepin['user_id']; ?></td>
			<td><?php echo $transchangepin['terminal_id']; ?></td>
			<td><?php echo $transchangepin['transdate']; ?></td>
			<td><?php echo $transchangepin['old_pin']; ?></td>
			<td><?php echo $transchangepin['new_pin']; ?></td>
			<td><?php echo $transchangepin['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transchangepins', 'action' => 'view', $transchangepin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transchangepins', 'action' => 'edit', $transchangepin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transchangepins', 'action' => 'delete', $transchangepin['id']), array(), __('Are you sure you want to delete # %s?', $transchangepin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transchangepin'), array('controller' => 'transchangepins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transloadcashes'); ?></h3>
	<?php if (!empty($status['Transloadcash'])): ?>
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
	<?php foreach ($status['Transloadcash'] as $transloadcash): ?>
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
	<?php if (!empty($status['Transpurchase'])): ?>
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
	<?php foreach ($status['Transpurchase'] as $transpurchase): ?>
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
<div class="related">
	<h3><?php echo __('Related Withdrawals'); ?></h3>
	<?php if (!empty($status['Withdrawal'])): ?>
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
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Withdrawal Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Withdrawal'] as $withdrawal): ?>
		<tr>
			<td><?php echo $withdrawal['id']; ?></td>
			<td><?php echo $withdrawal['transactiontype_id']; ?></td>
			<td><?php echo $withdrawal['transcode']; ?></td>
			<td><?php echo $withdrawal['card_id']; ?></td>
			<td><?php echo $withdrawal['cardholder_id']; ?></td>
			<td><?php echo $withdrawal['accountname']; ?></td>
			<td><?php echo $withdrawal['terminal_id']; ?></td>
			<td><?php echo $withdrawal['transdate']; ?></td>
			<td><?php echo $withdrawal['remaining_balance']; ?></td>
			<td><?php echo $withdrawal['withdrawal_amount']; ?></td>
			<td><?php echo $withdrawal['current_balance']; ?></td>
			<td><?php echo $withdrawal['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'withdrawals', 'action' => 'view', $withdrawal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'withdrawals', 'action' => 'edit', $withdrawal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'withdrawals', 'action' => 'delete', $withdrawal['id']), array(), __('Are you sure you want to delete # %s?', $withdrawal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
