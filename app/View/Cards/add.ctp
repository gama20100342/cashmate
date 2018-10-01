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
<?php echo $this->Form->create('Card', array('class' => 'data-form', 'id' => 'new_card_form')); ?>
	<fieldset>		
		<div class="col-md-12 nopadding">		
			<div class="col-md-12 bg-gray p-t-5 p-b-5 p-l-5 p-r-5">
				<h5 class="bold bold nomargin"><?php echo __('Card Holder'); ?></h5>
				<h4 class="nomargin bold">
					<?php echo $holder['Cardholder']['firstname'].' '.$holder['Cardholder']['middlename'].' '.$holder['Cardholder']['lastname']; ?>
					<div class="fs-10">Registration Date <?php echo date('Y M d', strtotime($holder['Cardholder']['registration'])); ?></div>
					<div class="fs-10">Processed By : <?php echo $holder['Cardholder']['processed_by']; ?> </div>
					<div class="fs-10">Approved By : <?php echo $holder['Cardholder']['approved_by']; ?></div>
				</h4>
			</div>
			<div class="clear"></div>
			<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardtype_id', 'label' => 'Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype', 'options' => $cardtypes, 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'institution_id', 'label' => 'Institution', 'type' => 'select', 'empty' => true, 'class' => '_institution', 'options' => $institutions, 'wrapper' => 'col-md-3 nopadding'),							
					array('input' => 'product_id', 'label' => 'Product', 'type' => 'select', 'empty' => false, 'class' => '_product_type', 'options' => $products, 'wrapper' => 'col-md-3 nopadding')												
				), true);		
				
				
			?>
			<?php		
				echo $this->App->showForminputs(array(					
					array('input' => 'pin_clone', 'type' => 'password', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true, 'wrapper' => 'col-md-3 nopadding'),				
					
				), true);		
				
				
			?>
			<?php		
				/*echo $this->App->showForminputs(array(
					array('input' => 'cardstatus_id', 'label' => 'Card Status', 'type' => 'select', 'selected' => 1, 'empty' => true, 'options' => $cardstatuses, 'wrapper' => 'col-md-2')				
				));		*/
			?>
			
			<?php		
				echo $this->Form->hidden('balance', array('type' => 'hidden', 'default' => '0')); 
				
				/*
				echo $this->App->showForminputs(array(
					array('input' => 'balance', 'placeholder' => '0.00', 'label' => 'Initial Balance ( PHP )', 'default'=> '0.00', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3')				
				));		*/
				
			?>
			<div class="clear"></div>
			<div class="col-md-4 nopadding m-t-20 m-b-5">
						<div class="text-success bold">CARD NO.</div>	
						<div class="text-danger fs-20 bold">
							<?php echo $bin .'-<span class="_ptype">1</span>-<span class="_sequence">'.$this->App->formatSequence($last_id).'</span>-'.$check_digit; ?>
						</div>
						<!--div class="col-md-4 nopadding"-->	
							<?php //echo $this->App->showForminputs(array(
									//array('input' => 'cardno_1s', 'default' => $bin, 'label' => '&nbsp;', 'class' => 'numbers_and_letters noborder', 'read-only' => true))); 
									
									echo $this->Form->hidden('cardno_1', array('type' => 'hidden', 'default' => $bin)); 
									echo $this->Form->hidden('cardno_2', array('type' => 'hidden', 'default' => '1', 'class' => '_ptype')); 
									echo $this->Form->hidden('cardno_3', array('type' => 'hidden', 'class' => '_sequence', 'default' => $this->App->formatSequence($last_id))); 
									echo $this->Form->hidden('cardno_4', array('type' => 'hidden', 'default' => $check_digit)); 
									echo $this->Form->hidden('processed_by', array('default' => $processed_by)); 									
									echo $this->Form->hidden('refid', array('type' => 'text', 'default' => $cardholder_ref)); 									
									echo $this->Form->hidden('cardholder_id', array('type' => 'text', 'default' => $cardholder_id)); 									
									echo $this->Form->hidden('pincode', array('type' => 'text', 'default' => $pin)); 									
									echo $this->Form->hidden('cardstatus_id', array('type' => 'text', 'default' => 2)); 									
							?>
									
						<!--/div>
						<div class="col-md-2 nopadding">	
							<?php //echo $this->App->showForminputs(array(
									//array('input' => 'cardno_2s', 'default' => '0', 'label' => '&nbsp;', 'default' => 1, 'class' => '_ptype numbers_and_letters noborder', 'read-only' => true))); 
									
								?>
						</div>
						<div class="col-md-3 nopadding">	
							<?php //echo $this->App->showForminputs(array(
									//array('input' => 'cardno_3s', 'default' => '000001', 'label' => '&nbsp;', 'class' => 'numbers_and_letters noborder', 'read-only' => true)));
									
									?>
						</div>
						<div class="col-md-3 nopadding">	
							<?php //echo $this->App->showForminputs(array(
									//array('input' => 'cardno_4s', 'label' => '&nbsp;', 'default' => '1', 'class' => 'numbers_and_letters noborder', 'read-only' => true))); 
										
								?>
						</div-->
						<div class="clear"></div>
			</div>
			
			
			<div class="clear"></div>
			
		
	</fieldset>		
	
	<?php echo $this->App->formEnd('Finish', '#new_card_form'); ?>
	
	
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
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
