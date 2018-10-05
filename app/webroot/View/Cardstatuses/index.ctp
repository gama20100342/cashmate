<?php echo $this->App->commonHeader('Manage Card Status'); ?>
<div class="cardstatuses index col-md-8">
	<?php echo $this->App->tHead(array('Name', 'Status', 'Card Color', '')); ?>
	<?php foreach ($cardstatuses as $cardstatus): ?>
	<tr>
		<td><?php echo h($cardstatus['Cardstatus']['name']); ?>&nbsp;</td>
		<td><?php echo $cardstatus['Status']['name']; ?></td>
		<td style="background: <?php echo h($cardstatus['Cardstatus']['color']); ?> !important;">&nbsp;</td>
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'cardstatuses', 'edit', $cardstatus['Cardstatus']['id']); ?>				
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $cardstatus['Cardstatus']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardstatus['Cardstatus']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardstatus['Cardstatus']['id']), array(), __('Are you sure you want to delete # %s?', $cardstatus['Cardstatus']['id'])); ?>
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

