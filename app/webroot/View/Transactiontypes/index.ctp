
<?php echo $this->App->CommonHeader('Cards Transactions'); ?>
<div class="cards index col-md-8">
	<?php echo $this->App->tHead(array('Transaction', 'Total Transactions', 'Status', 'Action')); ?>	
	<?php foreach ($transactiontypes as $transactiontype): ?>
	<tr>
		<td><?php echo $transactiontype['Transactiontype']['name']; ?></td>		
		<td>10</td>		
		<td><?php echo $transactiontype['Status']['name']; ?></td>		
		<td class="actions">
			<?php echo $this->App->btnLink('Update', 'edit', 'transactiontypes', 'edit', $transactiontype['Transactiontype']['id']); ?>
			<?php echo $this->App->btnLink('View', 'view', 'transactiontypes', 'view', $transactiontype['Transactiontype']['id'], $transactiontype['Transactiontype']['name']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $card['Card']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['id']), array(), __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>
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