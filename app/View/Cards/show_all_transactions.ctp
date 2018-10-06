<?php echo $this->App->CommonHeaderWithButton(
	'BRB Transactions'
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'BRB Transactions', 		
				'cards', 
				'show_all_transactions'
			),
			$this->App->ShowNormaLink(
				'Show All', 		
				'cards', 
				'show_all_transactions'
			)
		)
	);
?>

<div class="clear"></div>
<div>
	
</div>

<div class="cards view col-md-12">	
	<?php echo $this->App->tHead(
		array(
			"Transaction Date/Time",
			"Card No.",			
			"Trace No.",			
			"Transaction Type",			
			"Processing Code",			
			"Channel",			
			"Terminal ID",			
			"Institution",			
			"Response",			
			"Amount"
		)
		, 'active_card_'); ?>					
	
	<?php foreach($__trans as $t): ?>
		<tr>
			<td><?php echo $t['transdate']; ?></td>
			<td><?php echo $t['cardno']; ?></td>
			<td><?php echo $t['trace']; ?></td>
			<td><?php echo $t['type']; ?></td>
			<td><?php echo $t['code']; ?></td>
			<td><?php echo $t['channel']; ?></td>
			<td><?php echo $t['device']; ?></td>
			<td><?php echo $t['institution']; ?></td>
			<td><?php echo $t['resp']; ?></td>
			<td><?php echo $t['amount']; ?></td>			
		</tr>
	<?php endforeach; ?>

	<?php echo $this->App->tFFoot(); ?>
</div>
<div class="clear"></div>
<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("#active_card_").DataTable({												
				"scrollY": "200px",
				"scrollCollapse": false,
				/*"columnDefs": [{
					"targets": [4, 8],
					"orderable": false
				}],*/
				"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
				"bStateSave": false, 
				"pagingType": "full_numbers"						
			});
		});
	');
?>