<?php echo $this->App->CommonHeader('POS Devices', $breadcrumbs, $this->request['controller']); ?>
<div class="col-md-12">
	<ul class="nav nav-pills">
	  <li class="active"><a data-toggle="tab" href="#active_account" table-id="#active_devices_" controller="posdevices" status= "1" class="btn btn-violet btn-sm noradius"><i class="fas fa-mobile-alt fa-lg"></i> Active </a></li>	  
	  <!--li><a data-toggle="tab" href="#inactive_account" table-id="#inactive_account_" controller="cardholders" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-lock fa-lg"></i> Inactive </a></li-->	  
	 
	</ul>
	<div class="tab-content">
		 <div id="active_account" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader('Active Devices'); ?>
			<div class="btn-group">
				<?php 
					echo $this->App->Showbutton(
						'Save as PDF', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'file-pdf'
					);
					echo $this->App->Showbutton(
						'Save as Excel', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'file-excel'
					);
					echo $this->App->Showbutton(
						'Print', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'print'
					);
					
				?>
			</div>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead(array(
						'Model', 
						'IMEI', 
						'S/N', 
						'IMEI', 
						'Registered', 
						'Status'), false, 'active_devices_', false); ?>
					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
</div>
<div class="clear"></div>

<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){		
						
			get_transaction_data_default("'.$this->webroot.'", "'.$d_id.'");
			
			$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _status			= $(this).attr("status");	
				var _action 		= "getCardHolders";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
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
