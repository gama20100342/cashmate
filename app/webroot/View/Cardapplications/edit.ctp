<div class="cardapplications form">
<?php echo $this->Form->create('Cardapplication'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cardapplication'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('refid');
		echo $this->Form->input('registration');
		echo $this->Form->input('approved_by');
		echo $this->Form->input('approved_date');
		echo $this->Form->input('processed_by');
		echo $this->Form->input('processed_date');
		echo $this->Form->input('purpose');
		echo $this->Form->input('others');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cardapplication.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Cardapplication.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cardstatuses'), array('controller' => 'cardstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardstatus'), array('controller' => 'cardstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
	</ul>
</div>
