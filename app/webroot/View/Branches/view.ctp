<div class="branches view">
<h2><?php echo __('Branch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branchcode'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['branchcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contactno'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['contactno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel No'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['tel_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch Manager'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['branch_manager']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['registered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posdevice Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['posdevice_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branch'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branch'), array('action' => 'delete', $branch['Branch']['id']), array(), __('Are you sure you want to delete # %s?', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Atmstations'), array('controller' => 'atmstations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardapplications'), array('controller' => 'cardapplications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Postations'), array('controller' => 'postations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Atmstations'); ?></h3>
	<?php if (!empty($branch['Atmstation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Atmstation'] as $atmstation): ?>
		<tr>
			<td><?php echo $atmstation['id']; ?></td>
			<td><?php echo $atmstation['name']; ?></td>
			<td><?php echo $atmstation['alias']; ?></td>
			<td><?php echo $atmstation['branch_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'atmstations', 'action' => 'view', $atmstation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'atmstations', 'action' => 'edit', $atmstation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'atmstations', 'action' => 'delete', $atmstation['id']), array(), __('Are you sure you want to delete # %s?', $atmstation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Atmstation'), array('controller' => 'atmstations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Cardapplications'); ?></h3>
	<?php if (!empty($branch['Cardapplication'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Cardstatus Id'); ?></th>
		<th><?php echo __('Registered'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Refid'); ?></th>
		<th><?php echo __('Purpose'); ?></th>
		<th><?php echo __('Others'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Cardapplication'] as $cardapplication): ?>
		<tr>
			<td><?php echo $cardapplication['id']; ?></td>
			<td><?php echo $cardapplication['cardno']; ?></td>
			<td><?php echo $cardapplication['cardstatus_id']; ?></td>
			<td><?php echo $cardapplication['registered']; ?></td>
			<td><?php echo $cardapplication['user_id']; ?></td>
			<td><?php echo $cardapplication['branch_id']; ?></td>
			<td><?php echo $cardapplication['terminal_id']; ?></td>
			<td><?php echo $cardapplication['refid']; ?></td>
			<td><?php echo $cardapplication['purpose']; ?></td>
			<td><?php echo $cardapplication['others']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cardapplications', 'action' => 'view', $cardapplication['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cardapplications', 'action' => 'edit', $cardapplication['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cardapplications', 'action' => 'delete', $cardapplication['id']), array(), __('Are you sure you want to delete # %s?', $cardapplication['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cardapplication'), array('controller' => 'cardapplications', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Postations'); ?></h3>
	<?php if (!empty($branch['Postation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['Postation'] as $postation): ?>
		<tr>
			<td><?php echo $postation['id']; ?></td>
			<td><?php echo $postation['name']; ?></td>
			<td><?php echo $postation['alias']; ?></td>
			<td><?php echo $postation['branch_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'postations', 'action' => 'view', $postation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'postations', 'action' => 'edit', $postation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'postations', 'action' => 'delete', $postation['id']), array(), __('Are you sure you want to delete # %s?', $postation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Postation'), array('controller' => 'postations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
