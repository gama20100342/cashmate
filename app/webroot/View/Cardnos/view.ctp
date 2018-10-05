<div class="cardnos view">
<h2><?php echo __('Cardno'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardno['Cardno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card Id'); ?></dt>
		<dd>
			<?php echo h($cardno['Cardno']['card_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last'); ?></dt>
		<dd>
			<?php echo h($cardno['Cardno']['last']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current'); ?></dt>
		<dd>
			<?php echo h($cardno['Cardno']['current']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardno'), array('action' => 'edit', $cardno['Cardno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardno'), array('action' => 'delete', $cardno['Cardno']['id']), array(), __('Are you sure you want to delete # %s?', $cardno['Cardno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardno'), array('action' => 'add')); ?> </li>
	</ul>
</div>
