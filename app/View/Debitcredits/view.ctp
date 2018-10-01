<div class="debitcredits view">
<h2><?php echo __('Debitcredit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Name'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['account_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardno'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['cardno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cif No'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['cif_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['product']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Debit'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['debit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit'); ?></dt>
		<dd>
			<?php echo h($debitcredit['Debitcredit']['credit']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Debitcredit'), array('action' => 'edit', $debitcredit['Debitcredit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Debitcredit'), array('action' => 'delete', $debitcredit['Debitcredit']['id']), array(), __('Are you sure you want to delete # %s?', $debitcredit['Debitcredit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Debitcredits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Debitcredit'), array('action' => 'add')); ?> </li>
	</ul>
</div>
