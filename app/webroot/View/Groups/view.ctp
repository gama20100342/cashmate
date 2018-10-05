<?php echo $this->App->CommonHeader('Role Details'); ?>		

<div class="col-md-12">
    <h4 class="nomargin nopadding"><?php echo $group['Group']['name']; ?></h4>	
	<div class="related">
			<h4 class="nomargin nopadding"><?php echo __('Assigned Capabilities'); ?></h4>
			<?php echo $this->App->tHead(array('Name', 'Category', 'Status','')); ?>
			<?php if (!empty($group['Groupsetting'])): ?>
			<?php foreach ($group['Groupsetting'] as $groupsetting): ?>
				<tr>
					<td><?php echo $groupsetting['name']; ?></td>
					<td><?php echo $groupsetting['groupsettingscategory_id']; ?></td>
					<td><?php echo $groupsetting['status_id']; ?></td>
					<td class="actions">
						<?php echo $this->App->btnLink('Edit', 'edit', 'groupsettings', 'view', $groupsetting['id']); ?>			
						<?php //echo $this->Html->link(__('View'), array('controller' => 'groupsettings', 'action' => 'view', $groupsetting['id'])); ?>
						<?php //echo //$this->Html->link(__('Edit'), array('controller' => 'groupsettings', 'action' => 'edit', $groupsetting['id'])); ?>
						<?php //echo //$this->Form->postLink(__('Delete'), array('controller' => 'groupsettings', 'action' => 'delete', $groupsetting['id']), array(), __('Are you sure you want to delete # %s?', $groupsetting['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php echo $this->App->tFoot(); ?>
	</div>
	<div class="related">
		<h4 class="nomargin nopadding"><?php echo __('Assigned Access'); ?></h4>
		<?php echo $this->App->tHead(array('', 'Username', 'Firstname', 'Lastname','Last Login', 'Terminal Id', '')); ?>
		<?php if (!empty($group['User'])): ?>
			<?php foreach ($group['User'] as $user): ?>
				<tr>
				<td><?php echo $user['picture']; ?></td>
					<td><?php echo $user['username']; ?></td>
					<td><?php echo $user['firstname']; ?></td>
					<td><?php echo $user['lastname']; ?></td>			
					<td><?php echo $user['last_login']; ?></td>
					<td><?php echo $user['terminal_id']; ?></td>
					<td class="actions">
						<?php echo $this->App->btnLink('Edit', 'edit', 'users', 'edit', $user['id']); ?>					
						<?php echo $this->App->btnLink('View', 'view', 'users', 'view', $user['id']); ?>							
					</td>
				</tr>
			<?php endforeach; ?>	
		<?php endif; ?>
		<?php echo $this->App->tFoot(); ?>
	</div>

	<div class="clear"></div>
</div>
<div class="clear"></div>

<?php
	echo $this->Js->Buffer('
		$(".commontable").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnPreDrawCallback": function(){					
						var info =  $(this).DataTable().page.info();
						$("#table_page_Info_search").html(
							"Page " +(info.page+1)+ " of " +info.pages+" Pages"
						);
						return true;
					}
				});
	');
?>