<?php echo $this->App->CommonHeader('Card Holder Account'); ?>
<div class="cardholders view col-md-12">
	<div class="col-md-12 nopadding">
	<h3 class="bold">
		<?php echo $cardholder['Cardholder']['fullname']; ?> 
		
		<?php echo $this->App->btnLink('Update', 'edit', 'cardholders', 'edit', $cardholder['Cardholder']['id']); ?>
		
		<div class="fs-12"><?php echo $cardholder['Cardholderstatus']['name'].' / '.$this->data['Cardholder']['purpose']; ?></div>
		<div class="m-t-5 m-b-5">
			<?php echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>
		</div>
		<div class="clear"></div>
	</h3>
	</div>
	<div class="col-md-12 nopadding">
		<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
			<fieldset>	
				<?php //echo $this->Form->input('id'); ?>
				<div class="col-md-12 nopadding">
					
		
					
					<div id="others" class="<?php if($this->data['Cardholder']['purpose']!=="others"){ echo 'nodisplay'; }?> col-md-12 nopadding">
					<?php
						echo $this->App->showForminputs(array(						
							array('input' => 'others', 'label' => 'Please Specify', 'class' => 'letters_only')
							)
						);
					?>
					</div>
				</div>
				<div class="col-md-12 m-t-10 nopadding">
				<h5 class="bold"><?php echo __('Card Holder Information'); ?></h5>
				<?php		
								
					echo $this->App->showForminputs(array(		
						//array('input' => 'title', 'label' => 'Title *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofTitle(), 'wrapper' => 'col-md-1'),			
						array('input' => 'lastname', 'label' => 'Last Name *', 'class' => 'letters_only lastname', 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
						array('input' => 'firstname', 'label' => 'First Name *', 'class' => 'letters_only firstname', 'wrapper' => 'col-md-3 nopadding',  'read-only' => true),
						array('input' => 'middlename', 'label' => 'Middle Name *', 'class' => 'letters_only middlename', 'wrapper' => 'col-md-3 nopadding',  'read-only' => true),				
						//array('input' => 'suffix', 'label' => 'Suffix', 'class' => 'letters_only', 'wrapper' => 'col-md-2', 'clear' => 1),
						array('input' => 'gender', 'label' => 'Sex *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofSex(), 'wrapper' => 'col-md-1 nopadding', 'read-only' => true),
						array('input' => 'registration', 'default' => date('Y-m-d'), 'label' => 'Date of Application *', 'class' => 'date', 'wrapper' => 'col-md-2 nopadding', 'clear' => 1, 'read-only' => true),
						array('input' => 'card_name', 'label' => 'Name to Appear on Card *', 'class' => 'letters_only card_name','wrapper' => 'col-md-12 nopadding', 'clear' => 1, 'read-only' => true, 'note' => 'Should not exceed to 25 Characters')
						), true);			
						
					echo $this->App->showForminputs(array(		
						array('input' => 'birthdate', 'label' => 'Date of Birth *', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'placeofbirth', 'type' => 'text', 'label' => 'Birth Place', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-4 nopadding', 'read-only' => true),				
						array('input' => 'present_address', 'type' => 'text', 'label' => 'Present Address *', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1, 'read-only' => true),
						
						
						array('input' => 'permanent_address', 'label' => 'Permanent Address', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),
						array('input' => 'tel_no', 'label' => 'Home Tel No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'contact_no', 'label' => 'Mobile No. (+63)', 'class' => 'numbers_only contact_no', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'email_address', 'label' => 'Email Address', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1, 'read-only' => true),				
						
						array('input' => 'nationality', 'label' => 'Nationality *', 'type' => 'select',  'selected' => 'Filipino', 'options' => $this->Lang->showNationality(), 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'civil_status', 'label' => 'Civil Status *', 'type' => 'select', 'options' => $this->Lang->showStatus(), 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'mothermaiden', 'label' => 'Mother Maiden Name *', 'class' => 'letters_only', 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),				
						array('input' => 'tin', 'label' => 'TIN/SSS/GSIS No *', 'class' => 'letters_and_numbers',  'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
						//array('input' => 'province_address', 'label' => 'Province Address *', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-12', 'clear' => 1),														
						array('input' => 'idpresented', 'label' => 'ID Presented *', 'type' => 'select', 'options' => $this->Lang->ListofIds(), 'clear' => 1,  'wrapper' => 'col-md-2 nopadding', 'read-only' => true)
						
						//array('input' => 'idp_no', 'label' => 'ID No. *', 'class' => 'numbers_and_letters'),
						//array('input' => 'idp_expire', 'label' => 'Expiration date', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyyy-mm-dd'),
						
					
					), true);		
				?>
				</div>		
				<div class="col-md-12 nopadding">			
					<?php		
						echo $this->App->showForminputs(array(
							array('input' => 'nature_of_work', 'label' => 'Nature of Work', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listOfNatureOfWork(), 'wrapper' => 'col-md-4 nopadding', 'read-only' => true),
							array('input' => 'employeer', 'label' => 'Name of Employeer','class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),
							array('input' => 'position', 'label' => 'Position / Title', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1, 'read-only' => true),
							
							array('input' => 'business_address', 'label' => 'Business Address', 'type' => 'text','class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),										
							array('input' => 'office_no', 'label' => 'Office Contact No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),															
							array('input' => 'nature_of_business', 'label' => 'Nature of Business', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listOfNatureOfBusiness(), 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
							array('input' => 'annual_income', 'label' => 'Annual Income', 'placeholder' => '0.00',  'class' => 'numbers_and_letters',  'wrapper' => 'col-md-2 nopadding', 'read-only' => true)					
							
						), true);		
					?>
					
					
					
				</div>
				<div class="clear"></div>

			</fieldset>			
		</div>
		<div class="clear"></div>
	
	
<?php echo $this->App->CommonHeader('Transactions History'); ?>
<div class="col-md-12 nopadding">
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
			
			$(".changestat").click( function(e){
				e.preventDefault();
				alert("asdasd");
				var yes = confirm("Continue with the approval?");
			});
			
		});
	');
?>
