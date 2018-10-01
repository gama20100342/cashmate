<?php echo $this->App->CommonHeaderWithButton(
	'Manage Products',
		$this->App->Showbutton(
			'Register', 
			'btn-violet pull-right fs-10', 
			'products', 
			'add', 
			'plus'
		).
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'products', 
			'index',
			'list'
		)
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Products', 		
				'products', 
				'index'
			),			
			$this->App->ShowNormaLink(
				'Manage'				
			)	
		)
	);
?>

<div class="col-md-12">
	
		<?php echo $this->App->tHead($this->Lang->index_header('products'), 'products_'); ?>				
		<?php foreach($products as $p): ?>
			<tr>
				<td><?php echo $p['Product']['id']; ?></td>
				<td><?php echo $p['Product']['name']; ?></td>
				<td><?php echo $p['Product']['expiration']; ?></td>
				<td>
					<?php //echo $this->App->modalViewLink($this->webroot.'products/view/'.$p['Product']['id'], '#products_limit_'); ?>
					<?php //echo $this->App->modalEditLink('products', 'edit', $p['Product']['id']); ?>				
					<?php echo $this->App->btnLink('View', 'view', 'products', 'view', $p['Product']['id']); ?>			
					<?php echo $this->App->btnLink('Edit', 'edit', 'products', 'edit', $p['Product']['id']); ?>			
					
				</td>
			</tr>
		<?php endforeach; ?>
		<?php echo $this->App->tFFoot($this->Lang->index_header('products')); ?>					
	
					
</div>
<div class="clear"></div>

  <div class="modal" id="_default_content_modal_" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-max nopadding">
		  <div class="modal-content noradius nopadding">       			
			<div class="modal-body nopadding" id="_default_body_modal_">
				
			</div>
		</div>
	  </div> 
	</div>
	
<?php
	echo $this->Js->Buffer('		
		$("#products_").DataTable({														
			"scrollY": "200px",
			"scrollCollapse": false,
			"columnDefs": [{
				"targets": [1],
				"orderable": false
			}],
			"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
			"bStateSave": false, 
			"pagingType": "full_numbers"							
		});
		
		_showActionModal();
		
		
		/*var _surl;		
		$(".dc-link-modal").click( function(){
			 _surl = $(this).attr("url");						
			$.get(_surl, function(resp){
				$("#modal_req_content").html(resp).promise().done( function(){								
					$("#products_limit_").DataTable({														
						"scrollY": "200px",
						"scrollCollapse": false,
						"columnDefs": [{
							"targets": [1],
							"orderable": false
						}],
						"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
						"bStateSave": false, 
						"pagingType": "full_numbers"							
					});	
												
					$(".add_limit").click( function(){
						 _surl = $(this).attr("url");						
						$.get(_surl, function(resp){
							$("#modal_req_content").html(resp).promise().done( function(){	
								$(".back").click( function(){
									 _surl = $(this).attr("url");						
									$.get(_surl, function(resp){
										$("#modal_req_content").html(resp).promise().done( function(){	
											
										});
									});
								});
							});
						});
					});
					
				});			
			})
		});
		*/		
					
						
	');
?>
