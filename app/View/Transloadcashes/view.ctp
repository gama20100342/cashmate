<div class="transloadcashes view">
<h2><?php echo __('Transloadcash'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transloadcash['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transloadcash['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transloadcash['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['User']['id'], array('controller' => 'users', 'action' => 'view', $transloadcash['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transloadcash['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Balance'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['remaining_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Load Amount'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['load_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Balance'); ?></dt>
		<dd>
			<?php echo h($transloadcash['Transloadcash']['current_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atmstation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transloadcash['Atmstation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transloadcash['Postation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transloadcash['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transloadcash['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transloadcash'), array('action' => 'edit', $transloadcash['Transloadcash']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transloadcash'), array('action' => 'delete', $transloadcash['Transloadcash']['id']), array(), __('Are you sure you want to delete # %s?', $transloadcash['Transloadcash']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transloadcashes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transloadcash'), array('action' => 'add')); ?> </li>
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
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
