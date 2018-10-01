<div class="cardquarterlylimits view">
<h2><?php echo __('Cardquarterlylimit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardquarterlylimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $cardquarterlylimit['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardtype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardquarterlylimit['Cardtype']['name'], array('controller' => 'cardtypes', 'action' => 'view', $cardquarterlylimit['Cardtype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Atm'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['channel_atm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Pos'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['channel_pos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Channel Bol'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['channel_bol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['min_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['min_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['max_transvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Transfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['max_transfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['total_withdrawalvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Withdrawalfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['total_withdrawalfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['total_fundtransvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Fundtransfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['total_fundtransfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['min_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['min_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingvalue'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['max_loadingvalue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Loadingfee'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['max_loadingfee']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Added'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['added']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addedby'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['addedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($cardquarterlylimit['Cardquarterlylimit']['modifiedby']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardquarterlylimit'), array('action' => 'edit', $cardquarterlylimit['Cardquarterlylimit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardquarterlylimit'), array('action' => 'delete', $cardquarterlylimit['Cardquarterlylimit']['id']), array(), __('Are you sure you want to delete # %s?', $cardquarterlylimit['Cardquarterlylimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardquarterlylimits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardquarterlylimit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardtypes'), array('controller' => 'cardtypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardtype'), array('controller' => 'cardtypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
