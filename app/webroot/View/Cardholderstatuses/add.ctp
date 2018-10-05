<div class="cardholderstatuses form">
<?php echo $this->Form->create('Cardholderstatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Cardholderstatus'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cardholderstatuses'), array('action' => 'index')); ?></li>
	</ul>
</div>
