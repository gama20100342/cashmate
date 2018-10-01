<div class="transwithdrawals view">
<h2><?php echo __('Transwithdrawal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transwithdrawal['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transwithdrawal['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card Number'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['card_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transwithdrawal['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $transwithdrawal['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trace Number'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['trace_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Type'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['transaction_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processing Code'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['processing_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channels'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['channels']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acquirer Institution'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['acquirer_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['response']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Amount'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['transaction_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Charge'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['service_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Date'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['transaction_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transwithdrawal['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transwithdrawal['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($transwithdrawal['Transwithdrawal']['username']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transwithdrawal'), array('action' => 'edit', $transwithdrawal['Transwithdrawal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transwithdrawal'), array('action' => 'delete', $transwithdrawal['Transwithdrawal']['id']), array(), __('Are you sure you want to delete # %s?', $transwithdrawal['Transwithdrawal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transwithdrawals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transwithdrawal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
	</ul>
</div>
