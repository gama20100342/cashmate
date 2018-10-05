<?php echo $this->App->commonHeader('Manage Menu'); ?>
<div class="groups index">	
	<div class="col-md-8">
		<?php echo $this->App->tHead(array('Main Menu', 'Controller', 'Action')); ?>		
		<?php foreach ($groupmenus as $key => $group): ?>		
			<tr>
				<td><?php echo h($group['Groupmenu']['name']); ?>&nbsp;</td>			
				<td>12</td>			
				<td class="actions">
					<?php echo $this->App->btnLink('Edit', 'edit', 'groupmenus', 'edit', $group['Groupmenu']['id']); ?>			
					<?php echo $this->App->btnLink('View', 'view', 'groupmenus', 'view', $group['Groupmenu']['id']); ?>											
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
					//"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [1, 2],
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
