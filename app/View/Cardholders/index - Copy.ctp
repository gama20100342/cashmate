<?php echo $this->App->CommonHeader('Card Holders', $breadcrumbs, $this->request['controller']); ?>
<div class="col-md-12">
<?php
	echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			' Active <span class="badge fs-9"> '.$count_active.' </span> ', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'index/1', 
			'eye'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			' Inactive <span class="badge fs-9"> '.$count_inactive.' </span> ', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'index/2', 
			'lock'
		);	
		
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			' Pending  / For Approval <span class="badge fs-9"> '.$count_pending.' </span> ', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'index/3', 
			'eye-slash'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'PDF', 
			'btn-violet pull-right fs-10 m-l-3', 
			"cards", 
			'index/2', 
			'file-pdf'
		);
		echo '<span class="pull-left">&nbsp;</span>';
			echo $this->App->Showbutton(
				'Excel', 
				'btn-violet pull-right fs-10 m-l-3', 
				"cards", 
				'index/2', 
				'file-excel'
			);
		echo '<span class="pull-left">&nbsp;</span>';
			echo $this->App->Showbutton(
				'Print', 
				'btn-violet pull-right fs-10', 
				"cards", 
				'index/2', 
				'print'
			);
?>
</div>
<div class="cardholders index col-md-12">	
	<?php 
		echo $this->App->tHead(array(
				'First Name', 'Middle Name', 'Last Name', 'Contact No.', 'Gender', 'Account Status', 'Action'
			)
		);
	?>	
	<?php foreach ($cardholders as $cardholder): ?>
	<tr class="text-default">
		<!--td>			
			<?php
				//echo $cardholder['Cardholder']['gender'];
				/*$img = !empty($cardholder['Cardholder']['gender']) ? $cardholder['Cardholder']['gender'] : 'M';
				echo $this->Html->link($this->html->image($img.'.png', array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'cardholders',  
							'action' => 'view', 
							$cardholder['Cardholder']['id'], 
							$cardholder['Cardholder']['firstname'], 
							$cardholder['Cardholder']['lastname'],
							$cardholder['Cardholder']['refid']
						),
						array(
							'escape' => false
						)
					);*/
			?>
		</td-->
		<td class="text-uppercase">			
			<div class="bold"><?php 
				
				/*echo $this->Html->link(
						$cardholder['Cardholder']['fullname'], 
						array(
							'controller' => 'cardholders',  
							'action' => 'view', 
							$cardholder['Cardholder']['id'], 
							$cardholder['Cardholder']['firstname'], 
							$cardholder['Cardholder']['lastname'],
							$cardholder['Cardholder']['refid']
						),
						array(
							'escape' => false,
							'class' => 'nounderline',							
						)
					);
					*/
					
					echo $cardholder['Cardholder']['firstname'];
				
			?></div>
			<!--div class="fs-10"><i class="fas fa-address-card fa-xs"></i> <?php //echo h($cardholder['Card']['cardno']); ?></div-->
		</td>

		<td class="text-left bold text-success text-uppercase"><?php echo $cardholder['Cardholder']['middlename']; ?></td>		
		<td class="text-left bold text-success text-uppercase"><?php echo $cardholder['Cardholder']['lastname']; ?></td>		
		<td class="text-left bold text-success">(+63) <?php echo $cardholder['Cardholder']['contact_no']; ?></td>		
		<td class="text-left bold text-success"><?php echo $cardholder['Cardholder']['gender']; ?></td>					
		<td class="text-left bold text-success"><?php echo $cardholder['Cardholderstatus']['name']; ?></td>		
		
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'cardholders', 'edit', $cardholder['Cardholder']['id']); ?>
			<?php echo $this->App->btnLink('View', 'view', 'cardholders', 'view', $cardholder['Cardholder']['id']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $cardholder['Cardholder']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $cardholder['Cardholder']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cardholder['Cardholder']['id']), array(), __('Are you sure you want to delete # %s?', $cardholder['Cardholder']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>

<div class="modal fade" id="login_idle_" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">       
			<div class="modal-body text-center">
				<p>There are total of (10) pending accounts for approval</p>
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Ok</button>
			</div>
		</div>
	  </div> 
	</div>
	
<div class="clear"></div>
<div class="col-md-12 nopadding">
	<ul class="nav nav-pills">
	  <li class="active"><a data-toggle="tab" href="#active_accoount" 	table-id="#active_accoount_" controller="cardholders" class="btn btn-violet btn-sm noradius"><i class="fas fa-check-circle fa-lg"></i> Active</a></li>	  
	  <li><a data-toggle="tab" href="#inactive_account" table-id="#inactive_account_" controller="cardholders" class="btn btn-violet btn-sm noradius"><i class="fas fa-ban fa-lg"></i> Inactive</a></li>
	  <li><a data-toggle="tab" href="#pending_account" 	table-id="#pending_account_" controller="cardholders" class="btn btn-violet btn-sm noradius"><i class="fas fa-circle fa-lg"></i> Pending / For Approval</a></li>
	 
	</ul>
	<div class="tab-content">
		 <div id="active_accoount" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader('Active Accounts'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('First Name', 'Middle Name', 'Last Name', 'Contact No.', 'Gender', 'Action'), false, 'active_accoount_', false); ?>
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
		 <div id="inactive_account" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Inactive Accounts'); ?>
			<div class="related col-md-8 nopadding">	
					<?php echo $this->App->tHead(array('First Name', 'Middle Name', 'Last Name', 'Contact No.', 'Gender', 'Action'), false, 'inactive_account_', false); ?>					
					<?php //if (!empty($cardholder['Transbalanceinquiry'])): ?>
					
					<?php //endif; ?>
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
		  <div id="pending_account" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Pending Accounts'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('First Name', 'Middle Name', 'Last Name', 'Contact No.', 'Gender', 'Action'), false, 'pending_account_', false); ?>					
										
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
	</div>
</div>
</div>
<div class="clear"></div>


	
<?php

	$controller = $this->webroot.'/cardholders';
	$action		= 'getCardHolders';
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/1'));
		
	echo $this->Js->Buffer('
		
			/*$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "250px",
					"scrollCollapse": false,
					"columnDefs": [{
						"targets": [6, 5, 4, 3],
						"orderable": false
					}],
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
				
				 $(document).ready( function(){
					//$("#login_idle_").appendTo("body").modal("show");
				});  
				*/
				
		function get_transaction_data(url, tableid){
			var _data = [];
		
			$.ajax({
				method		: "GET",
				url			: url,
				cache		: false,				
				beforeSend	: function(){
					_loading_message("show");
				},
				success		: function(data){
					$.each(JSON.parse(data).data, function(i, item){
						_data.push(item);
					});
					
					$(tableid).DataTable({
						data: _data,
						destroy: true,
						//"lengthMenu": [[7, 10, 25, 50, 100, -1], [7, 10, 25, 50, 100, "All"]]
						"scrollY": "200px",
						"scrollCollapse": false,
						"lengthMenu": [[7, -1], [7, "All"]],	
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
				},
				error		: function(err1, err2, err3){
					_error_message("show", "Service is not yet available this time");
				},
				complete	: function(){
					_loading_message("hide");
				},
				
			});
			
			
		}
		
		$(document).ready( function(){		
			
			get_transaction_data("'.$url.'", "#active_account_");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _action 		= "getTransactions";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + '.$cardholder['Card']['cardno'].';	
				if(_url !==""){
					$(_table_id).DataTable().destroy();
					$(_table_id + " tbody").empty();
					get_transaction_data(_url, _table_id);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});
			
			
			
		});
	');
?>
	