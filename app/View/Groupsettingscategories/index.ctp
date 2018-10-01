<?php echo $this->App->commonHeader('Manage Access Category'); ?>
<div class="groupsettingscategories index">	
	<div class="col-md-8 fs-11">
	<?php echo $this->App->tHead(array('Category', '')); ?>

	<?php foreach ($groupsettingscategories as $groupsettingscategory): ?>
	<tr>
		<td><?php echo h($groupsettingscategory['Groupsettingscategory']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'groupsettingscategories', 'edit', $groupsettingscategory['Groupsettingscategory']['id']); ?>			
			<?php //echo $this->App->btnLink('View', 'view', 'groupsettingscategories', 'view', $groupsettingscategory['Groupsettingscategory']['id']); ?>						
			<?php //echo $this->App->btnLink('Remove', 'delete', 'groupsettingscategories', 'edit', $groupsettingscategory['Groupsettingscategory']['id']); ?>			
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupsettingscategory['Groupsettingscategory']['id']), array(), __('Are you sure you want to delete # %s?', $groupsettingscategory['Groupsettingscategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>
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