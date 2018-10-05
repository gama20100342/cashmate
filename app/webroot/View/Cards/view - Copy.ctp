<?php echo $this->App->CommonHeader('Card Details'); ?>
<div class="cards view col-md-12">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
			<th>Card No.</th>
			<th>Card Type</th>
			<th>Card Holder</th>
			<th>Application Date</th>
			<th>Activation Date</th>
			<th>Last Transaction</th>
			<th>Balance</th>
			<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $card['Card']['cardno']; ?></td>
				<td><?php echo $card['Cardtype']['name']; ?></td>
				<td>
					<?php echo $card['Cardholder']['fullname']; ?><br />
					<?php echo $card['Cardholder']['birthdate']; ?>
				</td>
				<td><?php echo $card['Cardapplication']['registered']; ?></td>
				<td><?php echo $card['Cardapplication']['registered']; ?></td>
				<td><?php echo $card['Card']['last_transaction']; ?></td>
				<td><?php echo number_format($card['Card']['balance'], 2, '.',','); ?></td>
				<td class="bold"><?php echo $card['Cardstatus']['name']; ?></td>
			</tr>
		</tbody>
	</table>
	
</div>
<?php echo $this->App->CommonHeader('Transactions History'); ?>
<div class="col-md-12">
	<ul class="nav nav-pills nav-pills-view">
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
	

	$controller = '../../../transpurchases';
	$action		= 'getTransactions';
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/'.$card['Card']['cardno']));
		
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
				var _url			= "../../../" + _controller + "/" + _action + "/" + '.$card['Card']['cardno'].';	
				if(_url !==""){
					$(_table_id).DataTable().destroy();
					$(_table_id + " tbody").empty();
					get_transaction_data(_url, _table_id);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});
			
			
		});*/
	');
?>
	
