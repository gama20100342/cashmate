<?php echo $this->App->commonHeader('Manage Access Role'); ?>
<div class="groups index">	
	<div class="col-md-12">
	<?php echo $this->App->tHead(array('Company / Business Name', 'Address', 'Contact Person', 'Contact No. / Tel. No.', 'Action')); ?>
	<?php foreach ($partners as $key => $p): ?>
		<tr>
			<td><?php echo $p['Partner']['name']; ?></td>						
			<td><?php echo $p['Partner']['address']; ?></td>						
			<td><?php echo $p['Partner']['contact_person']; ?></td>						
			<td><?php echo $p['Partner']['contactno'].' / '.$p['Partner']['telno']; ?></td>									
			<td class="actions">
				<?php echo $this->App->btnLink('Edit', 'edit', 'partners', 'edit', $p['Partner']['id']); ?>			
				<?php echo $this->App->btnLink('View', 'view', 'partners', 'view', $p['Partner']['id']); ?>							
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $p['Partner']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
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
					"lengthMenu": [[6, 10, 25, 50, 100, -1], [6, 10, 25, 50, 100, "All"]],
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
