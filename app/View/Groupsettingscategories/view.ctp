<div class="groupsettingscategories view">
	<legend><?php echo __('VIEW ACCESS CATEGORY'); ?></legend>
	<div class="col-md-12">
		<h6 class="fs-12 bold">
			<?php echo $groupsettingscategory['Groupsettingscategory']['name']; ?>
			<?php echo $this->App->btnLink('Edit', 'eidt', 'groupsettingscategories', 'edit', $groupsettingscategory['Groupsettingscategory']['id']); ?>															
			<?php echo $this->App->btnLink('View', 'view', 'groupsettingscategories', 'view', $groupsettingscategory['Groupsettingscategory']['id']); ?>															
		</h6>		
		<hr>
	</div>	
	<div class="clear"></div>
	<div class="col-md-12">
	<h4><?php echo __('Capabilities'); ?></h4>

	<?php echo $this->App->tHead(array('Capability', 'Allowed Groups', 'Controller', 'Action', 'Description', 'Status')); ?>
	<?php if (!empty($groupsettingscategory['Groupsetting'])): ?>
		<?php foreach ($groupsettingscategory['Groupsetting'] as $groupsetting): ?>
			<tr>
				<td><?php echo $groupsetting['id']; ?></td>
				<td><?php echo $groupsetting['name']; ?></td>
				<td><?php echo $groupsetting['group_id']; ?></td>
				<td><?php echo $groupsetting['groupsettingscategory_id']; ?></td>
				<td><?php echo $groupsetting['status_id']; ?></td>
				<td><?php echo $groupsetting['description']; ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'groupsettings', 'action' => 'view', $groupsetting['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'groupsettings', 'action' => 'edit', $groupsetting['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'groupsettings', 'action' => 'delete', $groupsetting['id']), array(), __('Are you sure you want to delete # %s?', $groupsetting['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php echo $this->App->tFoot(); ?>
	</div>
	<div class="clear"></div>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,
					//"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]]
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, -1], [5, "All"]],	
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
