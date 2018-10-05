<div class="transpurchases view">
<h2><?php echo __('Transpurchase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transpurchase['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['User']['id'], array('controller' => 'users', 'action' => 'view', $transpurchase['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transpurchase['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transpurchase['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transpurchase['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Balance'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['remaining_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amount'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['total_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Balance'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['current_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transpurchase['Postation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atmstation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transpurchase['Atmstation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transpurchase['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transpurchase['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Soa'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['soa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ornumber'); ?></dt>
		<dd>
			<?php echo h($transpurchase['Transpurchase']['ornumber']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transpurchase'), array('action' => 'edit', $transpurchase['Transpurchase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transpurchase'), array('action' => 'delete', $transpurchase['Transpurchase']['id']), array(), __('Are you sure you want to delete # %s?', $transpurchase['Transpurchase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transpurchases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transpurchase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
