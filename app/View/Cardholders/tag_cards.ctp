

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Card Holders', 		
				'cardholders', 
				(($this->Session->read('Auth.User.group_id') ==1 ) ? 'index' : 'tag_cards')
			),			
			$this->App->ShowNormaLink(
				'Link Card'
			)	
		)
	);
	
?>

<div class="col-md-12">			
					<?php echo $this->App->tHead(array(
						'CIF No', 
						'Name', 
						'Registration Date',  
						'Instiution',  
						'Product',  
						'Action'), 'approved_account_'); ?>					
					<?php foreach($holders as $h): ?>												
						<?php if($h[0]['TotalCard'] < 1): ?>
						<tr>
							<td><?php echo $h['Cardholder']['cif_no']; ?></td>
							<td><?php echo strtoupper($h['Cardholder']['fullname']); ?></td>							
							<td><?php echo date('Y-m-d H:i:s', strtotime($h['Cardholder']['registration'])); ?></td>							
							<td><?php echo $h[0]['IntName']; ?></td>
							<td><?php echo $h[0]['PName']; ?></td>							
							<td style="width: 13%;">							
								<?php echo $this->App->btnLink('View', 'view', 'cardholders', 'view_no_card', $h['Cardholder']['id']); ?>	
								<?php echo $this->App->btnLink('Edit', 'edit', 'cardholders', 'edit_cardholder', $h['Cardholder']['id']); ?>			
								<?php echo $this->App->btnLink('Link Card', 'credit-card', 'cards', 'add/'.$h['Cardholder']['id'].'/'.$h['Cardholder']['refid'].'/'.$h['Cardholder']['cardholderstatus_id']); ?>			

							</td>
						</tr>
						<?php endif; ?>						
					<?php endforeach; ?>
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
			
</div>

<div class="clear"></div>
	
<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
				$("#approved_account_").DataTable({							
							destroy: true,							
							"scrollY": "320px",
							"scrollCollapse": false,
							"columnDefs": [{
								"targets": [3],
								"orderable": false
							}],
							"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
							"bStateSave": false, 
							"pagingType": "full_numbers"
							
						});
		});
	');
?>
	