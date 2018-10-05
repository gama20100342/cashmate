<?php echo $this->App->CommonHeaderWithButton(
	'Manage System Access',
		$this->App->Showbutton(
			'Register', 
			'btn-violet pull-right fs-10', 
			'users', 
			'add', 
			'plus-circle'
		).
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'users', 
			'index', 
			'list'
		)
		/*.' '.	
		 $this->App->Showbutton(
			'Pending', 
			'btn-violet pull-left fs-10 noradius', 
			'users', 
			'index', 
			'user-alt-slash'
		).' '.			
		 $this->App->Showbutton(
			'Block', 
			'btn-violet pull-left fs-10 noradius', 
			'users', 
			'index', 
			'user-times'
		).' '.	
		 $this->App->Showbutton(
			'Active', 
			'btn-violet pull-left fs-10 noradius-left noradius-top', 
			'users', 
			'index', 
			'user-check'
		)	*/	
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'System Access', 		
				'users', 
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
		<li class="active"><a data-toggle="tab" href="#active_account" total="#total_active" title="Active Accounts"  table-id="#active_account_" controller="users" status = "1" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-check fa-lg"></i> Active</a></li>	  		
		<li class="nodisplay"><a data-toggle="tab" href="#pending_account" 	total="#total_pending" title="Pending Accounts"  table-id="#pending_account_" controller="users" status = "2" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-alt-slash fa-lg"></i> Pending </a></li>		
		<li><a data-toggle="tab" href="#blocked_account" total="#total_blocked" title="Blocked Accounts"  table-id="#blocked_account_" controller="users" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-eye-slash fa-lg"></i> Blocked </a></li>	 
	</ul>
	<div class="tab-content">
		   <div id="active_account" class="tab-pane fade in active">
			<?php /* echo $this->App->CommonHeader(
				'Active Accounts [ <span class="fs-10 text-violet" id="total_active">0</span> ]'
				$this->App->exportButton('csv', 'users')
			);*/ ?>
						
				<div class="related col-md-12 nopadding">						
					<?php echo $this->App->tHead($this->Lang->index_header('users'), 'active_account_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('users')); ?>
				</div>
				<div class="clear"></div>
		  </div>
		   <div id="pending_account" class="tab-pane fade in">
			<?php /*echo $this->App->CommonHeader(
				'Pending Applications [ <span class="fs-10 text-violet" id="total_pending">0</span> ]'
				//$this->App->exportButton('csv', 'users')
			);*/ ?>
			
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('users'), 'pending_account_'); ?>		
					<?php echo $this->App->tFFoot($this->Lang->index_header('users')); ?>
				</div>
				<div class="clear"></div>
		  </div>
		 
		   <div id="blocked_account" class="tab-pane fade in">
			<?php /*echo $this->App->CommonHeader(
				'Blocked Accounts [ <span class="fs-10 text-violet" id="total_blocked">0</span> ]'
				//$this->App->exportButton('csv', 'users')
			); */ ?>
			
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('users'), 'blocked_account_'); ?>		
					<?php echo $this->App->tFFoot($this->Lang->index_header('users')); ?>
				</div>
				<div class="clear"></div>
		  </div>
		
	</div>
</div>
<div class="clear"></div>

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
							"scrollY": "230px",
							"scrollCollapse": false,
							"columnDefs": [{
								"targets": [4, 5, 6],
								"orderable": false
							}],
							"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
							"bStateSave": false, 
							"pagingType": "full_numbers"
						});
						
						$(_total).html(_data.length);
						
						
						
						$(".user-link-modal").click( function(){
							
							
							var _surl = $(this).attr("url");
							var _murl = $(this).attr("data-_murl");
							var _type = $(this).attr("data-_type");
							var td_id = $(this).attr("data-td-id");
							
							_loading_message("show");
							$.get(_surl, function(resp){
								$("#modal_req_content").html(resp).promise().done( function(){
										updateCardStatusLinks(td_id);
										
										_loading_message("hide");	
										
											$("#view_user_").DataTable({
												destroy: true,		
												"scrollY": "100px",
												"scrollCollapse": false,
												"lengthMenu": [[4, 10, 25, 50, 100, -1], [4, 10, 25, 50, 100, "All"]],
												"columnDefs": [{
														"targets": [2],
														"orderable": false
												}],
												"bStateSave": false, 
												"pagingType": "full_numbers",
												
											});
											
										$(".resetpasswordbtn").click( function(){
											actionModalLink($(this).attr("url"));	
										});
								});
							});
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
						
			get_transaction_data("'.str_replace(" ", "", trim($controller.' / '.$action.'/1')).'", "#active_account_", "#total_active");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _status			= $(this).attr("status");	
				var _action 		= "getUsers";
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
			
		});
	');
?>
