<div class="transcashouts view">
<h2><?php echo __('Transcashout'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transcashout['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transcashout['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transcashout['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transcashout['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Balance'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['remaining_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashout Amount'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['cashout_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Balance'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['current_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transcashout['Transcashout']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atmstation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transcashout['Atmstation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transcashout['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transcashout['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transcashout'), array('action' => 'edit', $transcashout['Transcashout']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transcashout'), array('action' => 'delete', $transcashout['Transcashout']['id']), array(), __('Are you sure you want to delete # %s?', $transcashout['Transcashout']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transcashouts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transcashout'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
