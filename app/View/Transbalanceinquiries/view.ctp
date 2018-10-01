<div class="transbalanceinquiries view">
<h2><?php echo __('Transbalanceinquiry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transbalanceinquiry['Transbalanceinquiry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transbalanceinquiry['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transbalanceinquiry['Transbalanceinquiry']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transbalanceinquiry['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transbalanceinquiry['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transbalanceinquiry['Transbalanceinquiry']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transbalanceinquiry['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transbalanceinquiry['Transbalanceinquiry']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transbalanceinquiry['Postation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atmstation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Atmstation']['name'], array('controller' => 'atmstations', 'action' => 'view', $transbalanceinquiry['Atmstation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbalanceinquiry['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transbalanceinquiry['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transbalanceinquiry'), array('action' => 'edit', $transbalanceinquiry['Transbalanceinquiry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transbalanceinquiry'), array('action' => 'delete', $transbalanceinquiry['Transbalanceinquiry']['id']), array(), __('Are you sure you want to delete # %s?', $transbalanceinquiry['Transbalanceinquiry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbalanceinquiries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbalanceinquiry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
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
