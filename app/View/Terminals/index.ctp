<?php echo $this->App->CommonHeaderWithButton(
	'Manage Terminals',
	$this->App->Showbutton(
			'New Terminal', 
			'btn-violet pull-right fs-10', 
			'terminals', 
			'add', 
			'plus-circle'
	).
	$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'terminals', 
			'index', 
			'list'
	)
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Terminal', 		
				'terminals', 
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
		<?php echo $this->App->tHead(array(
			'Name', 
			'Device No.', 
			'Model No.', 
			'Local Port', 
			'Keys', 
			'IP Address', 
			'Branch Assignment', 
			'Status', 			
			'Action'
		)); ?>
		<?php foreach ($terminals as $key => $t): ?>
			<tr>				
				<td><?php echo $t['Terminal']['name']; ?></td>
				<td><?php echo $t['Terminal']['deviceno']; ?></td>
				<td><?php echo $t['Terminal']['model_number']; ?></td>
				<td><?php echo $t['Terminal']['local_port']; ?></td>
				<td><?php echo $t['Terminal']['keys']; ?></td>
				<td><?php echo $t['Terminal']['ip_address']; ?></td>
				<td><?php echo $t['Branch']['name']; ?></td>
				<td><?php echo $t['Terminal']['status']; ?></td>				
				<td class="actions">
					<?php echo $this->App->btnLink('Edit', 'edit', 'terminals', 'edit', $t['Terminal']['id']); ?>								
				</td>
			</tr>
		<?php endforeach; ?>
		<?php //echo $this->App->tFoot(); ?>	
		<?php echo $this->App->tFFoot(array('Group of User', 'Controller', 'Action', 'Action')); ?>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,		
					"scrollY": "350px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [6, 7, 8],
							"orderable": false
					}],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					
				});
	');
?>


