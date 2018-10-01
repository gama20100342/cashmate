<div class="groupmenus view">
<h2><?php echo __('Groupmenu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupmenu['Groupmenu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($groupmenu['Groupmenu']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groupmenu'), array('action' => 'edit', $groupmenu['Groupmenu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groupmenu'), array('action' => 'delete', $groupmenu['Groupmenu']['id']), array(), __('Are you sure you want to delete # %s?', $groupmenu['Groupmenu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupmenus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupmenu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupaccesses'), array('controller' => 'groupaccesses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupaccess'), array('controller' => 'groupaccesses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Groupaccesses'); ?></h3>
	<?php if (!empty($groupmenu['Groupaccess'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Groupmenu Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Allowed'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groupmenu['Groupaccess'] as $groupaccess): ?>
		<tr>
			<td><?php echo $groupaccess['id']; ?></td>
			<td><?php echo $groupaccess['groupmenu_id']; ?></td>
			<td><?php echo $groupaccess['group_id']; ?></td>
			<td><?php echo $groupaccess['controller']; ?></td>
			<td><?php echo $groupaccess['action']; ?></td>
			<td><?php echo $groupaccess['allowed']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'groupaccesses', 'action' => 'view', $groupaccess['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'groupaccesses', 'action' => 'edit', $groupaccess['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groupaccesses', 'action' => 'delete', $groupaccess['id']), array(), __('Are you sure you want to delete # %s?', $groupaccess['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Groupaccess'), array('controller' => 'groupaccesses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
