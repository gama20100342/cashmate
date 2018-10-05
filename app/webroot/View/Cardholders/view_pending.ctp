<?php //echo $this->App->CommonHeader('Card Holder Information'); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Update Account Information',
		//$this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']).
		
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
				).
		$this->App->ShowbuttonAjax(
							'Approved Application', 
							'btn btn-violet pull-right m-l-3 fs-10 holder_status', 						
							'check',
							$this->webroot.'cardholders/updateCardStatus/1/'.$cardholder['Cardholder']['refid'].'/'.$cardholder['Cardholder']['id'].'/1'
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
								<img src="<?php echo $this->webroot.'app/webroot/'.$cardholder['Cardholderid']['path']; ?>" class="img-responsive text-center"/>
								
							</div>
						</div>
						
						
					</div>
					<div class="clear"></div>
					
					

			</fieldset>			
		</div>
		
		
		
		<div class="clear"></div>
		
		<div class="btn-group m-b-20">
			<?php //echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>
		</div>		
		
		
		
		<div class="clear"></div>
		

</div>
<div class="clear"></div>


 <div class="modal" id="_new_cardholder_noti" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
						<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
				<div class="modal-body text-center m-b-15">
					<p class="text-success fs-12 m-b-20 m-t-10 message_modal_text_nc"></p>
					<?php echo $this->Html->link('Ok', array(
						'controller' => 'cards', 
						'action' => 'add/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'/'.$cardholder['Cardholder']['cardholderstatus_id']
						),
						array('class' => 'btn btn-success btn-sm')); ?>											
				</div>
			</div>
		</div> 
   </div>
   
   
	
<?php
			
	echo $this->Js->Buffer('	
		function updateCardStatusLinksOnPage(td_id){
				
				$(".updatecardstatus-link, .holder_status").click( function(e){
					
					e.preventDefault();
					var _conf = confirm("You are about to change the status of the selected item. Please confirm.");
					
					if(_conf){
						$("#view_card_detail_").modal("hide");
						
						var _url = $(this).attr("url");
						
						
						$.ajax({
							method: "GET",
							url: _url,
							dataType: "JSON",
							cache: false,
							beforeSend: function(){
								
								_loading_message("show");
							},
							success: function(resp){						
								
								
								if(resp.status==200){							
									$(".message_modal_text_nc").html(resp.message);
									$("#_new_cardholder_noti").modal("show");
								}else{
									_responseMsg(resp.message);	
								}
								
								$(this).prop("disabled", true);
																
							},
							error: function(xJq, er1, er2){
								_responseMsg("An error occured during update " + xJq + er1, + er2);						
							},
							complete: function(){
								_loading_message("hide");
							}
						});
						
					}else{
						return false;
					}
				});
			}
	
	
		$("#_new_cardholder_noti").on("shown.bs.modal", function(){
			$(this).appendTo("body");
		});
		
		$(document).ready( function(){	
			updateCardStatusLinksOnPage("sample");
		});
	');
?>
