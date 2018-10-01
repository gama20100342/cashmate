<?php //echo $this->App->CommonHeader('Card Holder Information'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Update Account Information',
		$this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']).
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'cardapplications', 
			'index'
		).
		$this->App->Showbutton(
					'Update', 
					'btn-success pull-right fs-10 changestat m-l-3 m-r-3', 
					"cardholders", 
					'edit/'.$cardholder['Cardholder']['id'],
					'edit'
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
				'Approved Accounts', 		
				'cardapplications', 
				'index'
			),
			$this->App->ShowNormaLink(
				'View Pending Account'
			)	
		)
	);
?>

<div class="cardholders view col-md-12">
	<div class="col-md-12 nopadding m-b-10">
	<h3 class="bold nopadding nomargin">
		<span class="pull-left"><?php echo $cardholder['Cardholder']['fullname']; ?></span>
		
	</h3>
	</div>
	<div class="col-md-12 nopadding">
		<?php //echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'new_cardholder_form')); ?>
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
				<div class="col-md-8 nopadding">
					<div class="col-md-12 nopadding">
						<div class="panel panel-default noradius">
							<div class="panel-heading">Account Information</div>
							<div class="panel-body fs-12">
								<?php 
									
									$divheaders = array(
										'Birthdate', 
										'Place of Birth', 
										'Sex', 
										'Contact No',
										'Telephone No',
										'Mothers Maiden Name',
										'Present Address',
										'Permanent Address',
										'Nationality',
										'Civil Status',
										'Email',
										'ID Presented',
										'ID No.',
									);
									
									$divdata = array(
										$cardholder['Cardholder']['birthdate'],
										$cardholder['Cardholder']['placeofbirth'],
										$cardholder['Cardholder']['gender'],
										$cardholder['Cardholder']['contact_no'],
										$cardholder['Cardholder']['tel_no'],
										$cardholder['Cardholder']['mothermaiden'],
										$cardholder['Cardholder']['pre_address'],
										$cardholder['Cardholder']['per_address'],
										$cardholder['Cardholder']['nationality'],
										$cardholder['Cardholder']['civil_status'],
										$cardholder['Cardholder']['email_address'],
										$cardholder['Cardholder']['idpresented'],
										$cardholder['Cardholder']['idp_no'],						
									);
									
									foreach($divheaders as $key => $h):
										echo '<div class="col-md-4 nopadding">'.$h.'</div>';									
										echo '<div class="col-md-8 nopadding-right bold">'.$divdata[$key].'</div>';									
										echo '<div class="clear"></div>';
									endforeach;									
								?>
									<hr>
								<?php 
									
									echo $this->App->alignData('Date Enrolled', date('Y M d', strtotime($cardholder['Cardholder']['registration']))); 									
									echo $this->App->alignData('Processed by', $cardholder['Cardholder']['processed_by']); 
								?>
									
							</div>
						</div>
						
						<div class="panel panel-default noradius">
							<div class="panel-heading">Employeer & Business Information</div>
							<div class="panel-body fs-12">
								<?php 
									$divheaders = array(
										'Nature of Work', 
										'Employeer', 
										'Position', 
										'Address',
										'Nature of Business',
										'Office No.',
										'Business Name',
										'Annual Income',										
										'Source of Fund'										
									);
									
									$divdata = array(
										$cardholder['Cardholder']['nature_of_work'],
										$cardholder['Cardholder']['employeer'],
										$cardholder['Cardholder']['position'],
										$cardholder['Cardholder']['business_address'],
										$cardholder['Cardholder']['nature_of_business'],
										$cardholder['Cardholder']['office_no'],
										$cardholder['Cardholder']['business_name'],
										$cardholder['Cardholder']['annual_income'],
										$cardholder['Cardholder']['fund_source']
									);
									
									foreach($divheaders as $key => $h):
										echo '<div class="col-md-4 nopadding">'.$h.'</div>';									
										echo '<div class="col-md-8 nopadding-right bold">'.$divdata[$key].'</div>';									
										echo '<div class="clear"></div>';
									endforeach;
								?>
								
							</div>
						</div>
						
						
						<?php if(!empty($card)): ?>
						<div class="panel panel-default noradius">
							<div class="panel-heading">Card Information</div>
							<div class="panel-body fs-12">
								<?php 
									$divheaders = array(
										'Card No.', 
										'Card Holder', 
										'Card Type', 
										'Product Type',
										'Expiration Date'										
									);
									
									$divdata = array(
										$card['Card']['cardno'],										
										$card['Cardholder']['fullname'],										
										$card['Cardtype']['name'],										
										$card['Product']['name'],										
										$card['Card']['expiration'],										
									);
									
									foreach($divheaders as $key => $h):
										echo '<div class="col-md-4 nopadding">'.$h.'</div>';									
										echo '<div class="col-md-8 nopadding-right bold">'.$divdata[$key].'</div>';									
										echo '<div class="clear"></div>';
									endforeach;
								?>
								
							</div>
						</div>
						<?php endif; ?>
						
						
						
					</div>
					
						
					</div>
					<div class="col-md-4 nopadding-right">			
						<div class="panel panel-default noradius">
							<div class="panel-heading">Scanned ID</div>
							<div class="panel-body fs-12">
								<?php //echo $cardholder['Cardholderid']['path']; ?>
								<img src="<?php echo $this->webroot.'app/webroot/img/'.$cardholder['Cardholderid']['path']; ?>" class="img-responsive text-center"/>
								
							</div>
						</div>
						
						
					</div>
					<div class="clear"></div>
					
					

			</fieldset>			
		</div>
		
		
		
		<div class="clear"></div>
		
		<div class="btn-group m-b-20">
			<?php echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>
		</div>		
		
		
		
		<div class="clear"></div>
		

</div>
<div class="clear"></div>


	
<?php
			
	echo $this->Js->Buffer('		
		$(document).ready( function(){				
			updateCardStatusLinks("sample");
		});
	');
?>
