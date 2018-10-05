<div class="transchangepins view">
<h2><?php echo __('Transchangepin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transchangepin['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transchangepin['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transchangepin['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['User']['id'], array('controller' => 'users', 'action' => 'view', $transchangepin['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transchangepin['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Old Pin'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['old_pin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('New Pin'); ?></dt>
		<dd>
			<?php echo h($transchangepin['Transchangepin']['new_pin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transchangepin['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transchangepin['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transchangepin'), array('action' => 'edit', $transchangepin['Transchangepin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transchangepin'), array('action' => 'delete', $transchangepin['Transchangepin']['id']), array(), __('Are you sure you want to delete # %s?', $transchangepin['Transchangepin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transchangepins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transchangepin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
