<?php //echo $this->App->CommonHeader('Generate New Card', $breadcrumbs, $this->request['controller']); ?>
<?php /*echo $this->App->CommonHeaderWithButton(
	'Register New Account',
		$this->App->Showbutton(
			'Skip Card Registration', 
			'btn-violet pull-right fs-10', 
			'cardapplications', 
			'index'
		)
	);*/
?>


<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Accounts', 		
				'cardholders', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Enroll New Account', 		
				'cardholders', 
				'add'
			),
			$this->App->ShowNormaLink(
				'Upload Scanned ID'				
			),
			$this->App->ShowNormaLink(
				'Generate Card'
			)	
		)
	);
?>

<div class="cardholders form col-md-12">
	
	
	<?php echo $this->App->registrationLink(3); ?>
	<?php echo $this->Form->create('Card', array('class' => 'data-form noborder', 'id' => 'new_card_form')); ?>
	
	<div class="col-md-12 bg-gray p-t-5 p-b-5 p-l-5 p-r-5 m-t-10">
		<h5 class="bold bold nomargin"><?php echo __('Card Holder'); ?></h5>
		<h4 class="nomargin bold">
			<div class="col-md-10 nopadding">
				<?php echo $holder['Cardholder']['firstname'].' '.$holder['Cardholder']['middlename'].' '.$holder['Cardholder']['lastname']; ?>
				<div class="fs-10">Registration Date <?php echo date('Y M d', strtotime($holder['Cardholder']['registration'])); ?></div>
				<div class="fs-10">Processed By : <?php echo $holder['Cardholder']['processed_by']; ?> </div>			
			</div>
			<div class="col-md-2 nopadding">
			<?php 
				echo $this->App->Showbutton(
					'Skip Card Link', 
					'btn-violet pull-right fs-10', 
					'cardholders', 
					'add/new'
				);
			?>
			</div>
			<div class="clear"></div>
		</h4>
	</div>
	<div class="clear"></div>
	<ul class="nav nav-pills">		
		<li class="active">
			<a	data-toggle="tab" 
				href="#personalized_content" 
				total="#total_active" 
				title="Link to Personalized Card"  
				table-id="#active_account_" 
				controller="users" 
				status = "1" 
				class="btn btn-violet btn-sm noradius">
					<i class="fas fa-id-card-alt fa-lg"></i> 
					<h4 class="nopadding nomargin fs-12">Personalized</h4>
			</a>
		</li>	  		
		<li>
			<a 	data-toggle="tab" 
				href="#pregen_content" 	
				total="#total_pending" 
				title="Link to a Pre-Generated Card"  
				table-id="#pending_account_" 
				controller="users" 
				status = "2" 
				class="btn btn-violet btn-sm noradius">
					<i class="fas fa-credit-card fa-lg"></i> 
					<h4 class="nopadding nomargin fs-12">Pre-Generated</h4>
			</a>
		</li>				
	</ul>
	<div class="tab-content">
	
		<div id="personalized_content" class="tab-pane fade in active">			
			<fieldset>		
				<div class="col-md-12 nopadding">		
					
					<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(
							array('input' => 'cardtype_id', 'label' => 'Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype', 'options' => $cardtypes, 'wrapper' => 'col-md-2 nopadding'),							
							array('input' => 'institution_id', 'label' => 'Institution', 'type' => 'select', 'empty' => true, 'class' => '_institution', 'options' => $institutions, 'wrapper' => 'col-md-10 nopadding', 'clear' => 1),							
							array('input' => 'product_id', 'label' => 'Product', 'type' => 'select', 'empty' => false, 'class' => '_product_type', 'options' => $products, 'wrapper' => 'col-md-9 nopadding')												
						), true);		
						
						
					?>
					<?php		
						echo $this->App->showForminputs(array(					
							array('input' => 'pin_clone', 'type' => 'password', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true, 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),				
							
						), true);		
				
						echo $this->Form->hidden('balance', array('type' => 'hidden', 'default' => '0')); 
					
					?>
					<div class="clear"></div>
					<div class="col-md-4 nopadding m-t-20 m-b-5">
								<div class="text-success bold">CARD NO.</div>	
								<div class="text-danger fs-20 bold">
									<?php echo $bin .'-<span class="_ptype">1</span>-<span class="_sequence">'.$this->App->formatSequence($last_id).'</span>-'.$check_digit; ?>
								</div>
							
									<?php  										
										
										echo $this->Form->hidden('cardno_1', array('type' => 'hidden', 'default' => $bin)); 
										echo $this->Form->hidden('cardno_2', array('type' => 'hidden', 'default' => '1', 'class' => '_ptype')); 
										echo $this->Form->hidden('cardno_3', array('type' => 'hidden', 'class' => '_sequence', 'default' => $this->App->formatSequence($last_id))); 
										echo $this->Form->hidden('cardno_4', array('type' => 'hidden', 'default' => $check_digit)); 
										echo $this->Form->hidden('processed_by', array('default' => $processed_by)); 									
										echo $this->Form->hidden('refid', array('type' => 'hidden', 'default' => $cardholder_ref)); 									
										echo $this->Form->hidden('cardholder_id', array('type' => 'hidden', 'default' => $cardholder_id)); 									
										echo $this->Form->hidden('pincode', array('type' => 'hidden', 'default' => $pin)); 									
										echo $this->Form->hidden('cardstatus_id', array('type' => 'hidden', 'default' => 2)); 									
										
									?>
																	
								<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</fieldset>		
			<?php //echo $this->App->formEnd('Finish', '#new_card_form'); ?>
			<?php //echo $this->Form->end(); ?>
			
		</div>
		<div id="pregen_content" class="tab-pane fade in">	
		
			<?php //echo $this->Form->create('Cardgen', array('url' => array('controller' => 'cards', 'action' => 'add_pregen'), 'class' => 'data_form', 'id' => 'new_card_form_')); ?>
			<fieldset>		
				<div class="col-md-12 nopadding">		
					
					<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(
							array('input' => '_cardtype_id', 'label' => 'Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype', 'options' => $_cardtypes, 'wrapper' => 'col-md-2 nopadding'),							
							array('input' => '_institution_id', 'label' => 'Institution', 'type' => 'select', 'empty' => true, 'class' => '__institution', 'options' => $institutions, 'wrapper' => 'col-md-10 nopadding', 'clear' => 1),							
							array('input' => '_product_id', 'label' => 'Product', 'type' => 'select', 'empty' => true, 'class' => '__product_type', 'options' => $products, 'wrapper' => 'col-md-9 nopadding')												
						), true);		
						
						
					?>
					<?php		
						echo $this->App->showForminputs(array(					
							array('input' => '_spin_clone', 'type' => 'password', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true, 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),				
							array('input' => '_pin_clone', 'type' => 'hidden', 'label' => 'Personal Identification No.( PIN )', 'class' => '_pin_clone noborder', 'default' => $pin, 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),				
							
						), true);		
				
						//echo $this->Form->hidden('balance', array('type' => 'hidden', 'default' => '0')); 
					
					?>
					<div class="clear"></div>
					<div class="col-md-4 nopadding m-t-20 m-b-5">
								<div class="text-success bold">SELECT CARD NO.</div>	
								<div class="text-danger fs-20 bold">
									<?php //echo $this->Form->input('cardno', array('label' => false, 'id' => '_cardno')); ?>
									<select name="data[Card][cardno]" class="form-control input-lg" id="_cardno">
										<option value="">--Choose Card--</option>
									</select>
									<?php echo $this->Form->hidden('_cardno', array('type' =>'hidden', 'class' => '_cardno_')); ?>								
								</div>
							
									<?php  										
										
										//echo $this->Form->hidden('cardno_1', array('type' => 'hidden', 'default' => $bin)); 
										//echo $this->Form->hidden('cardno_2', array('type' => 'hidden', 'default' => '1', 'class' => '_ptype')); 
										//echo $this->Form->hidden('cardno_3', array('type' => 'hidden', 'class' => '_sequence', 'default' => $this->App->formatSequence($last_id))); 
										//echo $this->Form->hidden('cardno_4', array('type' => 'hidden', 'default' => $check_digit)); 
										echo $this->Form->hidden('_processed_by', array('default' => $processed_by)); 									
										echo $this->Form->hidden('_refid', array('type' => 'hidden', 'default' => $cardholder_ref)); 									
										echo $this->Form->hidden('_cardholder_id', array('type' => 'hidden', 'default' => $cardholder_id)); 									
										//echo $this->Form->hidden('pincode', array('type' => 'hidden', 'default' => $pin)); 									
										echo $this->Form->hidden('_cardstatus_id', array('type' => 'hidden', 'default' => 2)); 									
										
									?>
																	
								<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</fieldset>		
			
		</div>
	</div>	
	<?php echo $this->App->formEnd('Finish', '#new_card_form'); ?> 
	
	<div class="clear"></div>

	
	
	
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			var __data = [];
			
			$("._institution").change( function(){
				var selected = $("._institution option:selected").val();
				
				//alert(selected);
				
			});
			
			$("._product_type").change( function(){
				$("._ptype").val($(this).val());
				$("._ptype").html($(this).val());
				var selected = $("._product_type option:selected").val();		
				$.get("'.$this->webroot.'cards/getCardLastSequence/" + selected, function(resp){
						var _data = JSON.parse(resp).message;
						$("._sequence").val(_data);
						$("._sequence").html(_data);
						
						//$("._ptype").val(_data);
						//$("._ptype").html(_data);
				
				});
			});
			
			
			$(".__product_type, .__institution").change( function(){
				var product 	= $(".__product_type option:selected").val();
				var institution = $(".__institution option:selected").val();
				
				if(institution==="" || product===""){
					_responseMsg("Please provide the product and institution.");
					$("#_cardno").empty();
								$("#_cardno").append($("<option>", { 
										value: "",
										text : "--Choose Card--"
									}));	
									
				}else{
					$.get("'.$this->webroot.'cardpregens/getAvailablePregenCardNo/" + product + "/" + institution, function(resp){
							__data = JSON.parse(resp)._data;	
							
							if(__data.length > 0){
								$.each(__data, function (i, item) {
									$("#_cardno").append($("<option>", { 
										value: item,
										text : item 
									}));
								});
							}else{
								$("#_cardno").empty();
								$("#_cardno").append($("<option>", { 
										value: "",
										text : "--Choose Card--"
									}));
								_responseMsg("No Pre-generated card found.");	
							}
					});
				}
			});
			
			$("#_cardno").change( function(){
				var _cardno = ($(this).val());
				
				if(_cardno===""){
					_responseMsg("Please choose a card no.");	
				}else{
					$.get("'.$this->webroot.'cardpregens/getAvailablePregenPinCode/" + _cardno, function(resp){
							__data = JSON.parse(resp)._data;	
							
							if(__data.length > 0){								
								$("._pin_clone").val(__data);
								$("._cardno_").val(_cardno);
								
							}else{
								$("#_cardno").empty();
								$("#_cardno").append($("<option>", { 
										value: "",
										text : "--Choose Card--"
									}));
								_responseMsg("No Pre-generated card found.");	
							}
					});
				}
				
			});
			
			
			
			$(".tel_no").inputmask("999-999-9999");
			$(".contact_no").inputmask("999-999-9999");
			
			$(".purpose").click( function(){
				var purp = $("input:radio.purpose:checked").val();				
				if(purp=="Others"){				
					$("#others").removeClass("nodisplay");
				}else{
					$("#others").addClass("nodisplay");
				}
			});
			
			$(".middlename").focusout( function(){
				$(".card_name").val($(".firstname").val() + " " + $(".middlename").val() + " " + $(".lastname").val());				
			});
		});
	');
?>
