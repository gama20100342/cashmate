<?php echo $this->App->CommonHeader('CARD HOLDER'); ?>
<div class="cardholders view col-md-12">
	<h3 class="bold">
		<?php echo $cardholder['Cardholder']['fullname']; ?> 
		
		<?php echo $this->App->btnLink('Update', 'edit', 'cardholders', 'edit', $cardholder['Cardholder']['id']); ?>
		
		<div class="fs-12"><?php echo $cardholder['Cardholderstatus']['name']; ?></div>
		<div class="m-t-5 m-b-5">
			<?php echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>
		</div>
		<div class="clear"></div>
	</h3>
	<div class="col-md-6 nopadding-left">
		<h5 class="bold"><?php echo __('Card Holder Information'); ?></h5>
		<table class="table table-condensed table-bordered fs-11">
			<tbody>
			<tr>
				<td>Date of Application</td>
				<td class="bold text-success  text-uppercase">
					<?php echo date('F d, Y', strtotime($cardholder['Cardholder']['registration'])); ?>
					
				</td>
			</tr>
			<tr>
				<td>Sex</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['gender']; ?>
					
				</td>
			</tr>			
			<tr>
				<td>Date of Birth</td>
				<td class="bold text-success  text-uppercase">
					<?php echo date('F d, Y', strtotime($cardholder['Cardholder']['birthdate'])); ?>
					
				</td>
			</tr>
			<tr>
				<td>Age</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $this->App->calculateAge($cardholder['Cardholder']['birthdate']); ?>
					
				</td>
			</tr>			
			<tr>
				<td>Place of Birth</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['placeofbirth']; ?>
				</td>
			</tr>
			<tr>
				<td>Monther Maiden Name</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['mothermaiden']; ?>
				</td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['present_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['permanent_address']; ?>
				</td>
			</tr>			
			<tr>
				<td>Contact No.</td>
				<td class="bold text-success text-uppercase">
					(+63) <?php echo $cardholder['Cardholder']['contact_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Tel No.</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['tel_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Nationality</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['nationality']; ?>
				</td>
			</tr>
			<tr>
				<td>Civil Status</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['civil_status']; ?>
				</td>
			</tr>
			<tr>
				<td>ID Presented</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['idpresented']; ?><br />
					<?php echo $cardholder['Cardholder']['idp_no']; ?><br />
					<?php echo $cardholder['Cardholder']['idp_expire']; ?>
				</td>
			</tr>
			<tr>
				<td>TIN/SSS/GSIS No</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['tin']; ?>
				</td>
			</tr>
			<tr>
				<td>Employeer</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['employeer']; ?>
				</td>
			</tr>
			<tr>
				<td>Position</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['position']; ?>
				</td>
			</tr>
			<tr>
				<td>Business / Employeer Address</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['business_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Office No.</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['office_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Bussiness Name</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['business_name']; ?>
				</td>
			</tr>
			<tr>
				<td>Annual Income</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['annual_income']; ?>
				</td>
			</tr>
			</table>
			
	</div>
	<div class="col-md-6 nopadding-left">
			<h5 class="bold"><?php echo __('Card Information'); ?></h5>
			<?php if(!empty($cardholder['Card'])): ?>
			<?php //foreach ($cardholder['Card'] as $card): ?>				
				<table class="table table-condensed table-bordered fs-11">
				<tbody>
				<tr>
					<td>Card No.</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['cardno']; ?>
					</td>
				</tr>
				<tr>
					<td>Card Type</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['cardtype_id']; ?>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['cardstatus_id']; ?>
					</td>
				</tr>
				<tr>
					<td>Last Transaction</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['last_transaction']; ?>
					</td>
				</tr>
				<tr>
					<td>Balance</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['currency_id'] .' '.$cardholder['Card']['balance']; ?>
					</td>
				</tr>
				<tr>
					<td>Ref No.</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $cardholder['Card']['refid']; ?>
					</td>
				</tr>
				</table>
			<?php //endforeach; ?>			
			<?php else: ?>
			<?php echo $this->App->btnLink('Create New Account', 'edit', 'cards', 'add_card_account', $cardholder['Cardholder']['id'], $cardholder['Cardholder']['firstname'], $cardholder['Cardholder']['lastname'], $cardholder['Cardholder']['refid']); ?>			
			<?php endif; ?>
			<div class="clear"></div>
		
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?php echo $this->App->CommonHeader('Transactions History'); ?>
<div class="col-md-12">
	<ul class="nav nav-pills nav-justified">
	  <li class="active"><a data-toggle="tab" href="#trans_purchase" 	table-id="#purchase_trans_" controller="transpurchases" class="btn btn-violet btn-sm noradius">Purchases</a></li>	  
	  <li><a data-toggle="tab" href="#trans_balinq" table-id="#trans_balinq_" controller="transbalanceinquiries" class="btn btn-violet btn-sm noradius">Balance Inquiries</a></li>
	  <li><a data-toggle="tab" href="#trans_billspay" 	table-id="#bills_payment_" controller="transbillspayments" class="btn btn-violet btn-sm noradius">Bills Payment</a></li>
	  <li><a data-toggle="tab" href="#trans_cashout"  	table-id="#cashouts_trans_" controller="transcashouts" class="btn btn-violet btn-sm noradius">Cash Out</a></li>	  
	  <li><a data-toggle="tab" href="#trans_changepin" 	table-id="#changepins_trans_" controller="transchangepins" class="btn btn-violet btn-sm noradius">Change PIN</a></li>	  
	  <li><a data-toggle="tab" href="#trans_loadcash" 	table-id="#load_cash_" controller="transloadcashes" class="btn btn-violet btn-sm noradius">Load Cash</a></li>	  	  
	  <li><a data-toggle="tab" href="#trans_withdraw" 	table-id="#withdraw_trans_" controller="withdrawals"class="btn btn-violet btn-sm noradius">Withdrawals</a></li>	  
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
		  
		 <div id="trans_balinq" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Balance Inquiries'); ?>
			<div class="related col-md-8 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Status'), false, 'trans_balinq_', false); ?>
					<?php //if (!empty($cardholder['Transbalanceinquiry'])): ?>
					
					<?php //endif; ?>
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
		  
		   <div id="trans_changepin" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Change PIN'); ?>
			<div class="related col-md-8 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Status'), false, 'changepins_trans_', false); ?>
					
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

		   <div id="trans_withdraw" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader('Withdrawals'); ?>
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array('Terminal', 'Date/Time', 'Remaining', 'Amount', 'Current', 'Status'), false, 'withdraw_trans_', false); ?>
					
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
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/'.$cardholder['Card']['cardno']));
		
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
