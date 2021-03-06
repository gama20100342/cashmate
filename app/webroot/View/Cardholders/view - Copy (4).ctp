<?php //echo $this->App->CommonHeader('Card Holder Information'); ?>
<div class="cardholders view col-md-12 m-b-40 m-t-10">
	<div class="col-md-12 nopadding">
	<h3 class="bold nopadding nomargin">
		<span class="pull-left"><?php echo $cardholder['Cardholder']['fullname']; ?></span>
		<div class="btn-group pull-right">
			<?php echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>
			<a href="#" data-dismiss="modal" class="m-l-3 pull-right btn btn-xs btn-danger fs-9"><i class="fas fa-times fa-lg"></i> Close</a>
			<?php 
				echo $this->App->Showbutton(
					'Update', 
					'btn-success pull-right fs-9 changestat m-l-3 m-r-3', 
					"cardholders", 
					'edit/'.$cardholder['Cardholder']['id'],
					'edit'
				);		
			?>
		</div>
		<div class="clear"></div>		
		<div class="fs-12"><?php echo $cardholder['Cardholderstatus']['name']; ?></div>		
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
							array('input' => 'others', 'label' => 'Please Specify', 'class' => 'letters_only noborder')
							)
						);
					?>
					</div>
				</div>
				<div class="col-md-12 m-t-10 nopadding">
				<!--h5 class="bold"><?php //echo __('Card Holder Information'); ?></h5-->
				<?php		
								
					echo $this->App->showForminputs(array(		
						//array('input' => 'title', 'label' => 'Title *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofTitle(), 'wrapper' => 'col-md-1'),			
						array('input' => 'lastname', 'label' => 'Last Name *', 'class' => 'letters_only lastname noborder', 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
						array('input' => 'firstname', 'label' => 'First Name *', 'class' => 'letters_only firstname noborder', 'wrapper' => 'col-md-3 nopadding',  'read-only' => true),
						array('input' => 'middlename', 'label' => 'Middle Name *', 'class' => 'letters_only middlename noborder', 'wrapper' => 'col-md-3 nopadding',  'read-only' => true),				
						//array('input' => 'suffix', 'label' => 'Suffix', 'class' => 'letters_only', 'wrapper' => 'col-md-2', 'clear' => 1),
						array('input' => 'gender', 'label' => 'Sex *', 'type' => 'select', 'empty' => false, 'class'=> 'noborder', 'options' => $this->Lang->listofSex(), 'wrapper' => 'col-md-1 nopadding', 'read-only' => true),
						array('input' => 'registration', 'default' => date('Y-m-d'), 'label' => 'Date of Application *', 'class' => 'date noborder', 'wrapper' => 'col-md-2 nopadding', 'clear' => 1, 'read-only' => true),
						array('input' => 'card_name', 'label' => 'Name to Appear on Card *', 'class' => 'letters_only card_name noborder','wrapper' => 'col-md-12 nopadding', 'clear' => 1, 'read-only' => true, 'note' => 'Should not exceed to 25 Characters')
						), true);			
						
					echo $this->App->showForminputs(array(		
						array('input' => 'birthdate', 'label' => 'Date of Birth *', 'type' => 'text', 'class' => 'date noborder', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'placeofbirth', 'type' => 'text', 'label' => 'Birth Place', 'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-4 nopadding', 'read-only' => true),				
						array('input' => 'present_address', 'type' => 'text', 'label' => 'Present Address *', 'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1, 'read-only' => true),
						
						
						array('input' => 'permanent_address', 'label' => 'Permanent Address', 'type' => 'text', 'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),
						array('input' => 'tel_no', 'label' => 'Home Tel No.', 'class' => 'numbers_only tel_no noborder', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'contact_no', 'label' => 'Mobile No. (+63)', 'class' => 'numbers_only contact_no noborder', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'email_address', 'label' => 'Email Address', 'class' => 'noborder', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1, 'read-only' => true),				
						
						array('input' => 'nationality', 'label' => 'Nationality *', 'type' => 'select',  'selected' => 'Filipino', 'class' => 'noborder', 'options' => $this->Lang->showNationality(), 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'civil_status', 'label' => 'Civil Status *', 'type' => 'select', 'class' => 'noborder', 'options' => $this->Lang->showStatus(), 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),
						array('input' => 'mothermaiden', 'label' => 'Mother Maiden Name *', 'class' => 'letters_only noborder', 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),				
						array('input' => 'tin', 'label' => 'TIN/SSS/GSIS No *', 'class' => 'letters_and_numbers noborder',  'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
						//array('input' => 'province_address', 'label' => 'Province Address *', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-12', 'clear' => 1),														
						array('input' => 'idpresented', 'label' => 'ID Presented *', 'type' => 'select', 'class' => 'noborder', 'options' => $this->Lang->ListofIds(), 'clear' => 1,  'wrapper' => 'col-md-2 nopadding', 'read-only' => true)
						
						//array('input' => 'idp_no', 'label' => 'ID No. *', 'class' => 'numbers_and_letters'),
						//array('input' => 'idp_expire', 'label' => 'Expiration date', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyyy-mm-dd'),
						
					
					), true);		
				?>
				</div>		
				<div class="col-md-12 nopadding">			
					<?php		
						echo $this->App->showForminputs(array(
							array('input' => 'nature_of_work', 'label' => 'Nature of Work', 'type' => 'select', 'class' => 'noborder', 'empty' => false, 'options' => $this->Lang->listOfNatureOfWork(), 'wrapper' => 'col-md-4 nopadding', 'read-only' => true),
							array('input' => 'employeer', 'label' => 'Name of Employeer','class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),
							array('input' => 'position', 'label' => 'Position / Title', 'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1, 'read-only' => true),
							
							array('input' => 'business_address', 'label' => 'Business Address', 'type' => 'text','class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-5 nopadding', 'read-only' => true),										
							array('input' => 'office_no', 'label' => 'Office Contact No.', 'class' => 'numbers_only tel_no noborder', 'wrapper' => 'col-md-2 nopadding', 'read-only' => true),															
							array('input' => 'nature_of_business', 'label' => 'Nature of Business', 'type' => 'select', 'empty' => false, 'class' => 'noborder', 'options' => $this->Lang->listOfNatureOfBusiness(), 'wrapper' => 'col-md-3 nopadding', 'read-only' => true),
							array('input' => 'annual_income', 'label' => 'Annual Income', 'placeholder' => '0.00',  'class' => 'numbers_and_letters noborder',  'wrapper' => 'col-md-2 nopadding', 'read-only' => true)					
							
						), true);		
					?>
					
					
					
				</div>
				<div class="clear"></div>
				<div class="col-md-6 m-t-10 nopadding">
					<h5 class="bold"><?php echo __('Processed By'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(							
							array('input' => 'processed_by', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true),					
							array('input' => 'registration', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true)							
							
						), true);		
					?>
				</div>
				<div class="col-md-6 m-t-10 nopadding">
					<h5 class="bold"><?php echo __('Approved By'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(							
							array('input' => 'approved_by', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true),							
							array('input' => 'approved', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true)							
						), true);		
					?>
				</div>
				<div class="clear"></div>
				<div class="col-md-6 m-t-10 nopadding">
					<h5 class="bold"><?php echo __('Modified By'); ?></h5>
					<?php		
						echo $this->App->showForminputs(array(							
							array('input' => 'modified_by', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true),							
							array('input' => 'modified', 'label' => false,'class' => 'numbers_and_letters noborder', 'wrapper' => 'col-md-6 nopadding', 'read-only' => true)							
						), true);		
					?>
				</div>
				<div class="clear"></div>

			</fieldset>			
		</div>
		
		
		
		<div class="clear"></div>

</div>
<div class="clear"></div>


	
<?php
			
	echo $this->Js->Buffer('		
		$(document).ready( function(){				
			$(".holder_status").click( function(e){
				e.preventDefault();
				alert("asdasd");
				var yes = confirm("Continue with the approval?");
			});
		});
	');
?>
