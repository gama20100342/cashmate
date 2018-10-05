<div class="merchants view">
<h2><?php echo __('Merchant'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posdevice Id'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['posdevice_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel No'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['tel_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact No'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered'); ?></dt>
		<dd>
			<?php echo h($merchant['Merchant']['registered']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Merchant'), array('action' => 'edit', $merchant['Merchant']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Merchant'), array('action' => 'delete', $merchant['Merchant']['id']), array(), __('Are you sure you want to delete # %s?', $merchant['Merchant']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Merchants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Merchant'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
	</ul>
</div>
