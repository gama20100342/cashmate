<?php //echo $this->App->CommonHeader('Devices', $breadcrumbs, $this->request['controller']); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Manage Terminals',
		$this->App->Showbutton(
			'Register Terminal', 
			'btn-violet pull-left fs-10', 
			'posdevices', 
			'add', 
			'plus'
		)
); ?>

<div class="col-md-12 nopadding">	
	<ul class="nav nav-pills">
	  <li class="active"><a data-toggle="tab" href="#active_account" total="#total_active" table-id="#active_devices_" controller="posdevices" status= "1" class="btn btn-violet btn-sm noradius"><i class="fas fa-fax fa-lg"></i> Active </a></li>	  
	  <!--li><a data-toggle="tab" href="#inactive_account" table-id="#inactive_account_" controller="cardholders" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-lock fa-lg"></i> Inactive </a></li-->	  
	 
	</ul>
	<div class="tab-content">
		 <div id="active_account" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader(
				'&nbsp;',
				$this->App->exportButton('csv', 'posdevices')
			); ?>
			
			
			<div class="related col-md-12 nopadding">		
					<?php echo $this->App->tHead($this->Lang->index_header('terminals'), 'active_devices_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('terminals')); ?>
				</div>
				<div class="clear"></div>

		  </div>
		  
</div>
<div class="clear"></div>

<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){		
						
			get_transaction_data_default("'.$this->webroot.'posdevices/getListofDevices/Active", "#active_devices_", [7, 8]);
			
			/*$(".nav-pills").find("a").on("shown.bs.tab", function () {
				var _table_id  		= $(this).attr("table-id");
				var _controller 	= $(this).attr("controller");	
				var _status			= $(this).attr("status");	
				var _action 		= "getCardHolders";
				var _url			= '.$this->webroot.' + _controller + "/" + _action + "/" + _status;	
				var _total 			= $(this).attr("total");	
					
				if(_url !==""){
					$(_table_id).DataTable().destroy();
					//$(_table_id + " tbody").empty();
					get_transaction_data(_url, _table_id, _total);
				}else{
					_error_message("show", "Unable to process your request at the moment, please try again later");
				}
			});*/
			
		});
	');
?>
