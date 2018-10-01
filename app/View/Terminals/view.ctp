<div class="terminals view">
<h2><?php echo __('Terminal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model Number'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['model_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Imei'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['device_imei']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Sn'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['device_sn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Address'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['ip_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mac Address'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['mac_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['added']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addedby'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['addedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($terminal['Terminal']['modifiedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Terminal'), array('action' => 'edit', $terminal['Terminal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Terminal'), array('action' => 'delete', $terminal['Terminal']['id']), array(), __('Are you sure you want to delete # %s?', $terminal['Terminal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('action' => 'add')); ?> </li>
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
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Withdrawals'), array('controller' => 'withdrawals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transbalanceinquiries'); ?></h3>
	<?php if (!empty($terminal['Transbalanceinquiry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transbalanceinquiry'] as $transbalanceinquiry): ?>
		<tr>
			<td><?php echo $transbalanceinquiry['id']; ?></td>
			<td><?php echo $transbalanceinquiry['card_id']; ?></td>
			<td><?php echo $transbalanceinquiry['cardno']; ?></td>
			<td><?php echo $transbalanceinquiry['cardholder_id']; ?></td>
			<td><?php echo $transbalanceinquiry['account_name']; ?></td>
			<td><?php echo $transbalanceinquiry['trace_number']; ?></td>
			<td><?php echo $transbalanceinquiry['transaction_type']; ?></td>
			<td><?php echo $transbalanceinquiry['processing_code']; ?></td>
			<td><?php echo $transbalanceinquiry['channels']; ?></td>
			<td><?php echo $transbalanceinquiry['acquirer_institution']; ?></td>
			<td><?php echo $transbalanceinquiry['response']; ?></td>
			<td><?php echo $transbalanceinquiry['transaction_amount']; ?></td>
			<td><?php echo $transbalanceinquiry['service_charge']; ?></td>
			<td><?php echo $transbalanceinquiry['transdate']; ?></td>
			<td><?php echo $transbalanceinquiry['terminal_id']; ?></td>
			<td><?php echo $transbalanceinquiry['status']; ?></td>
			<td><?php echo $transbalanceinquiry['username']; ?></td>
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
	<?php if (!empty($terminal['Transbillspayment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transbillspayment'] as $transbillspayment): ?>
		<tr>
			<td><?php echo $transbillspayment['id']; ?></td>
			<td><?php echo $transbillspayment['card_id']; ?></td>
			<td><?php echo $transbillspayment['cardno']; ?></td>
			<td><?php echo $transbillspayment['cardholder_id']; ?></td>
			<td><?php echo $transbillspayment['account_name']; ?></td>
			<td><?php echo $transbillspayment['trace_number']; ?></td>
			<td><?php echo $transbillspayment['transaction_type']; ?></td>
			<td><?php echo $transbillspayment['processing_code']; ?></td>
			<td><?php echo $transbillspayment['channels']; ?></td>
			<td><?php echo $transbillspayment['acquirer_institution']; ?></td>
			<td><?php echo $transbillspayment['response']; ?></td>
			<td><?php echo $transbillspayment['transaction_amount']; ?></td>
			<td><?php echo $transbillspayment['service_charge']; ?></td>
			<td><?php echo $transbillspayment['transdate']; ?></td>
			<td><?php echo $transbillspayment['terminal_id']; ?></td>
			<td><?php echo $transbillspayment['status']; ?></td>
			<td><?php echo $transbillspayment['username']; ?></td>
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
	<?php if (!empty($terminal['Transcashout'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transcashout'] as $transcashout): ?>
		<tr>
			<td><?php echo $transcashout['id']; ?></td>
			<td><?php echo $transcashout['card_id']; ?></td>
			<td><?php echo $transcashout['cardno']; ?></td>
			<td><?php echo $transcashout['cardholder_id']; ?></td>
			<td><?php echo $transcashout['account_name']; ?></td>
			<td><?php echo $transcashout['trace_number']; ?></td>
			<td><?php echo $transcashout['transaction_type']; ?></td>
			<td><?php echo $transcashout['processing_code']; ?></td>
			<td><?php echo $transcashout['channels']; ?></td>
			<td><?php echo $transcashout['acquirer_institution']; ?></td>
			<td><?php echo $transcashout['response']; ?></td>
			<td><?php echo $transcashout['transaction_amount']; ?></td>
			<td><?php echo $transcashout['service_charge']; ?></td>
			<td><?php echo $transcashout['transdate']; ?></td>
			<td><?php echo $transcashout['terminal_id']; ?></td>
			<td><?php echo $transcashout['status']; ?></td>
			<td><?php echo $transcashout['username']; ?></td>
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
	<?php if (!empty($terminal['Transchangepin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transchangepin'] as $transchangepin): ?>
		<tr>
			<td><?php echo $transchangepin['id']; ?></td>
			<td><?php echo $transchangepin['card_id']; ?></td>
			<td><?php echo $transchangepin['cardno']; ?></td>
			<td><?php echo $transchangepin['cardholder_id']; ?></td>
			<td><?php echo $transchangepin['account_name']; ?></td>
			<td><?php echo $transchangepin['trace_number']; ?></td>
			<td><?php echo $transchangepin['transaction_type']; ?></td>
			<td><?php echo $transchangepin['processing_code']; ?></td>
			<td><?php echo $transchangepin['channels']; ?></td>
			<td><?php echo $transchangepin['acquirer_institution']; ?></td>
			<td><?php echo $transchangepin['response']; ?></td>
			<td><?php echo $transchangepin['transaction_amount']; ?></td>
			<td><?php echo $transchangepin['service_charge']; ?></td>
			<td><?php echo $transchangepin['transdate']; ?></td>
			<td><?php echo $transchangepin['terminal_id']; ?></td>
			<td><?php echo $transchangepin['status']; ?></td>
			<td><?php echo $transchangepin['username']; ?></td>
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
	<?php if (!empty($terminal['Transloadcash'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transloadcash'] as $transloadcash): ?>
		<tr>
			<td><?php echo $transloadcash['id']; ?></td>
			<td><?php echo $transloadcash['card_id']; ?></td>
			<td><?php echo $transloadcash['cardno']; ?></td>
			<td><?php echo $transloadcash['cardholder_id']; ?></td>
			<td><?php echo $transloadcash['account_name']; ?></td>
			<td><?php echo $transloadcash['trace_number']; ?></td>
			<td><?php echo $transloadcash['transaction_type']; ?></td>
			<td><?php echo $transloadcash['processing_code']; ?></td>
			<td><?php echo $transloadcash['channels']; ?></td>
			<td><?php echo $transloadcash['acquirer_institution']; ?></td>
			<td><?php echo $transloadcash['response']; ?></td>
			<td><?php echo $transloadcash['transaction_amount']; ?></td>
			<td><?php echo $transloadcash['service_charge']; ?></td>
			<td><?php echo $transloadcash['transdate']; ?></td>
			<td><?php echo $transloadcash['terminal_id']; ?></td>
			<td><?php echo $transloadcash['status']; ?></td>
			<td><?php echo $transloadcash['username']; ?></td>
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
	<?php if (!empty($terminal['Transpurchase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Account Name'); ?></th>
		<th><?php echo __('Trace Number'); ?></th>
		<th><?php echo __('Transaction Type'); ?></th>
		<th><?php echo __('Processing Code'); ?></th>
		<th><?php echo __('Channels'); ?></th>
		<th><?php echo __('Acquirer Institution'); ?></th>
		<th><?php echo __('Response'); ?></th>
		<th><?php echo __('Transaction Amount'); ?></th>
		<th><?php echo __('Service Charge'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Transpurchase'] as $transpurchase): ?>
		<tr>
			<td><?php echo $transpurchase['id']; ?></td>
			<td><?php echo $transpurchase['card_id']; ?></td>
			<td><?php echo $transpurchase['cardno']; ?></td>
			<td><?php echo $transpurchase['cardholder_id']; ?></td>
			<td><?php echo $transpurchase['account_name']; ?></td>
			<td><?php echo $transpurchase['trace_number']; ?></td>
			<td><?php echo $transpurchase['transaction_type']; ?></td>
			<td><?php echo $transpurchase['processing_code']; ?></td>
			<td><?php echo $transpurchase['channels']; ?></td>
			<td><?php echo $transpurchase['acquirer_institution']; ?></td>
			<td><?php echo $transpurchase['response']; ?></td>
			<td><?php echo $transpurchase['transaction_amount']; ?></td>
			<td><?php echo $transpurchase['service_charge']; ?></td>
			<td><?php echo $transpurchase['transdate']; ?></td>
			<td><?php echo $transpurchase['terminal_id']; ?></td>
			<td><?php echo $transpurchase['status']; ?></td>
			<td><?php echo $transpurchase['username']; ?></td>
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
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($terminal['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Middlename'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Suffix'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Tel No'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th><?php echo __('Last Login'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Refid'); ?></th>
		<th><?php echo __('UserToken'); ?></th>
		<th><?php echo __('Deviceid'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Pass Expire'); ?></th>
		<th><?php echo __('Added'); ?></th>
		<th><?php echo __('Added By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['title']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['middlename']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['suffix']; ?></td>
			<td><?php echo $user['contact_no']; ?></td>
			<td><?php echo $user['tel_no']; ?></td>
			<td><?php echo $user['picture']; ?></td>
			<td><?php echo $user['last_login']; ?></td>
			<td><?php echo $user['terminal_id']; ?></td>
			<td><?php echo $user['refid']; ?></td>
			<td><?php echo $user['userToken']; ?></td>
			<td><?php echo $user['deviceid']; ?></td>
			<td><?php echo $user['status_id']; ?></td>
			<td><?php echo $user['pass_expire']; ?></td>
			<td><?php echo $user['added']; ?></td>
			<td><?php echo $user['added_by']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Withdrawals'); ?></h3>
	<?php if (!empty($terminal['Withdrawal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Withdrawal Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Posimei'); ?></th>
		<th><?php echo __('Pricessed By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($terminal['Withdrawal'] as $withdrawal): ?>
		<tr>
			<td><?php echo $withdrawal['id']; ?></td>
			<td><?php echo $withdrawal['transactiontype_id']; ?></td>
			<td><?php echo $withdrawal['transcode']; ?></td>
			<td><?php echo $withdrawal['card_id']; ?></td>
			<td><?php echo $withdrawal['cardno']; ?></td>
			<td><?php echo $withdrawal['cardholder_id']; ?></td>
			<td><?php echo $withdrawal['accountname']; ?></td>
			<td><?php echo $withdrawal['terminal_id']; ?></td>
			<td><?php echo $withdrawal['transdate']; ?></td>
			<td><?php echo $withdrawal['remaining_balance']; ?></td>
			<td><?php echo $withdrawal['withdrawal_amount']; ?></td>
			<td><?php echo $withdrawal['current_balance']; ?></td>
			<td><?php echo $withdrawal['status_id']; ?></td>
			<td><?php echo $withdrawal['posimei']; ?></td>
			<td><?php echo $withdrawal['pricessed_by']; ?></td>
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
