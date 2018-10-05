<div class="usertokens view">
<h2><?php echo __('Usertoken'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usertoken['User']['id'], array('controller' => 'users', 'action' => 'view', $usertoken['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Token'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ExpiresIn'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['expiresIn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RefreshToken'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['refreshToken']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastlogin'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['lastlogin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logindevice'); ?></dt>
		<dd>
			<?php echo h($usertoken['Usertoken']['logindevice']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usertoken'), array('action' => 'edit', $usertoken['Usertoken']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usertoken'), array('action' => 'delete', $usertoken['Usertoken']['id']), array(), __('Are you sure you want to delete # %s?', $usertoken['Usertoken']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usertokens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usertoken'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
