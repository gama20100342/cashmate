<?php echo $this->App->CommonHeaderWithButton(
	'Update Account Information',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'cardapplications', 
			'index'
		)	
	);
?>


<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Accounts', 		
				'cardholders', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Update Account'
			)	
		)
	);
?>

<div class="cardholders form col-md-12">
<?php echo $this->App->registrationLink(1); ?>

<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
	<fieldset>		
		
		<div class="col-md-12 m-t-10">
		<h5 class="bold text-danger nopadding nomargin"><?php echo __('Card Holder Information'); ?></h5>
		<?php		
			
			echo $this->Form->input('id');
			
			//echo $this->Form->input('refid', array('type' => 'hidden', 'default' => $refid));			
			//echo $this->Form->input('pin', array('type' => 'hidden', 'default' => $pin));			
			//echo $this->Form->input('status_id', array('type' => 'hidden', 'default' => '4')); //pending account			
			echo $this->Form->input('modified', array('type' => 'hidden', 'default' => date('Y-m-d'))); 
			echo $this->Form->input('modified_by', array('type' => 'hidden', 'default' => $author)); //pending account			
			
			echo $this->App->showForminputs(array(		
				//array('input' => 'title', 'label' => 'Title *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofTitle(), 'wrapper' => 'col-md-1'),			
				array('input' => 'lastname', 'label' => 'Last Name *', 'class' => 'letters_only lastname', 'wrapper' => 'col-md-4 nopadding'),
				array('input' => 'firstname', 'label' => 'First Name *', 'class' => 'letters_only firstname', 'wrapper' => 'col-md-4 nopadding'),
				array('input' => 'middlename', 'label' => 'Middle Name *', 'class' => 'letters_only middlename', 'wrapper' => 'col-md-4 nopadding', 'clear' => 1),				
				//array('input' => 'suffix', 'label' => 'Suffix', 'class' => 'letters_only', 'wrapper' => 'col-md-2', 'clear' => 1),
				array('input' => 'gender', 'label' => 'Sex *', 'type' => 'select', 'empty' => false, 'options' => $this->Lang->listofSex(), 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'registration', 'default' => date('Y-m-d h:i:s'), 'label' => 'Date of Application *', 'class' => 'date', 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'card_name', 'label' => 'Name to Appear on Card *', 'class' => 'letters_and_numbers card_name','wrapper' => 'col-md-8 nopadding', 'clear' => 1, 'note' => 'Should not exceed to 25 Characters')
				), true);			
				
			echo $this->App->showForminputs(array(		
				array('input' => 'birthdate', 'label' => 'Date of Birth *', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'placeofbirth', 'type' => 'text', 'label' => 'Birth Place', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),				
				//array('input' => 'present_address', 'type' => 'text', 'label' => 'Present Address *', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1),
				
				
				
				array('input' => 'tel_no', 'label' => 'Home Tel No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-2 nopadding'),
				array('input' => 'contact_no', 'label' => 'Mobile No. (+63)', 'class' => 'numbers_only contact_no', 'wrapper' => 'col-md-2 nopadding', 'clear' => 1),				
				//array('input' => 'permanent_address', 'label' => 'Permanent Address', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1),
				
				array('input' => 'email_address', 'label' => 'Email Address', 'wrapper' => 'col-md-6 nopadding'),								
				array('input' => 'nationality', 'label' => 'Nationality *', 'type' => 'select',  'selected' => 'Filipino', 'options' => $this->Lang->showNationality(), 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'civil_status', 'label' => 'Civil Status *', 'type' => 'select', 'options' => $this->Lang->showStatus(), 'wrapper' => 'col-md-3 nopadding', 'clear' => true),
				array('input' => 'mothermaiden', 'label' => 'Mother Maiden Name *', 'class' => 'letters_only', 'wrapper' => 'col-md-6 nopadding'),				
				array('input' => 'idpresented', 'label' => 'ID Presented *', 'type' => 'select', 'options' => $this->Lang->ListofIds(), 'wrapper' => 'col-md-3 nopadding'),
				array('input' => 'tin', 'label' => 'TIN/SSS/GSIS No *', 'class' => 'letters_and_numbers',  'wrapper' => 'col-md-3 nopadding', 'clear' => 1)
				//array('input' => 'province_address', 'label' => 'Province Address *', 'type' => 'text', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-12', 'clear' => 1),														
				
				
				//array('input' => 'idp_no', 'label' => 'ID No. *', 'class' => 'numbers_and_letters'),
				//array('input' => 'idp_expire', 'label' => 'Expiration date', 'type' => 'text', 'class' => 'date', 'placeholder' => 'yyyyy-mm-dd'),
				
			
			), true);		
		?>
		</div>		
		<div class="col-md-12 m-t-20">
			<h5 class="bold text-danger nopadding nomargin"><?php echo __('Present Address'); ?></h5>
			<?php
				echo $this->App->showForminputs(array(		
						array('input' => 'pre_street_no', 'label' => 'Street No.', 'type' => 'text', 'class' => 'pre_street_no numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'pre_street_name', 'label' => 'Street Name', 'type' => 'text', 'class' => 'pre_street_name numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'pre_subd_name', 'label' => 'Subdivision', 'type' => 'text', 'class' => 'pre_subd_name numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'pre_brgy', 'label' => 'Barangay', 'type' => 'text', 'class' => 'pre_brgy numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),
						array('input' => 'pre_town_city', 'label' => 'Town / City', 'type' => 'text', 'class' => 'pre_town_city numbers_and_letters', 'wrapper' => 'col-md-4 nopadding'),
						array('input' => 'pre_province', 'label' => 'Province', 'type' => 'text', 'class' => 'pre_province numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),
						array('input' => 'pre_country', 'label' => 'Country', 'default' => 'PHILIPPINES', 'type' => 'text', 'class' => 'pre_country numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1)
					)
				);
			?>
		</div>
		<div class="col-md-12 m-t-20">
			<h5 class="bold text-danger nopadding nomargin"><?php echo __('Permanent Address'); ?></h5>			
			<label class="radio-inline text-uppercase text-success fs-8 bold col-md-12 nomargin nopadding">
						<input 
						type="checkbox" 						
						class="the_same_add" 
						value="the_same_add">
						<span>The same with present address</span>					
					</label>
			<div class="clear"></div>
			<?php
				echo $this->App->showForminputs(array(		
						array('input' => 'per_street_no', 'label' => 'Street No.', 'type' => 'text', 'class' => 'per_street_no numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'per_street_name', 'label' => 'Street Name', 'type' => 'text', 'class' => 'per_street_name numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'per_subd_name', 'label' => 'Subdivision', 'type' => 'text', 'class' => 'per_subd_name numbers_and_letters', 'wrapper' => 'col-md-3 nopadding'),
						array('input' => 'per_brgy', 'label' => 'Barangay', 'type' => 'text', 'class' => 'per_brgy numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1),
						array('input' => 'per_town_city', 'label' => 'Town / City', 'type' => 'text', 'class' => 'per_town_city numbers_and_letters', 'wrapper' => 'col-md-4 nopadding'),
						array('input' => 'per_province', 'label' => 'Province', 'type' => 'text', 'class' => 'per_province numbers_and_letters', 'wrapper' => 'col-md-5 nopadding'),
						array('input' => 'per_country', 'label' => 'Country', 'default' => 'PHILIPPINES', 'type' => 'text', 'class' => 'per_country numbers_and_letters', 'wrapper' => 'col-md-3 nopadding', 'clear' => 1)
					)
				);
			?>
		</div>
		<div class="col-md-12 m-t-20">			
			<h5 class="bold text-danger nopadding nomargin"><?php echo __('Employeer / Business Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'employeer', 'label' => 'Name of Employeer','class' => 'numbers_and_letters', 'wrapper' => 'col-md-6 nopadding'),
					array('input' => 'nature_of_work', 'label' => 'Nature of Work', 'type' => 'select', 'empty' => true, 'options' => $this->Lang->listOfNatureOfWork(), 'wrapper' => 'col-md-6 nopadding', 'clear' => 1),				
					array('input' => 'position', 'label' => 'Position / Title', 'class' => 'numbers_and_letters', 'wrapper' => 'col-md-12 nopadding', 'clear' => 1),
					array('input' => 'business_address', 'label' => 'Business Address', 'type' => 'text','class' => 'numbers_and_letters', 'wrapper' => 'col-md-12 nopadding'),										
					array('input' => 'nature_of_business', 'label' => 'Nature of Business', 'type' => 'select', 'empty' => true, 'options' => $this->Lang->listOfNatureOfBusiness(), 'wrapper' => 'col-md-6 nopadding'),
					
					array('input' => 'office_no', 'label' => 'Office Contact No.', 'class' => 'numbers_only tel_no', 'wrapper' => 'col-md-3 nopadding'),															
					
					array('input' => 'annual_income', 'label' => 'Annual Income', 'placeholder' => '0.00',  'class' => 'numbers_and_letters',  'wrapper' => 'col-md-3 nopadding', 'clear' => 1),					
					array('input' => 'fund_source', 'label' => 'Source of Funds',  'class' => 'numbers_and_letters',  'wrapper' => 'col-md-12 nopadding', 'clear' => 1)					
					
				), true);		
			?>
			
			<?php		
				echo $this->Form->input('cardholderstatus_id', array('type' => 'hidden', 'default' => 4));				
				/*echo $this->App->showForminputs(array(
					array('input' => 'cardholderstatus_id', 'label' => 'Account Status', 'type' => 'select', 'selected' => 1, 'empty' => true, 'options' => $cardholderstatuses, 'wrapper' => 'col-md-3')				
				));*/
			?>
			
		</div>
		<div class="col-md-12 m-t-20">			
			<h5 class="bold text-danger nopadding nomargin"><?php echo __('Institution & Product Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(					
					array('input' => 'institution_id', 'label' => 'Select Institution', 'type' => 'select', 'class' => '__institution', 'empty' => true, 'options' => $institutions, 'wrapper' => 'col-md-6 nopadding'),									
					array('input' => 'product_id', 'label' => 'Select Product', 'type' => 'select', 'class' => '__product',  'empty' => true, 'options' => '', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1)									
					
				), true);		
			?>
			
		
			
		</div>
	
			
		<div class="clear"></div>

		
	</fieldset>			
	<?php echo $this->App->formEnd('Save Changes', '#new_cardholder_form'); ?>
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$(".the_same_add").click(function() {
				if($(this).is(":checked")){
					$(".per_street_no").val($(".pre_street_no").val());
					$(".per_street_name").val($(".pre_street_name").val());
					$(".per_street_name").val($(".pre_street_name").val());
					$(".per_subd_name").val($(".pre_subd_name").val());
					$(".per_brgy").val($(".pre_brgy").val());
					$(".per_town_city").val($(".pre_town_city").val());
					$(".per_province").val($(".pre_province").val());
					$(".per_country").val($(".pre_country").val());				
				}else{
					$(".per_street_no").val("");
					$(".per_street_name").val("");
					$(".per_street_name").val("");
					$(".per_subd_name").val("");
					$(".per_brgy").val("");
					$(".per_town_city").val("");
					$(".per_province").val("");
					$(".per_country").val("");	
				}
			});
			
			$(".__institution").change( function(){				
				var institution = $(".__institution option:selected").val();
				
				if(institution===""){
					_responseMsg("Please provide the institution.");
					$(".__product").empty();
								$(".__product").append($("<option>", { 
										value: "",
										text : "--Choose"
									}));	
									
				}else{
								
					$(".__product").empty();
								$(".__product").append($("<option>", { 
										value: "",
										text : "--Choose"
									}));				
					_loading_message("show");
					$.get("'.$this->webroot.'institutions/getproducts/" + institution, function(resp){
							__data = JSON.parse(resp)._data;	
							if(__data.length > 0){
								$.each(__data, function (i, item) {
									$(".__product").append($("<option>", { 
										value: item.id,
										text : item.name 
									}));
								});
							}else{
	
								_responseMsg("No product found.");	
							}
							
							_loading_message("hide");
					});
				}
			});
			
			
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
