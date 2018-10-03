
<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Accounts', 		
				'cardholders', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Approved Application'
			)	
		)
	);
?>




<div class="groups index col-md-12">	
	<div class="col-md-12 nopadding">
	<?php echo $this->App->tHead($this->Lang->index_header('applications')); ?>	
	<?php foreach ($cardapplications as $key => $app): ?>
		<tr>			
			<td><?php echo $app['Cardholder']['cif_no']; ?></td>							
			<td><?php echo $app['Cardapplication']['registration']; ?></td>										
			<td><?php echo $app['Cardapplication']['processed_date']; ?></td>							
			<td><?php echo $app['Cardapplication']['purpose']; ?></td>																									
			<td><?php echo $app['Cardholder']['fullname']; ?></td>																									
			<td><?php echo $this->App->showStatus($app['Cardapplication']['status']); ?></td>							
			<td class="actions">				
				<?php 
					/*echo '<a href="#" 
										url="'.$this->webroot.'cardholders/view/'.$app['Cardholder']['id'].'" 
										title="View Card Holder" 
										data-td-id = "td_'.$app['Cardholder']['id'].'"
										data-_murl = "'.$this->webroot.'cardholders/view/'.$app['Cardholder']['id'].'"
										data-_type = "holder"
										data-toggle="modal"
										data-target="#view_card_detail_"										
										class="fs-10 card-link-modal nooutline td_'.$app['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; 
					*/
				echo $this->App->btnLink('Approved Application', 'approved', 'cardholders', 'view_pending', $app['Cardholder']['id']); ?>							
				<?php echo $this->App->btnLink('Edit', 'edit', 'cardholders', 'edit', $app['Cardholder']['id']); ?>			
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $app['Cardapplication']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php echo $this->App->tFFoot(); ?>
</div>
</div>

<div class="modal" id="view_card_detail_" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-max nopadding">
		  <div class="modal-content noradius nopadding">       			
			<div class="modal-body nopadding" id="modal_req_content">
				
			</div>
		</div>
	  </div> 
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
					"columnDefs": [{
							"targets": [5, 6],
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
				
				
				$(".card-link-modal").click( function(){	
							
							var _surl = $(this).attr("url");
							var _murl = $(this).attr("data-_murl");
							var _type = $(this).attr("data-_type");
							var td_id = $(this).attr("data-td-id");

							$.get(_surl, function(resp){
								$("#modal_req_content").html(resp).promise().done( function(){
									updateCardStatusLinks(td_id); 
								});
							
								
							})
						});
	');
?>
