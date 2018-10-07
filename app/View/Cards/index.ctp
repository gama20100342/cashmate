<?php //echo $this->App->CommonHeader('Manage Cards'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Manage Cards'
); ?>


<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Cards', 		
				'cards', 
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
			  <li class="<?php echo (isset($status) && $status==1) ? 'active' : ''; ?>"><a data-toggle="tab" href="#active_card" total="#total_active" table-id="#active_card_" controller="cards" status = "1" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Active</a></li>	  
			  <li class="<?php echo (isset($status) && $status==2) ? 'active' : ''; ?>"><a data-toggle="tab" href="#inactive_card" table-id="#inactive_card_" total="#total_inactive" controller="cards" status = "2" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Inactive</a></li>
			  <li class="<?php echo (isset($status) && $status==3) ? 'active' : ''; ?>"><a data-toggle="tab" href="#suspended_card" table-id="#suspended_card_" total="#total_suspended" controller="cards" status = "3" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Stolen </a></li>	  	
			  <li class="<?php echo (isset($status) && $status==4) ? 'active' : ''; ?>"><a data-toggle="tab" href="#lost_card" 	table-id="#lost_card_" total="#total_lost" controller="cards" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Lost</a></li>
			  <li class="<?php echo (isset($status) && $status==5) ? 'active' : ''; ?>"><a data-toggle="tab" href="#block_card" 	table-id="#block_card_" total="#total_blocked" controller="cards" status = "5" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Temporary Blocked</a></li>
			  <li class="<?php echo (isset($status) && $status==6) ? 'active' : ''; ?>"><a data-toggle="tab" href="#perblock_card" 	table-id="#perblock_card_" total="#total_perblocked" controller="cards" status = "6" class="btn btn-violet btn-sm noradius"><i class="fas fa-credit-card fa-lg"></i> Permanent Blocked</a></li>
			 
			</ul>
		
		<div class="tab-content">
			 <div id="active_card" class="tab-pane fade in <?php echo (isset($status) && $status==1) ? 'active' : ''; ?>">
				
				
			
				<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'active_card_'); ?>					
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
						
					</div>
					<div class="clear"></div>

			  </div>
			  
			  <div id="inactive_card" class="tab-pane fade in <?php echo (isset($status) && $status==2) ? 'active' : ''; ?>">
				
			
				
				<div class="related col-md-12 nopadding">	
						
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'inactive_card_'); ?>					
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
						
					</div>
					<div class="clear"></div>

			  </div>
			  
			 <div id="suspended_card" class="tab-pane fade in <?php echo (isset($status) && $status==3) ? 'active' : ''; ?>">
				
			
				
				<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'suspended_card_'); ?>										
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
					</div>
					<div class="clear"></div>

			  </div>
			  
			  
			  <div id="lost_card" class="tab-pane fade in <?php echo (isset($status) && $status==4) ? 'active' : ''; ?>">

				
				
			
				
				<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'lost_card_'); ?>					
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
					</div>
					<div class="clear"></div>

			  </div>
			  
			  <div id="block_card" class="tab-pane fade in <?php echo (isset($status) && $status==5) ? 'active' : ''; ?>">
				
				
				<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'block_card_'); ?>					
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
					</div>
					<div class="clear"></div>

			  </div>
			  
			  <div id="perblock_card" class="tab-pane fade in <?php echo (isset($status) && $status==6) ? 'active' : ''; ?>">
				
				
				
				<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('cards'), 'perblock_card_'); ?>					
						<?php echo $this->App->tFFoot($this->Lang->index_header('cards')); ?>
					</div>
					<div class="clear"></div>

			  </div>
			  

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
	$controller = $this->webroot.'cards';
	$action		= 'getCards';
	switch($status){
		case "1":
			$t_id = '#active_card_';
		break;
		case "2":
			$t_id = '#inactive_card_';
		break;
		case "3":
			$t_id = '#suspended_card_';
		break;
		case "4":
			$t_id = '#lost_card_';
		break;
		case "5":
			$t_id = '#block_card_';
		break;
		case "6":
			$t_id = '#perblock_card_';
		break;
	}
	
	$url 		= str_replace(" ", "", trim($controller.' / '.$action.'/'.$status));
	
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
					
					//$(_total).html(_data.length);
					
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
			
			get_transaction_data("'.$url.'", "'.$t_id.'");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _status			= $(this).attr("status");	
				var _action 		= "getCards";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
				var _total 			= $(this).attr("total");	
				
				if(_url !==""){
					//$(_table_id).DataTable().destroy();
					//$(_table_id + " tbody").empty();
					get_transaction_data(_url, _table_id);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});
			
			_reports_action_buttons();		
			
		});
	');
?>