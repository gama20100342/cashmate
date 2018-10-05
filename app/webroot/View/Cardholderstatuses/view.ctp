<div class="cardholderstatuses view">
<h2><?php echo __('Cardholderstatus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardholderstatus['Cardholderstatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cardholderstatus['Cardholderstatus']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardholderstatus'), array('action' => 'edit', $cardholderstatus['Cardholderstatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardholderstatus'), array('action' => 'delete', $cardholderstatus['Cardholderstatus']['id']), array(), __('Are you sure you want to delete # %s?', $cardholderstatus['Cardholderstatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholderstatuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholderstatus'), array('action' => 'add')); ?> </li>
	</ul>
</div>
