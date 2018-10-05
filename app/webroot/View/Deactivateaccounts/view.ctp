<div class="deactivateaccounts view">
<h2><?php echo __('Deactivateaccount'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deactivateaccount['Deactivateaccount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deactivateaccount['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $deactivateaccount['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processed Date'); ?></dt>
		<dd>
			<?php echo h($deactivateaccount['Deactivateaccount']['processed_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processed By'); ?></dt>
		<dd>
			<?php echo h($deactivateaccount['Deactivateaccount']['processed_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deactivateaccount'), array('action' => 'edit', $deactivateaccount['Deactivateaccount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deactivateaccount'), array('action' => 'delete', $deactivateaccount['Deactivateaccount']['id']), array(), __('Are you sure you want to delete # %s?', $deactivateaccount['Deactivateaccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deactivateaccounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deactivateaccount'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
