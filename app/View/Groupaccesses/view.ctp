<div class="groupaccesses view">
<h2><?php echo __('Groupaccess'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupaccess['Groupaccess']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupmenu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupaccess['Groupmenu']['name'], array('controller' => 'groupmenus', 'action' => 'view', $groupaccess['Groupmenu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupaccess['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupaccess['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($groupaccess['Groupaccess']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo h($groupaccess['Groupaccess']['action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allowed'); ?></dt>
		<dd>
			<?php echo h($groupaccess['Groupaccess']['allowed']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groupaccess'), array('action' => 'edit', $groupaccess['Groupaccess']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groupaccess'), array('action' => 'delete', $groupaccess['Groupaccess']['id']), array(), __('Are you sure you want to delete # %s?', $groupaccess['Groupaccess']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupaccesses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupaccess'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupmenus'), array('controller' => 'groupmenus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupmenu'), array('controller' => 'groupmenus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
