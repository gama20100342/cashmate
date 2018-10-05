<div class="cardannuallimits view">
<h2><?php echo __('Cardannuallimit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardannuallimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $cardannuallimit['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardtype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardannuallimit['Cardtype']['name'], array('controller' => 'cardtypes', 'action' => 'view', $cardannuallimit['Cardtype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Atm'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['channel_atm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Pos'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['channel_pos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Bol'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['channel_bol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['min_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['min_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['max_transvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['max_transfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['total_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['total_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['total_fundtransvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['total_fundtransfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['min_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['min_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['max_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['max_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['added']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addedby'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['addedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($cardannuallimit['Cardannuallimit']['modifiedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardannuallimit'), array('action' => 'edit', $cardannuallimit['Cardannuallimit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardannuallimit'), array('action' => 'delete', $cardannuallimit['Cardannuallimit']['id']), array(), __('Are you sure you want to delete # %s?', $cardannuallimit['Cardannuallimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardannuallimits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardannuallimit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
