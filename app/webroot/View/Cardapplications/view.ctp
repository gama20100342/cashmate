<div class="cardapplications view">
<h2><?php echo __('Cardapplication'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refid'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['refid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registration'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['registration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved By'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['approved_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved Date'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['approved_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processed By'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['processed_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processed Date'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['processed_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purpose'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['purpose']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Others'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['others']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($cardapplication['Cardapplication']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cardapplication'), array('action' => 'edit', $cardapplication['Cardapplication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cardapplication'), array('action' => 'delete', $cardapplication['Cardapplication']['id']), array(), __('Are you sure you want to delete # %s?', $cardapplication['Cardapplication']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('action' => 'add')); ?> </li>
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
	<div class="related">
		<h3><?php echo __('Related Cards'); ?></h3>
	<?php if (!empty($cardapplication['Card'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cardapplication Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['cardapplication_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cardholder Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['cardholder_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cardno'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['cardno']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cardstatus Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['cardstatus_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Bin'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['bin']; ?>
&nbsp;</dd>
		<dt><?php echo __('Sequence'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['sequence']; ?>
&nbsp;</dd>
		<dt><?php echo __('Check Digit'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['check_digit']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cardtype Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['cardtype_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Product Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['product_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Last Transaction'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['last_transaction']; ?>
&nbsp;</dd>
		<dt><?php echo __('Pincode'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['pincode']; ?>
&nbsp;</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['balance']; ?>
&nbsp;</dd>
		<dt><?php echo __('Currency Id'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['currency_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Refid'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['refid']; ?>
&nbsp;</dd>
		<dt><?php echo __('Processed By'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['processed_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Approved By'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['approved_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Registration'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['registration']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['modified']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified By'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['modified_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Activated'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['activated']; ?>
&nbsp;</dd>
		<dt><?php echo __('Reactivated'); ?></dt>
		<dd>
	<?php echo $cardapplication['Card']['reactivated']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Card'), array('controller' => 'cards', 'action' => 'edit', $cardapplication['Card']['id'])); ?></li>
			</ul>
		</div>
	</div>
	