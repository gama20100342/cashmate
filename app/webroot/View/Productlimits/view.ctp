<div class="productlimits view">
<h2><?php echo __('Productlimit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productlimit['Productlimit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productlimit['Product']['name'], array('controller' => 'products', 'action' => 'view', $productlimit['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($productlimit['Productlimit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limit Cycle'); ?></dt>
		<dd>
			<?php echo h($productlimit['Productlimit']['limit_cycle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limit Value'); ?></dt>
		<dd>
			<?php echo h($productlimit['Productlimit']['limit_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Limit Fees'); ?></dt>
		<dd>
			<?php echo h($productlimit['Productlimit']['limit_fees']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Productlimit'), array('action' => 'edit', $productlimit['Productlimit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Productlimit'), array('action' => 'delete', $productlimit['Productlimit']['id']), array(), __('Are you sure you want to delete # %s?', $productlimit['Productlimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Productlimits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Productlimit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
