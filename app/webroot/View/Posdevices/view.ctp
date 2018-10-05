<div class="posdevices view">
<h2><?php echo __('Posdevice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IMEI'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['IMEI']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['registered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($posdevice['Posdevice']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Posdevice'), array('action' => 'edit', $posdevice['Posdevice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Posdevice'), array('action' => 'delete', $posdevice['Posdevice']['id']), array(), __('Are you sure you want to delete # %s?', $posdevice['Posdevice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posdevices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Posdevice'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Merchants'), array('controller' => 'merchants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Merchant'), array('controller' => 'merchants', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Merchants'); ?></h3>
	<?php if (!empty($posdevice['Merchant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Posdevice Id'); ?></th>
		<th><?php echo __('Tel No'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Registered'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($posdevice['Merchant'] as $merchant): ?>
		<tr>
			<td><?php echo $merchant['id']; ?></td>
			<td><?php echo $merchant['name']; ?></td>
			<td><?php echo $merchant['code']; ?></td>
			<td><?php echo $merchant['address']; ?></td>
			<td><?php echo $merchant['posdevice_id']; ?></td>
			<td><?php echo $merchant['tel_no']; ?></td>
			<td><?php echo $merchant['contact_no']; ?></td>
			<td><?php echo $merchant['email']; ?></td>
			<td><?php echo $merchant['registered']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'merchants', 'action' => 'view', $merchant['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'merchants', 'action' => 'edit', $merchant['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'merchants', 'action' => 'delete', $merchant['id']), array(), __('Are you sure you want to delete # %s?', $merchant['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Merchant'), array('controller' => 'merchants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
