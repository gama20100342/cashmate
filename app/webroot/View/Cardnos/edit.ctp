<div class="cardnos form">
<?php echo $this->Form->create('Cardno'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cardno'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('card_id');
		echo $this->Form->input('last');
		echo $this->Form->input('current');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cardno.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cardno.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cardnos'), array('action' => 'index')); ?></li>
	</ul>
</div>
