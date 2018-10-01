<div class="cardmonthlylimits view">
<h2><?php echo __('Cardmonthlylimit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardmonthlylimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $cardmonthlylimit['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardtype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardmonthlylimit['Cardtype']['name'], array('controller' => 'cardtypes', 'action' => 'view', $cardmonthlylimit['Cardtype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Atm'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['channel_atm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Pos'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['channel_pos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Bol'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['channel_bol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['min_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['min_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['max_transvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['max_transfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['total_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['total_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['total_fundtransvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['total_fundtransfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['min_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['min_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['max_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['max_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['added']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addedby'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['addedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($cardmonthlylimit['Cardmonthlylimit']['modifiedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardmonthlylimit'), array('action' => 'edit', $cardmonthlylimit['Cardmonthlylimit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardmonthlylimit'), array('action' => 'delete', $cardmonthlylimit['Cardmonthlylimit']['id']), array(), __('Are you sure you want to delete # %s?', $cardmonthlylimit['Cardmonthlylimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardmonthlylimits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardmonthlylimit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
