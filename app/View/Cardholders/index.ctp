<?php //echo $this->App->CommonHeader('Manage Card Holders', $breadcrumbs, $this->request['controller']); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Manage Card Holders',
		$this->App->Showbutton(
			'Register', 
			'btn-violet pull-right fs-10', 
			'cardholders', 
			'add', 
			'plus'
		). 
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'cardholders', 
			'index', 
			'list'
		)
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Card Holders', 		
				'cardholders', 
				'index'
			),			
			$this->App->ShowNormaLink(
				'Manage'
			)	
		)
	);
?>

<div class="col-md-12">
	<ul class="nav nav-pills">
		<li class="<?php echo isset($status) && $status=="1" ? 'active': ''; ?>"><a data-toggle="tab" href="#approved_account" total="#total_approved" title="Approved Accounts" table-id="#approved_account_" controller="cardholders" status = "1" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-check fa-lg"></i> Active </a></li>	  
		<li class="<?php echo isset($status) && $status=="2" ? 'active': ''; ?>"><a data-toggle="tab" href="#active_account" total="#total_active" title="Active Accounts"  table-id="#active_account_" controller="cardholders" status = "2" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-check fa-lg"></i> Inactive</a></li>	  
		<li class="nodisplay <?php echo isset($status) && $status=="3" ? 'active': ''; ?>"><a data-toggle="tab" href="#inactive_account" total="#total_inactive"title="Inactive Accounts"  table-id="#inactive_account_" controller="cardholders" status = "3" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-times fa-lg"></i> Inactive</a></li>	  	  
		<li class="nodisplay <?php echo isset($status) && $status=="4" ? 'active': ''; ?>"><a data-toggle="tab" href="#pending_account" 	total="#total_pending" title="Pending / For Approval Accounts"  table-id="#pending_account_" controller="cardholders" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-alt-slash fa-lg"></i> Pending </a></li>
		<li class="nodisplay <?php echo isset($status) && $status=="5" ? 'active': ''; ?>"><a data-toggle="tab" href="#rejected_account" total="#total_rejected" title="Rejected Accounts"  table-id="#rejected_account_" controller="cardholders" status = "5" class="btn btn-violet btn-sm noradius"><i class="fas fa-eye-slash fa-lg"></i> Rejected </a></li>
		<li class="nodisplay <?php echo isset($status) && $status=="6" ? 'active': ''; ?>"><a data-toggle="tab" href="#blocked_account" total="#total_blocked" title="Blocked Accounts"  table-id="#blocked_account_" controller="cardholders" status = "6" class="btn btn-violet btn-sm noradius"><i class="fas fa-eye-slash fa-lg"></i> Blocked </a></li>	 
	</ul>
	<div class="tab-content">
		 <div id="approved_account" class="tab-pane fade in <?php echo isset($status) && $status=="1" ? 'active': ''; ?>">
		
		
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_approved">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 1)
			); ?>
			
			
			
			<div class="related col-md-12 nopadding">					
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'approved_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
				</div>
				<div class="clear"></div>
		  </div>
		  
		  
		   <div id="active_account" class="tab-pane fade in <?php echo isset($status) && $status=="2" ? 'active': ''; ?>">
			
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_active">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 2)
			); ?>
			
			
		
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'active_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
				</div>
				<div class="clear"></div>
		  </div>
		  
		   <div id="inactive_account" class="tab-pane fade in <?php echo isset($status) && $status=="3" ? 'active': ''; ?>">
			
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_inactive">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 3)
			); ?>
			
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'inactive_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
					
				
				</div>
				<div class="clear"></div>
		  </div>
		  
		   <div id="pending_account" class="tab-pane fade in <?php echo isset($status) && $status=="4" ? 'active': ''; ?>">
			
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_pending">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 4)
			); ?>
			
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'pending_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
				
				</div>
				<div class="clear"></div>
		  </div>
		   <div id="rejected_account" class="tab-pane fade in <?php echo isset($status) && $status=="5" ? 'active': ''; ?>">
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_rejected">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 5)
			); ?>
			
		
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'rejected_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
					
					
				</div>
				<div class="clear"></div>
		  </div>
		   <div id="blocked_account" class="tab-pane fade in <?php echo isset($status) && $status=="6" ? 'active': ''; ?>">
			
			<?php echo $this->App->CommonHeader(
				'Total as Of <span class="bold">'.date('d M Y h:i A').'</span> [ <span class="fs-10 text-violet" id="total_blocked">0</span> ]',
				$this->App->exportButtonWithStatus('csv', 'cardholders', 6)
			); ?>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), 'blocked_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardholder')); ?>
				
				</div>
				<div class="clear"></div>
		  </div>
		
	</div>
</div>
<div class="clear"></div>

<div class="modal" id="view_content_" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-max">
		  <div class="modal-content noradius">       
			
		</div>
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
	
	
	$controller = $this->webroot.'/cardholders';
	$action		= 'getCardHolders';
	
	switch($status){
		case "1": $d_id = '#approved_account_'; $total = '#total_approved'; break;
		case "2": $d_id = '#active_account_'; $total = '#total_active'; break;
		case "3": $d_id = '#inactive_account_'; $total = '#total_inactive'; break;
		case "4": $d_id = '#pending_account_'; $total = '#total_pending'; break;
		case "5": $d_id = '#rejected_account_'; $total = '#total_rejected'; break;
		case "6": $d_id = '#blocked_account_'; $total = '#total_blocked'; break;
	}
	
	$url = str_replace(" ", "", trim($controller.' / '.$action.'/'.$status));
		
	echo $this->Js->Buffer('
			
					
		function _modal_action_link(){
				$("._modal-link").click( function(){							
							var _surl = $(this).attr("url");
							var _murl = $(this).attr("data-_murl");
							var td_id = $(this).attr("data-td-id");
							var _type = $(this).attr("data-_type");
							
							$.get(_surl, function(resp){
								$("#modal_req_content").html(resp).promise().done( function(){
									if(_type=="card"){
										updateCardStatusLinks(td_id); //transaction pills
										
										get_transaction_data_via_modal(_murl, "#purchase_trans_");	
						
										$(".nav-pills-view").find("a").on("shown.bs.tab", function () {			
											var _table_id  		= $(this).attr("table-id");
											var _controller 	= $(this).attr("controller");	
											var _status			= $(this).attr("status");	
											var _action 		= "getTransactions";																				
											var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
											if(_url !==""){												
												get_transaction_data_via_modal(_url, _table_id);
											}else{
												_error_message("show", "Unable to process your request at the moment, please try again later");
											}
										});
									}else{
										updateCardStatusLinks(td_id); 
									}
									
								});
							});
				});
	}
	
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
							"columnDefs": [{
								"targets": [3, 4, 5, 6],
								"orderable": false
							}],
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
						
						var _mdata = JSON.parse(data);
					
					
						$.each(_mdata.data, function(i, item){
							_data.push(item);
						});
				
						$(tableid).DataTable({
							data: _data,
							destroy: true,							
							"scrollY": "200px",
							"scrollCollapse": false,
							"columnDefs": [{
								"targets": [3, 4, 5, 6],
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
							
							var _surl = $(this).attr("url");
							var _murl = $(this).attr("data-_murl");
							var _type = $(this).attr("data-_type");
							var td_id = $(this).attr("data-td-id");

							$.get(_surl, function(resp){
								$("#modal_req_content").html(resp).promise().done( function(){
									if(_type=="card"){
										updateCardStatusLinks(td_id); //transaction pills
										
										get_transaction_data_via_modal(_murl, "#purchase_trans_");	
						
										$(".nav-pills-view").find("a").on("shown.bs.tab", function () {			
											var _table_id  		= $(this).attr("table-id");
											var _controller 	= $(this).attr("controller");	
											var _status			= $(this).attr("status");	
											var _action 		= "getTransactions";																				
											var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
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
									
									_modal_action_link(); 
									
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
						
			get_transaction_data("'.$url.'", "'.$d_id.'", "'.$total.'");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _status			= $(this).attr("status");	
				var _action 		= "getCardHolders";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
				var _total 			= $(this).attr("total");	
				
				if(_url !==""){
					//$(_table_id).DataTable().destroy();
					//$(_table_id + " tbody").empty();
					get_transaction_data(_url, _table_id, _total);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});
			
			_reports_action_buttons();		
			
		});
	');
?>
	