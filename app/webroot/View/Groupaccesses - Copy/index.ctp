<?php echo $this->App->CommonHeaderWithButton(
	'Manage Access Setting',
	$this->App->Showbutton(
			'New Setting', 
			'btn-violet pull-right fs-10', 
			'groupaccesses', 
			'add', 
			'plus'
	)
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Access Security', 		
				'groupaccesses', 
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
		<?php echo $this->App->tHead(array('Group of User', 'Controller', 'Action', 'Action')); ?>
		<?php foreach ($groupaccesses as $key => $group): ?>
			<tr>				
				<td><?php echo $group['Group']['name']; ?></td>
				<td><?php echo h($group['Groupaccess']['controller']); ?>&nbsp;</td>
				<td><?php echo count(explode(",",  $group['Groupaccess']['action'])) > 0 ? str_replace(",", "<br />", $group['Groupaccess']['action']) : $group['Groupaccess']['action']; ?>&nbsp;</td>
				
				<td class="actions">
					<?php echo $this->App->btnLink('Edit', 'edit', 'groupaccesses', 'edit', $group['Groupaccess']['id']); ?>			
					<?php //echo $this->App->btnLink('View', 'view', 'groupaccesses', 'view', $group['Groupaccess']['id']); ?>											
				</td>
			</tr>
		<?php endforeach; ?>
		<?php //echo $this->App->tFoot(); ?>	
		<?php echo $this->App->tFFoot(array('Group of User', 'Controller', 'Action', 'Action')); ?>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,		
					"scrollY": "350px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [2, 3],
							"orderable": false
					}],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					
				});
	');
?>

