<?php echo $this->App->CommonHeaderWithButton(
	'View Product & Limit Cycles',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'products', 
			'index'
		)
	);
?>

	
<div class="col-md-12">
		<h3 class="text-violet nopadding">
			<?php echo $product['Product']['name']; ?>
			<div class="fs-11 bold">Expiration : <?php echo $product['Product']['expiration']; ?></div>
		</h3>		
		<div class="clear m-t-10"></div>				
</div>
<div class="clear"></div>

<div class="col-md-12 nopadding">
		<ul class="nav nav-pills">
			  <li class="<?php echo ($duration=="daily" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#daily_limit" 					
					table-id="#daily_limit_" 
					controller="carddailylimits" 					
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 					
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Daily</a>
			  </li>	  
			  <li class="<?php echo ($duration=="weekly" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#weekly_limit" 					
					table-id="#weekly_limit_" 
					controller="cardweeklylimits" 					
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Weekly</a>
			  </li>
			  <li class="<?php echo ($duration=="monthly" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#monthly_limit" 					
					table-id="#monthly_limit_" 
					controller="cardmonthlylimits" 		
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 					
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Monthly </a>
			  </li>	  	
			  <li class="<?php echo ($duration=="quarterly" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#quarterly_limit" 					
					table-id="#quarterly_limit_" 
					controller="cardquarterlylimits" 					
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Quarterly</a>
			   </li>
			  <li class="<?php echo ($duration=="semiannual" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#semiannual_limit" 					
					table-id="#semiannual_limit_" 
					controller="cardsemiannuallimits" 					
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Semi Annual</a>
			  </li>
			  <li class="<?php echo ($duration=="yearly" ? 'active' : ''); ?>">
				<a 	data-toggle="tab" 
					href="#yearly_limit" 					
					table-id="#yearly_limit_" 
					controller="cardannuallimits" 					
					action="getLimitList/<?php echo $product['Product']['id']; ?>" 
					class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> Yearly</a>
			  </li>
			 
			</ul>
		
		<div class="tab-content">
			 <div id="daily_limit" class="tab-pane fade in <?php echo ($duration=="daily" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'carddailylimits', 
						'add/'.$product['Product']['id'].'/daily/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'daily_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>
			  
			   <div id="weekly_limit" class="tab-pane fade in <?php echo ($duration=="weekly" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'cardweeklylimits', 
						'add/'.$product['Product']['id'].'/weekly/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'weekly_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>
			  
			   <div id="monthly_limit" class="tab-pane fade in <?php echo ($duration=="monthly" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'cardmonthlylimits', 
						'add/'.$product['Product']['id'].'/monthly/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'monthly_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>
			  
			  <div id="quarterly_limit" class="tab-pane fade in <?php echo ($duration=="quarterly" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'cardquarterlylimits', 
						'add/'.$product['Product']['id'].'/quarterly/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'quarterly_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>
			  
			   <div id="semiannual_limit" class="tab-pane fade in <?php echo ($duration=="semiannual" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'cardsemiannuallimits', 
						'add/'.$product['Product']['id'].'/semiannual/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'semiannual_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>
			  
			   <div id="yearly_limit" class="tab-pane fade in <?php echo ($duration=="yearly" ? 'active' : ''); ?>">
				<?php echo $this->App->CommonHeader(
					$this->App->Showbutton(
						'Add Limit', 
						'btn-success pull-left fs-10', 
						'cardannuallimits', 
						'add/'.$product['Product']['id'].'/yearly/',
						'plus-circle'
					),
					'&nbsp;'
				); ?>
				<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardlimits'), 'yearly_limit_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cardlimits')); ?>						
				</div>
				<div class="clear"></div>
			  </div>

	</div>
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
							"targets": [7],
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
		
		$(document).ready( function(){		
			get_transaction_data("'.$url.'", "'.$init_table.'");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");						
				var _action 		= $(this).attr("action");
				var _url			= '.$this->webroot.' + _controller + "/" + _action;	
								
				if(_url !==""){				
					get_transaction_data(_url, _table_id);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});

			
		});
		
	');
?>


