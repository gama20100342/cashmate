<div class="groupsettings view">
<h2><?php echo __('Groupsetting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupsetting['Groupsetting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($groupsetting['Groupsetting']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupsetting['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupsetting['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Groupsettingscategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupsetting['Groupsettingscategory']['name'], array('controller' => 'groupsettingscategories', 'action' => 'view', $groupsetting['Groupsettingscategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupsetting['Status']['name'], array('controller' => 'statuses', 'action' => 'view', $groupsetting['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($groupsetting['Groupsetting']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Groupsetting'), array('action' => 'edit', $groupsetting['Groupsetting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Groupsetting'), array('action' => 'delete', $groupsetting['Groupsetting']['id']), array(), __('Are you sure you want to delete # %s?', $groupsetting['Groupsetting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupsettings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupsetting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groupsettingscategories'), array('controller' => 'groupsettingscategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Groupsettingscategory'), array('controller' => 'groupsettingscategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('controller' => 'statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
