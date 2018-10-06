<?php //echo $this->App->CommonHeader('Card Holder Information'); ?>
<div class="cardholders view col-md-12 m-b-40 m-t-10">
	<div class="col-md-12 nopadding m-b-10">
	<h3 class="bold nopadding nomargin">
		<span class="pull-left"><?php echo $cardholder['Cardholder']['fullname']; ?></span>
		<div class="btn-group pull-right">
			<?php //echo $this->App->showHolderStatusAction($cardholder['Cardholder']['cardholderstatus_id'], $cardholder['Cardholder']['refid'], $cardholder['Cardholder']['id']); ?>			
			<?php 
				echo $this->App->Showbutton(
					'Back', 
					'btn-violet pull-right fs-9 changestat m-l-3 m-r-3', 
					"cardholders", 			
					'tag_cards'
				);		
			?>
			<?php 
				echo $this->App->Showbutton(
					'Link Card', 
					'btn-violet pull-right fs-9 changestat m-l-3 m-r-3', 
					'cards', 			
					'add/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'/'.$cardholder['Cardholder']['cardholderstatus_id'],
					'credit-card'
				);		
			?>
		</div>
		<div class="clear"></div>		
		<div class="fs-11">Account Status: <span class="text-success"><?php echo $cardholder['Cardholderstatus']['name']; ?></span></div>		
		<div class="clear"></div>
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
				<div class="col-md-12 nopadding">
					
					<div class="col-md-8 nopadding">
					
						
					
						<div class="panel panel-success noradius">
							<div class="panel-heading">Cards</div>
							<div class="panel-body">								
																		
									<div class="col-md-12 nopadding">
													<ul class="nav nav-tabs">
																  <li class="active"><a data-toggle="tab" href="#active_card__" total="#total_active" table-id="#active_card_" controller="cards" status = "1" class="noradius">Active</a></li>	  
																  <li><a data-toggle="tab" href="#inactive_card__" table-id="#inactive_card_" total="#total_inactive" controller="cards" status = "2" class="noradius">Inactive</a></li>
																  <li><a data-toggle="tab" href="#suspended_card__" table-id="#suspended_card_" total="#total_suspended" controller="cards" status = "3" class="noradius">Stolen </a></li>	  	
																  <li><a data-toggle="tab" href="#lost_card__" 	table-id="#lost_card_" total="#total_lost" controller="cards" status = "4" class="noradius">Lost</a></li>
																  <li><a data-toggle="tab" href="#block_card__" 	table-id="#block_card_" total="#total_blocked" controller="cards" status = "5" class="noradius">Temporary Blocked</a></li>
																  <li><a data-toggle="tab" href="#perblock_card__" 	table-id="#perblock_card_" total="#total_perblocked" controller="cards" status = "6" class="noradius">Permanent Blocked</a></li>
																 
															</ul>
															
															<div class="tab-content">
																 <div id="active_card__" class="tab-pane fade in active">
																	
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Card No.</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php if(!empty($active_cards)): ?>
																				<?php foreach($active_cards as $c): ?>
																					<tr>
																						<td><?php echo $c['Card']['cardno']; ?></td>
																						<td style="width: 2%;">
																							<?php echo '<a href="#" 
																								url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																								title="View Card" 
																								data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																								data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																								
																								data-_type = "card"										
																								
																								class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																						</td>
																					</tr>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</tbody>
																	</table>

																  </div>
																  
																  <div id="inactive_card__" class="tab-pane fade in">
																	
																	<table class="table table-condensed">
																			<thead>
																				<tr>
																					<th>Card No.</th>
																					<th>Action</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php if(!empty($inactive_cards)): ?>
																					<?php foreach($inactive_cards as $c): ?>
																						<tr>
																							<td><?php echo $c['Card']['cardno']; ?></td>
																							<td style="width: 2%;">
																								<?php echo '<a href="#" 
																									url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																									title="View Card" 
																									data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																									data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																									
																									data-_type = "card"										
																									
																									class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																							</td>
																						</tr>
																					<?php endforeach; ?>
																				<?php endif; ?>
																			</tbody>
																		</table>

																  </div>
																  
																 <div id="suspended_card__" class="tab-pane fade in">
																	
																	
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Card No.</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php if(!empty($suspended_cards)): ?>
																				<?php foreach($suspended_cards as $c): ?>
																					<tr>
																						<td><?php echo $c['Card']['cardno']; ?></td>
																						<td style="width: 2%;">
																							<?php echo '<a href="#" 
																								url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																								title="View Card" 
																								data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																								data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																								
																								data-_type = "card"										
																								
																								class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																						</td>
																					</tr>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</tbody>
																	</table>

																  </div>
																  
																  
																  <div id="lost_card__" class="tab-pane fade in">

																	
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Card No.</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php if(!empty($lost_cards)): ?>
																				<?php foreach($lost_cards as $c): ?>
																					<tr>
																						<td><?php echo $c['Card']['cardno']; ?></td>
																						<td style="width: 2%;">
																							<?php echo '<a href="#" 
																								url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																								title="View Card" 
																								data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																								data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																								
																								data-_type = "card"										
																								
																								class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																						</td>
																					</tr>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</tbody>
																	</table>

																  </div>
																  
																  <div id="block_card__" class="tab-pane fade in">
																	
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Card No.</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php if(!empty($blocked_cards)): ?>
																				<?php foreach($blocked_cards as $c): ?>
																					<tr>
																						<td><?php echo $c['Card']['cardno']; ?></td>
																						<td style="width: 2%;">
																							<?php echo '<a href="#" 
																								url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																								title="View Card" 
																								data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																								data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																								
																								data-_type = "card"										
																								
																								class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																						</td>
																					</tr>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</tbody>
																	</table>

																  </div>
																  
																  <div id="perblock_card__" class="tab-pane fade in">
																	
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Card No.</th>
																				<th>Action</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php if(!empty($perblock_cards)): ?>
																				<?php foreach($perblock_cards as $c): ?>
																					<tr>
																						<td><?php echo $c['Card']['cardno']; ?></td>
																						<td style="width: 2%;">
																							<?php echo '<a href="#" 
																								url="'.$this->webroot.'cards/viewClientCard/'.$cardholder['Cardholder']['id'].'/'.$cardholder['Cardholder']['refid'].'" 
																								title="View Card" 
																								data-td-id = "td_'.$cardholder['Cardholder']['id'].'"
																								data-_murl = "'.$this->webroot.'transpurchases/getTransactions/'.$c['Card']['cardno'].'"
																								
																								data-_type = "card"										
																								
																								class="fs-11 _modal-link nooutline td_'.$cardholder['Cardholder']['id'].'"><i class="fas fa-eye fa-lg"></i></a>'; ?>
																						</td>
																					</tr>
																				<?php endforeach; ?>
																			<?php endif; ?>
																		</tbody>
																	</table>

																  </div>
																  

														</div>
									</div>
									
							</div>
						</div>
						
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
									<hr>
								<?php 
									
									echo $this->App->alignData('Approved Date', date('Y M d', strtotime($cardholder['Cardholder']['approved']))); 									
									echo $this->App->alignData('Approved by', $cardholder['Cardholder']['approved_by']); 
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
						
						
						
					</div>
					
					<div class="col-md-4 nopadding-right">
						<div class="panel panel-default noradius">
							<div class="panel-heading">Current Card Information</div>
							<div class="panel-body">
								<?php if(!empty($card)): ?>
								<?php 
									$divheaders = array(
										'Card No.', 
										'Balance', 
										'Card Holder', 
										'Card Type', 
										'Product Type',
										'Expiration Date'										
									);
									
									$divdata = array(
										$card['Card']['cardno'],										
										number_format($card['Card']['balance'], 2, ".", ","),									
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
								<?php endif; ?>
							</div>
						</div>
						
						<?php if($this->Session->read('Auth.User.group_id') ==1 ): ?>
						<div class="panel panel-success noradius">
							<div class="panel-heading">Account Action</div>
							<div class="panel-body">
								<div class="col-md-12 nopadding">
									<?php echo $this->Form->create('Cardholder', array('class' => 'data-form', 'id' => 'update_cardholder_data')); ?>
									<?php 
										echo $this->Form->hidden('id', array('type' => 'hidden', 'default' => $cardholder['Cardholder']['id']));
										echo $this->Form->hidden('refid', array('type' => 'hidden', 'default' => $cardholder['Cardholder']['refid']));
										
										echo $this->App->showForminputs(array(				
											array(
												'input' => 'status', 
												'label' => false,				
												'type' => 'select',
												'empty' => true,
												'options' => $cardholderstatuses,
												'wrapper' => 'col-md-12',
												'clear'	=> 1
											)
											));
									?>
										<button type="button" class="btn btn-succss btn-sm btnajaxsubmit" url="<?php echo $this->webroot; ?>cardholders/updateStatusViaForm" form="#update_cardholder_data"><i class="fas fa-save fa-lg"></i> Update Status</button>
										</form>
									</div>
									<div class="clear"></div>
							</div>
						</div>
						<?php endif; ?>
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
			ajaxFormSubmit();
		});
	');
?>

