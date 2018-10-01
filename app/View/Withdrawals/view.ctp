<div class="withdrawals view">
<h2><?php echo __('Withdrawal'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withdrawal['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $withdrawal['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withdrawal['Card']['id'], array('controller' => 'cards', 'action' => 'view', $withdrawal['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withdrawal['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $withdrawal['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withdrawal['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $withdrawal['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Balance'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['remaining_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Withdrawal Amount'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['withdrawal_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Balance'); ?></dt>
		<dd>
			<?php echo h($withdrawal['Withdrawal']['current_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withdrawal['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $withdrawal['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Withdrawal'), array('action' => 'edit', $withdrawal['Withdrawal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Withdrawal'), array('action' => 'delete', $withdrawal['Withdrawal']['id']), array(), __('Are you sure you want to delete # %s?', $withdrawal['Withdrawal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Withdrawals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withdrawal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
