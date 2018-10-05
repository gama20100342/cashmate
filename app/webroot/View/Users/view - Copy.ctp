<?php //echo $this->App->CommonHeader('Access Information'); ?>
<div class="cardholders view col-md-12">
	<h3 class="bold">
	
		<?php 

				if(empty($user['Useravatar']['user_id'])){
					echo $this->Html->link($this->html->image('avatar.png', array('class' => 'img-50 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);
					
					
				}else{
					echo $this->Html->link($this->html->image($user['Useravatar']['image_file'], array('class' => 'img-50 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);					
				}
			
			?>
		<?php echo $user['User']['name']; ?> 
		<?php echo $this->App->btnLink('Update', 'edit', 'users', 'edit', $user['User']['id'], $user['User']['refid']); ?>
		
		</h3>
	<div class="col-md-6 nopadding-left">
		<h5 class="bold"><?php echo __('Personal Information'); ?></h5>
		<table class="table table-condensed table-bordered fs-11">
			<tbody>			
			<tr>
				<td>Firstname</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['firstname']; ?>
				</td>
			</tr>
			<tr>
				<td>Middlename</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['middlename']; ?>
				</td>
			</tr>
			<tr>
				<td>Lastname</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['lastname']; ?>
				</td>
			</tr>
			<tr>
				<td>Contact No.</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['contact_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Tel. No.</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['tel_no']; ?>
				</td>
			</tr>
			
			</table>
			
	</div>
	<div class="col-md-6 nopadding-left">
			<h5 class="bold"><?php echo __('Access Information'); ?></h5>
				
				<table class="table table-condensed table-bordered fs-11">
				<tbody>
				<tr>
					<td>Username</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['username']; ?>
					</td>
				</tr>
				<tr>
					<td>Access Group</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['Group']['name']; ?>
					</td>
				</tr>
				<tr>
					<td>Last Login</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['last_login']; ?>
					</td>
				</tr>
				<tr>
					<td>Last Device</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['deviceid']; ?>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['Status']['name']; ?>
					</td>
				</tr>
				</table>
			
			<div class="clear"></div>
		
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?php echo $this->App->CommonHeader('Transactions History'); ?>
<div class="col-md-12">
	<ul class="nav nav-pills nav-justified">
	  <li class="active"><a data-toggle="tab" href="#trans_purchase" 	table-id="#purchase_trans_" controller="transpurchases" class="btn btn-violet btn-sm noradius">Purchases</a></li>	  	  
	  <li><a data-toggle="tab" href="#trans_billspay" 	table-id="#bills_payment_" controller="transbillspayments" class="btn btn-violet btn-sm noradius">Bills Payment</a></li>
	  <li><a data-toggle="tab" href="#trans_cashout"  	table-id="#cashouts_trans_" controller="transcashouts" class="btn btn-violet btn-sm noradius">Cash Out</a></li>	  	  
	  <li><a data-toggle="tab" href="#trans_loadcash" 	table-id="#load_cash_" controller="transloadcashes" class="btn btn-violet btn-sm noradius">Load Cash</a></li>	  	  	  
	</ul>
	<div class="tab-content">
		 <div id="trans_purchase" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader('Purchases'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Current Bal. ( PHP )', 'Amount Due ( PHP )', 'Remaining Bal. (PHP )', 'Status'), false, 'purchase_trans_', false); ?>
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
		
		  
		  <div id="trans_billspay" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Bills Payment'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Merchant', 'Amount Due', 'Total Amount', 'Status', ''), false, 'bills_payment_', false); ?>
					
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_cashout" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Cash Out'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Current Bal. ( PHP )', 'Cash Out Amount ( PHP )', 'Remaining Bal. (PHP )', 'Status'), false, 'cashouts_trans_', false); ?>
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
		  
		  
		   <div id="trans_loadcash" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Load Cash'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Current Bal. ( PHP )', 'Amount Due ( PHP )', 'Remaining Bal. (PHP )', 'Status'), false, 'load_cash_', false); ?>
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>

		 
		  
		  
		  
	</div>
</div>
<div class="clear"></div>


	
<?php
	

	$controller = $this->webroot.'/transpurchases';
	$action		= 'getTransactions';
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/'.$user['User']['id']));
		
	echo $this->Js->Buffer('
		
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
			
			get_transaction_data("'.$url.'", "#purchase_trans_");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _action 		= "getTransactions";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + '.$user['User']['id'].';	
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
