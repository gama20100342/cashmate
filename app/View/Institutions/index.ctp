<?php //echo $this->App->commonHeader('Access Role'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Manage Institution',
		$this->App->Showbutton(
			'Register', 
			'btn-violet pull-right fs-10', 
			'institutions', 
			'add', 
			'plus-circle'
		).
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'institutions', 
			'index', 
			'list'
		)
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Institution', 		
				'institutions', 
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
		<?php echo $this->App->tHead($this->Lang->index_header('institutions')); ?>					
		<?php foreach ($institutions as $key => $institution): ?>
			<tr>
				<?php 

					$_product = explode(",", $institution['Institution']['product_id']); ?>
				
				<td><?php echo $institution['Institution']['code']; ?></td>							
				<td><?php echo $institution['Institution']['mnemonic']; ?></td>							
				<td><?php echo $institution['Institution']['name']; ?></td>							
				<?php //var_dump($product); ?. json_encode($products); ?>
				<td>
					<ul class="list-group">
					<?php 						
						foreach($products as $key => $p): 
							foreach($_product as $pr):
								if($p['Product']['id']==$pr){									
									echo '<li class="list-group-item">'.$p['Product']['id'].' - '.$p['Product']['name'].'</li>';		
								}
							endforeach;
						endforeach;
					?>
					</ul>
				</td>
									
				<td>
					<?php //echo $this->App->modalViewLink($this->webroot.'products/view/'.$p['Product']['id'], '#products_limit_'); ?>
					<?php //echo $this->App->modalEditLink('products', 'edit', $p['Product']['id']); ?>				
					<?php //echo $this->App->btnLink('View', 'view', 'products', 'view', $p['Product']['id']); ?>			
					<?php echo $this->App->btnLink('Edit', 'edit', 'institutions', 'edit', $institution['Institution']['id']); ?>			
					
				</td>
			</tr>
		<?php endforeach; ?>
		
		<?php echo $this->App->tFFoot($this->Lang->index_header('institutions')); ?>
	</div>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "300px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [4],
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
