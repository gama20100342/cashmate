<?php echo $this->App->CommonHeader('Card Types'); ?>
<div class="cardtypes index col-md-8">
	<?php echo $this->App->tHead(array('Name', 'Status', 'Total Cards', 'Active', 'Deactivated', 'Block', 'Pending', 'Action')); ?>
	
	<?php foreach ($cardtypes as $cardtype): ?>
	<tr>
		<td><?php echo h($cardtype['Cardtype']['name']); ?>&nbsp;</td>		
		<td><?php echo $cardtype['Status']['name']; ?></td>
		<td>20</td>
		<td>10</td>
		<td>17</td>
		<td>16</td>
		<td>12</td>
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'cardtypes', 'edit', $cardtype['Cardtype']['id']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $cardtype['Cardtype']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardtype['Cardtype']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardtype['Cardtype']['id']), array(), __('Are you sure you want to delete # %s?', $cardtype['Cardtype']['id'])); ?>
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