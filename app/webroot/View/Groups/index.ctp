<?php //echo $this->App->commonHeader('Access Role'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Account Group',
		$this->App->Showbutton(
			'Register Role', 
			'btn-violet pull-right fs-10', 
			'groups', 
			'add', 
			'plus-circle'
		).
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'groups', 
			'index', 
			'list'
		)
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Access Role', 		
				'groups', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage'
			)	
		)
	);
?>
		
<div class="groups index col-md-12">	
	<div class="col-md-12 nopadding">
	<?php echo $this->App->tHead(array('Group', 'Action')); ?>
	<?php foreach ($groups as $key => $group): ?>
		<tr>
			<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>							
			<td class="actions">
				<?php echo $this->App->btnLink('Edit', 'edit', 'groups', 'edit', $group['Group']['id']); ?>			
				<?php //echo $this->App->btnLink('View', 'view', 'groups', 'view', $group['Group']['id']); ?>							
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>	
</div>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [1],
							"orderable": false
					}],
					"bStateSave": false, 
					"pagingType": "full_numbers"
					/*"fnPreDrawCallback": function(){					
						var info =  $(this).DataTable().page.info();
						$("#table_page_Info_search").html(
							"Page " +(info.page+1)+ " of " +info.pages+" Pages"
						);
						return true;
					}*/
				});
	');
?>
