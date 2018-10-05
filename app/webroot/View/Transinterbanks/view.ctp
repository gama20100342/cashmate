<div class="transinterbanks view">
<h2><?php echo __('Transinterbank'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transinterbank['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transinterbank['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardno'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['cardno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transinterbank['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $transinterbank['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trace Number'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['trace_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Type'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['transaction_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processing Code'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['processing_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channels'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['channels']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acquirer Institution'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['acquirer_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Response'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['response']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Amount'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['transaction_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service Charge'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['service_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transinterbank['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transinterbank['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deviceno'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['deviceno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trans Cardnumber'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['trans_cardnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receiving Accountno'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['receiving_accountno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($transinterbank['Transinterbank']['username']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transinterbank'), array('action' => 'edit', $transinterbank['Transinterbank']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transinterbank'), array('action' => 'delete', $transinterbank['Transinterbank']['id']), array(), __('Are you sure you want to delete # %s?', $transinterbank['Transinterbank']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transinterbanks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transinterbank'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
	</ul>
</div>
