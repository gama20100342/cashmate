<div class="cardpregens view">
<h2><?php echo __('Cardpregen'); ?></h2>
	<dl>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cardpregen['User']['title'], array('controller' => 'users', 'action' => 'view', $cardpregen['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardno'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['cardno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardtype'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['cardtype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['product']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['date_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cardpregen['Cardpregen']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardpregen'), array('action' => 'edit', $cardpregen['Cardpregen']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardpregen'), array('action' => 'delete', $cardpregen['Cardpregen']['id']), array(), __('Are you sure you want to delete # %s?', $cardpregen['Cardpregen']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardpregens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardpregen'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
