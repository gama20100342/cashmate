<div class="transbillspayments view">
<h2><?php echo __('Transbillspayment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transactiontype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Transactiontype']['name'], array('controller' => 'transactiontypes', 'action' => 'view', $transbillspayment['Transactiontype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transcode'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['transcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Card'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Card']['id'], array('controller' => 'cards', 'action' => 'view', $transbillspayment['Card']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardholder'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Cardholder']['id'], array('controller' => 'cardholders', 'action' => 'view', $transbillspayment['Cardholder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountname'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['accountname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partner'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Partner']['name'], array('controller' => 'partners', 'action' => 'view', $transbillspayment['Partner']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terminal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Terminal']['name'], array('controller' => 'terminals', 'action' => 'view', $transbillspayment['Terminal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Postation']['name'], array('controller' => 'postations', 'action' => 'view', $transbillspayment['Postation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accountnumber'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['accountnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remaining Balance'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['remaining_balance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount Due'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['amount_due']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Charge'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['customer_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partner Charge'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['partner_charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Amount'); ?></dt>
		<dd>
			<?php echo h($transbillspayment['Transbillspayment']['total_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transbillspayment['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $transbillspayment['Status']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transbillspayment'), array('action' => 'edit', $transbillspayment['Transbillspayment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transbillspayment'), array('action' => 'delete', $transbillspayment['Transbillspayment']['id']), array(), __('Are you sure you want to delete # %s?', $transbillspayment['Transbillspayment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transbillspayments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transbillspayment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactiontypes'), array('controller' => 'transactiontypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactiontype'), array('controller' => 'transactiontypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cards'), array('controller' => 'cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Card'), array('controller' => 'cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partners'), array('controller' => 'partners', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partner'), array('controller' => 'partners', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Terminals'), array('controller' => 'terminals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Terminal'), array('controller' => 'terminals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
