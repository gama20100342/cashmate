<?php echo $this->App->CommonHeader('Register New Card', $breadcrumbs, $this->request['controller']); ?>

<div class="cardholders form">
<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
	<fieldset>		
		<div class="col-md-12">
			<h5 class="bold"><?php echo __('Purpose of Card'); ?></h5>
			<?php foreach($this->Lang->listofPurpose() as $key => $p): ?>
				<label class="radio-inline text-uppercase text-success fs-10 bold col-md-12 nomargin">
					<input 
					type="radio" 
					name="data[Cardholder][purpose]" 
					<?php
						if($p=="New Application"){
							echo 'checked';							
						}
					?>
					class="purpose" 
					value="<?php echo $p; ?>">
					<div class="m-t-3"><?php echo $p; ?></div>					
				</label>				
			<?php  endforeach; ?>
			<div id="others" class="nodisplay col-md-6 nopadding">
			<?php
				echo $this->App->showForminputs(array(						
					array('input' => 'others', 'label' => 'Please Specify', 'class' => 'letters_only')
					)
				);
			?>
			</div>
		</div>
		<div class="col-md-12 m-t-10">
		<h5 class="bold"><?php echo __('Card Holder Information'); ?></h5>
		<?php		
			
			echo $this->Form->input('refid', array('type' => 'hidden', 'default' => $refid));			
			echo $this->Form->input('pin', array('type' => 'hidden', 'default' => $pin));			
			echo $this->Form->input('status_id', array('type' => 'hidden', 'default' => '4')); //pending account			
			echo $this->Form->input('processed_by', array('type' => 'hidden', 'default' => $processed_by)); //pending account			
			
			echo $this->App->showForminputs(array(		
				//array('input' => 'title', 'label' => 'Title *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofTitle(), 'wrapper' => 'col-md-1'),			
				array('input' => 'lastname', 'label' => 'Last Name *', 'class' => 'letters_only lastname', 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'firstname', 'label' => 'First Name *', 'class' => 'letters_only firstname', 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'middlename', 'label' => 'Middle Name *', 'class' => 'letters_only middlename', 'wrapper' => 'col-md-3 nopadding'),				
				//array('input' => 'suffix', 'label' => 'Suffix', 'class' => 'letters_only', 'wrapper' => 'col-md-2', 'clear' => 1),
				array('input' => 'gender', 'label' => 'Sex *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofSex(), 'wrapper' => 'col-md-1 nopadding'),
				array('input' => 'registration', 'default' => date('Y-m-d'), 'label' => 'Date of Application *', 'class' => 'date', 'wrapper' => 'col-md-2 nopadding', 'clear' => 1),
				array('input' => 'card_name', 'label' => 'Name to Appear on Card *', 'class' => 'letters_only card_name','wrapper' => 'col-md-12 nopadding', 'clear' => 1, 'note' => 'Should not exceed to 25 Characters')
				), true);			
				
			echo $this->App->showForminputs(array(		
				array('input' => 'birthdate', 'label' => 'Date of Birth *', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'placeofbirth', 'type' => 'text', 'label' => 'Birth Place', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-4 nopadding'),				
				array('input' => 'present_address', 'type' => 'text', 'label' => 'Present Address *', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1),
				
				
				array('input' => 'permanent_address', 'label' => 'Permanent Address', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),
				array('input' => 'tel_no', 'label' => 'Home Tel No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'contact_no', 'label' => 'Mobile No. (+63)', 'class' => 'numbers_only contact_no', 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'email_address', 'label' => 'Email Address', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),				
				
				array('input' => 'nationality', 'label' => 'Nationality *', 'type' => 'select',  'selected' => 'Filipino', 'options' => $this->Lang->showNationality(), 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'civil_status', 'label' => 'Civil Status *', 'type' => 'select', 'options' => $this->Lang->showStatus(), 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'mothermaiden', 'label' => 'Mother Maiden Name *', 'class' => 'letters_only', 'wrapper' => 'col-md-3 nopadding'),				
				array('input' => 'tin', 'label' => 'TIN/SSS/GSIS No *', 'class' => 'letters_and_numbers',  'wrapper' => 'col-md-3 nopadding'),
				//array('input' => 'province_address', 'label' => 'Province Address *', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-12', 'clear' => 1),														
				array('input' => 'idpresented', 'label' => 'ID Presented *', 'type' => 'select', 'options' => $this->Lang->ListofIds(), 'clear' => 1,  'wrapper' => 'col-md-2 nopadding')
				
				//array('input' => 'idp_no', 'label' => 'ID No. *', 'class' => 'numbers_and_letters'),
				//array('input' => 'idp_expire', 'label' => 'Expiration date', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyyy-mm-dd'),
				
			
			), true);		
		?>
		</div>		
		<div class="col-md-12">			
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'nature_of_work', 'label' => 'Nature of Work', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listOfNatureOfWork(), 'wrapper' => 'col-md-4 nopadding'),
					array('input' => 'employeer', 'label' => 'Name of Employeer','class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),
					array('input' => 'position', 'label' => 'Position / Title', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),
					
					array('input' => 'business_address', 'label' => 'Business Address', 'type' => 'text','class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),										
					array('input' => 'office_no', 'label' => 'Office Contact No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-2 nopadding'),															
					array('input' => 'nature_of_business', 'label' => 'Nature of Business', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listOfNatureOfBusiness(), 'wrapper' => 'col-md-3 nopadding'),
					array('input' => 'annual_income', 'label' => 'Annual Income', 'placeholder' => '0.00',  'class' => 'numbers_and_letters',  'wrapper' => 'col-md-2 nopadding')					
					
				), true);		
			?>
			
			<?php		
				echo $this->Form->input('cardholderstatus_id', array('type' => 'hidden', 'default' => 2));				
				/*echo $this->App->showForminputs(array(
					array('input' => 'cardholderstatus_id', 'label' => 'Account Status', 'type' => 'select', 'selected' => 1, 'empty' => true, 'options' => $cardholderstatuses, 'wrapper' => 'col-md-3')				
				));*/
			?>
			
		</div>
		
		<div class="col-md-12">			
			<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardtype', 'label' => 'Card Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype', 'options' => $cardtypes, 'wrapper' => 'col-md-3'),				
					//array('input' => 'cardno', 'label' => 'Card No.', 'default' => '', 'class' => 'numbers_and_letters noborder', 'read-only' => true),				
					//array('input' => 'pin_clone', 'type' => 'password', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true),				
					
				), true);		
				
				
			?>
			<?php		
				echo $this->App->showForminputs(array(					
					array('input' => 'pin_clone', 'type' => 'password', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'default' => $pin, 'read-only' => true, 'wrapper' => 'col-md-3'),				
					
				), true);		
				
				
			?>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardstatus_id', 'label' => 'Card Status', 'type' => 'select', 'selected' => 2, 'empty' => true, 'options' => $cardstatuses, 'wrapper' => 'col-md-3')				
				));		
			?>
			
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'balance', 'placeholder' => '0.00', 'label' => 'Initial Balance ( PHP )', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-3')				
				));		
			?>
			<div class="clear"></div>
			<div class="col-md-4 nopadding m-t-20 m-b-5">
						<div class="text-success bold">CARD NO.</div>	
						<div class="text-danger fs-20 bold">
							<?php echo $bin .'-<span class="_ptype">1</span>-'.$this->App->formatSequence($last_id).'-'.$check_digit; ?>
						</div>
						<!--div class="col-md-4 nopadding"-->	
							<?php //echo $this->App->showForminputs(array(
									//array('input' => 'cardno_1s', 'default' => $bin, 'label' => '&nbsp;', 'class' => 'numbers_and_letters noborder', 'read-only' => true))); 
									
									echo $this->Form->hidden('cardno_1', array('default' => $bin)); 
									echo $this->Form->hidden('cardno_2', array('default' => '1', 'class' => '_ptype')); 
									echo $this->Form->hidden('cardno_3', array('default' => $this->App->formatSequence($last_id))); 
									echo $this->Form->hidden('cardno_4', array('default' => $check_digit)); 
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
			
		</div>
		<div class="clear"></div>
	</fieldset>		
	<div class="m-t-50"></div>
	<?php echo $this->App->formEnd('Save Information', '#new_cardholder_form'); ?>
	<div class="clear"></div>
	<div class="p-t-20"></div>
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("._cardtype").change( function(){
				$("._ptype").val($(this).val());
				$("._ptype").html($(this).val());
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
