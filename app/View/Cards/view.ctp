<?php //echo $this->App->CommonHeader('Card Details'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Update Account Information',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'cards', 
			'index/'.$card['Card']['cardstatus_id']
		)	
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Cards', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'View Card'
			)	
		)
	);
?>

<div class="cards view col-md-12 m-b-20 m-t-10">
	<div class="pull-left col-md-6 nopadding">
			<?php if(!empty($cardstatuses)): ?>
				<div class="col-md-12 nopadding">
				<?php echo $this->Form->create('Card', array('class' => 'data-form', 'id' => 'update_card_data')); ?>
				<?php 
					echo $this->Form->hidden('cardid', array('type' => 'hidden', 'default' => $card['Card']['id']));
					echo $this->Form->hidden('holderid', array('type' => 'hidden', 'default' => $card['Card']['cardholder_id']));
					echo $this->Form->hidden('refid', array('type' => 'hidden', 'default' => $card['Card']['refid']));
					
					
					echo $this->App->showForminputs(array(				
						array(
							'input' => 'status', 
							'label' => false,				
							'type' => 'select',
							'empty' => true,
							'options' => $cardstatuses,
							'default' => $card['Card']['cardstatus_id'],
							'wrapper' => 'col-md-8'
						)
						));
				?>
					<button type="button" class="btn btn-succss btn-sm btnajaxsubmit" url="<?php echo $this->webroot; ?>cards/updateCardStatusViaForm" form="#update_card_data"><i class="fas fa-save fa-lg"></i> Update Status</button>
					</form>
				</div>
				<div class="clear"></div>
				<?php endif; ?>
				<?php 
					/*if($card['Cardstatus']['id']!=="1"){
						echo $this->App->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet pull-left fs-9 updatecardstatus-link', 						
							'eye',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/1'														
						);
					}else{
						echo $this->App->ShowbuttonAjax(
							'Deactivate', 
							'btn btn-violet pull-left fs-9  m-r-3 updatecardstatus-link', 
							'eye-slash',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/2'
							
						);						
						echo $this->App->ShowbuttonAjax(
							'Suspend', 
							'btn btn-violet pull-left fs-9 m-r-3 updatecardstatus-link', 
							'cut',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/3'
							
						);
						echo $this->App->ShowbuttonAjax(
							'Report Lost', 
							'btn btn-violet pull-left fs-9 m-r-3 updatecardstatus-link', 
							'bullhorn',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/4'
							
						);
						
						echo $this->App->ShowbuttonAjax(
							'Block', 
							'btn btn-violet pull-left fs-9 updatecardstatus-link', 
							'times',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/5'
							
						);
						
					}
					*/
					
											
				?>
	</div>
	<div class="btn-group pull-right">
			<?php /*echo $this->App->Showbutton(
						'Update', 
						'btn btn-success  pull-left fs-9 m-r-3', 
						"cards", 
						'edit/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'],
						'edit'
					);*/
			?>
			
			<a href="#" data-dismiss="modal" class="pull-right btn btn-xs btn-danger fs-9 nodisplay"><i class="fas fa-times fa-lg"></i> Close</a>
			<a href="#" data-dismiss="modal" class="pull-right m-r-3 btn btn-xs btn-success fs-9 nodisplay"><i class="fas fa-credit-card fa-lg"></i> Load Card</a>
			<div class="clear"></div>
			
	</div>
	<div class="clear"></div>
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
			<th>Card No.</th>
			<th>Type / Product</th>
			<th>Card Holder</th>
			<th>Registration</th>
			<th>Activation</th>
			<th>Last Transaction</th>
			<th>Balance</th>
			<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $card['Card']['cardno']; ?></td>
				<td>
					<?php echo $card['Cardtype']['name']; ?><br />
					<?php echo $card['Product']['name']; ?>
				</td>
				<td>
					<?php echo $card['Cardholder']['fullname']; ?><br />
					<?php echo $card['Cardholder']['birthdate']; ?>
				</td>
				<td><?php echo date('Y M d', strtotime($card['Card']['registration'])); ?></td>
				<td><?php echo date('Y M d', strtotime($card['Card']['modified'])); ?></td>				
				<td><?php echo date('Y M d', strtotime($card['Card']['last_transaction'])); ?></td>				
				<td><?php echo number_format($card['Card']['balance'], 2, '.',','); ?></td>
				<td class="bold"><?php echo $card['Cardstatus']['name']; ?></td>
			</tr>
		</tbody>
	</table>
	
	<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="col-md-12">
	<?php echo $this->App->CommonHeaderWithButton(
	'Transaction History'	
	);
?>
	<ul class="nav nav-pills nav-pills-view">
	  <li class="active"><a data-toggle="tab" href="#trans_purchase" 	table-id="#purchase_trans_" controller="transpurchases" class="btn btn-violet btn-sm noradius">Purchases</a></li>	  
	  <li><a data-toggle="tab" href="#trans_balinq" 	table-id="#trans_balinq_" controller="transbalanceinquiries" class="btn btn-violet btn-sm noradius">Balance Inquiries</a></li>
	  <li><a data-toggle="tab" href="#trans_billspay" 	table-id="#bills_payment_" controller="transbillspayments" class="btn btn-violet btn-sm noradius">Bills Payment</a></li>
	  <li><a data-toggle="tab" href="#trans_cashout"  	table-id="#cashouts_trans_" controller="transcashouts" class="btn btn-violet btn-sm noradius">Cash Out</a></li>	  
	  <li><a data-toggle="tab" href="#trans_changepin" 	table-id="#changepins_trans_" controller="transchangepins" class="btn btn-violet btn-sm noradius">Change PIN</a></li>	  
	  <li><a data-toggle="tab" href="#trans_loadcash" 	table-id="#load_cash_" controller="transloadcashes" class="btn btn-violet btn-sm noradius">Load Cash</a></li>	  	  
	  <li><a data-toggle="tab" href="#trans_withdraw" 	table-id="#withdraw_trans_" controller="withdrawals"class="btn btn-violet btn-sm noradius">Withdrawals</a></li>	  
	</ul>
	<div class="tab-content">
		 <div id="trans_purchase" class="tab-pane fade in active">
			
	
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('purchases'), 'purchase_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('purchases')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		 <div id="trans_balinq" class="tab-pane fade in">
			
			
			<div class="related col-md-12 nopadding">		
					<?php echo $this->App->tHead($this->Lang->index_header('balance_inquiry'), 'trans_balinq_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('balance_inquiry')); ?>
					
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		  <div id="trans_billspay" class="tab-pane fade in">
			
		
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('bills_payment'), 'bills_payment_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('bills_payment')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_cashout" class="tab-pane fade in">
			
			<div class="related col-md-12 nopadding">		
					<?php echo $this->App->tHead($this->Lang->index_header('cashouts'), 'cashouts_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cashouts')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_changepin" class="tab-pane fade in">
			
			
			<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('change_pin'), 'changepins_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('change_pin')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_loadcash" class="tab-pane fade in">
			
			
			<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('load_cash'), 'load_cash_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('load_cash')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div>

		   <div id="trans_withdraw" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Withdrawal Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">
						<?php echo $this->App->tHead($this->Lang->index_header('cashouts'), 'withdraw_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cashouts')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div> 
	</div>
	
</div>
<div class="clear"></div>

<?php



	$controller = $this->webroot.'transpurchases';
	$action		= 'getTransactions';
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/'.$card['Card']['cardno']));
		
	echo $this->Js->Buffer('
		
		function get_transaction_data_via_modal(url, tableid){
			var _data = [];
			$.ajax({
				method		: "GET",
				url			: url,
				cache		: false,				
				beforeSend	: function(){
					_loading_message("show");
				},
				success		: function(data){
					
					var _mdata = JSON.parse(data);
					
					//console.log(_mdata);
					
						$.each(_mdata.data, function(i, item){
							_data.push(item);
						});
				
						$(tableid).DataTable({
							data: _data,
							destroy: true,							
							"scrollY": "200px",
							"scrollCollapse": false,
							/*"columnDefs": [{
								"targets": [4, 8],
								"orderable": false
							}],*/
							"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
							"bStateSave": false, 
							"pagingType": "full_numbers"
							
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
		
		function get_transaction_data(url, tableid, _total){
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
						"scrollY": "200px",
						"scrollCollapse": false,
						"columnDefs": [{
							"targets": [5],
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
					
					$(_total).html(_data.length);
					
					$(".card-link-modal").click( function(){
							var _surl 		= $(this).attr("url");
							var _murl 		= $(this).attr("data-_murl");
							var td_id 		= $(this).attr("data-td-id");
							var _type 		= $(this).attr("data-_type");
							var _cardno		= $(this).attr("data-cardno");	
							
							$.get(_surl, function(resp){
								$("#modal_req_content").html(resp).promise().done( function(){
									if(_type=="card"){
										updateCardStatusLinks(td_id); //transaction pills
										
										get_transaction_data_via_modal(_murl, "#purchase_trans_");	
						
										$(".nav-pills-view").find("a").on("shown.bs.tab", function () {			
											var _table_id  		= $(this).attr("table-id");
											var _controller 	= $(this).attr("controller");												
											var _action 		= "getTransactions";																				
											var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _cardno;
											if(_url !==""){
												
												//$(_table_id).DataTable().destroy();
												//$(_table_id + " tbody").empty();
												get_transaction_data_via_modal(_url, _table_id);
											}else{
												_error_message("show", "Unable to process your request at the moment, please try again later");
											}
										});
									}else{
										updateCardStatusLinks(td_id); 
									}
									
									ajaxFormSubmit();
									
								});
							
								
							})
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
			
			get_transaction_data_via_modal("'.$url.'", "#purchase_trans_");	
						
										$(".nav-pills-view").find("a").on("shown.bs.tab", function () {			
											var _table_id  		= $(this).attr("table-id");
											var _controller 	= $(this).attr("controller");												
											var _action 		= "getTransactions";																				
											var _cardno			= $(this).attr("data-cardno");	
											var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _cardno;
											if(_url !==""){
												
												//$(_table_id).DataTable().destroy();
												//$(_table_id + " tbody").empty();
												get_transaction_data_via_modal(_url, _table_id);
											}else{
												_error_message("show", "Unable to process your request at the moment, please try again later");
											}
										});
			
			ajaxFormSubmit();
			updateCardStatusLinks(td_id); 
			
		});
	');
?>
