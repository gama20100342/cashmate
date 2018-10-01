<div class="approvedaccounts view">
<h2><?php echo __('Approvedaccount'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($approvedaccount['Approvedaccount']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($approvedaccount['Cardholder']['title'], array('controller' => 'cardholders', 'action' => 'view', $approvedaccount['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved Date'); ?></dt>
		<dd>
			<?php echo h($approvedaccount['Approvedaccount']['approved_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved By'); ?></dt>
		<dd>
			<?php echo h($approvedaccount['Approvedaccount']['approved_by']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Approvedaccount'), array('action' => 'edit', $approvedaccount['Approvedaccount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Approvedaccount'), array('action' => 'delete', $approvedaccount['Approvedaccount']['id']), array(), __('Are you sure you want to delete # %s?', $approvedaccount['Approvedaccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Approvedaccounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Approvedaccount'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
