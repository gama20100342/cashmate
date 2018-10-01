<?php //echo $this->App->CommonHeader('Card Details'); ?>
<div class="cards view col-md-12 m-b-20 m-t-10">
	<div class="pull-left col-md-6 nopadding">
			<?php if(!empty($cardstatuses)): ?>
				<div class="col-md-12 nopadding">
				<?php echo $this->Form->create('Card', array('class' => 'data-form', 'id' => 'update_card_data')); ?>
				<?php 
					echo $this->Form->hidden('cardid', array('type' => 'hidden', 'default' => $card['Card']['id']));
					echo $this->Form->hidden('holderid', array('type' => 'hidden', 'default' => $card['Card']['cardholder_id']));
					echo $this->Form->hidden('refid', array('type' => 'hidden', 'default' => $card['Card']['refid']));
					
					
					echo $this->App->showForminputs(array(				
						array(
							'input' => 'status', 
							'label' => false,				
							'type' => 'select',
							'empty' => true,
							'options' => $cardstatuses,
							'default' => $card['Card']['cardstatus_id'],
							'wrapper' => 'col-md-8'
						)
						));
				?>
					<button type="button" class="btn btn-succss btn-sm btnajaxsubmit" url="<?php echo $this->webroot; ?>cards/updateCardStatusViaForm" form="#update_card_data"><i class="fas fa-save fa-lg"></i> Update Status</button>
					</form>
				</div>
				<div class="clear"></div>
				<?php endif; ?>
				<?php 
					/*if($card['Cardstatus']['id']!=="1"){
						echo $this->App->ShowbuttonAjax(
							'Activate', 
							'btn btn-violet pull-left fs-9 updatecardstatus-link', 						
							'eye',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/1'														
						);
					}else{
						echo $this->App->ShowbuttonAjax(
							'Deactivate', 
							'btn btn-violet pull-left fs-9  m-r-3 updatecardstatus-link', 
							'eye-slash',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/2'
							
						);						
						echo $this->App->ShowbuttonAjax(
							'Suspend', 
							'btn btn-violet pull-left fs-9 m-r-3 updatecardstatus-link', 
							'cut',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/3'
							
						);
						echo $this->App->ShowbuttonAjax(
							'Report Lost', 
							'btn btn-violet pull-left fs-9 m-r-3 updatecardstatus-link', 
							'bullhorn',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/4'
							
						);
						
						echo $this->App->ShowbuttonAjax(
							'Block', 
							'btn btn-violet pull-left fs-9 updatecardstatus-link', 
							'times',
							$this->webroot.'cards/updateCardStatus/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'].'/5'
							
						);
						
					}
					*/
					
											
				?>
	</div>
	<div class="btn-group pull-right">
			<?php /*echo $this->App->Showbutton(
						'Update', 
						'btn btn-success  pull-left fs-9 m-r-3', 
						"cards", 
						'edit/'.$card['Card']['id'].'/'.$card['Card']['cardholder_id'].'/'.$card['Card']['refid'],
						'edit'
					);*/
			?>
			
			<a href="#" data-dismiss="modal" class="pull-right btn btn-xs btn-danger fs-9"><i class="fas fa-times fa-lg"></i> Close</a>
			<a href="#" data-dismiss="modal" class="pull-right m-r-3 btn btn-xs btn-success fs-9 nodisplay"><i class="fas fa-credit-card fa-lg"></i> Load Card</a>
			<div class="clear"></div>
			
	</div>
	<div class="clear"></div>
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
			<th>Card No.</th>
			<th>Type / Product</th>
			<th>Card Holder</th>
			<th>Registration</th>
			<th>Activation</th>
			<th>Last Transaction</th>
			<th>Balance</th>
			<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $card['Card']['cardno']; ?></td>
				<td>
					<?php echo $card['Cardtype']['name']; ?><br />
					<?php echo $card['Product']['name']; ?>
				</td>
				<td>
					<?php echo $card['Cardholder']['fullname']; ?><br />
					<?php echo $card['Cardholder']['birthdate']; ?>
				</td>
				<td><?php echo date('Y M d', strtotime($card['Card']['registration'])); ?></td>
				<td><?php echo date('Y M d', strtotime($card['Card']['modified'])); ?></td>				
				<td><?php echo date('Y M d', strtotime($card['Card']['last_transaction'])); ?></td>				
				<td><?php echo number_format($card['Card']['balance'], 2, '.',','); ?></td>
				<td class="bold"><?php echo $card['Cardstatus']['name']; ?></td>
			</tr>
		</tbody>
	</table>
	
	<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="col-md-12">
	<?php echo $this->App->CommonHeaderWithButton(
	'Transaction History'	
	);
?>
	<ul class="nav nav-pills nav-pills-view">
	  <li class="active"><a data-toggle="tab" href="#trans_purchase" 	table-id="#purchase_trans_" controller="transpurchases" class="btn btn-violet btn-sm noradius">Purchases</a></li>	  
	  <li><a data-toggle="tab" href="#trans_balinq" 	table-id="#trans_balinq_" controller="transbalanceinquiries" class="btn btn-violet btn-sm noradius">Balance Inquiries</a></li>
	  <li><a data-toggle="tab" href="#trans_billspay" 	table-id="#bills_payment_" controller="transbillspayments" class="btn btn-violet btn-sm noradius">Bills Payment</a></li>
	  <li><a data-toggle="tab" href="#trans_cashout"  	table-id="#cashouts_trans_" controller="transcashouts" class="btn btn-violet btn-sm noradius">Cash Out</a></li>	  
	  <li><a data-toggle="tab" href="#trans_changepin" 	table-id="#changepins_trans_" controller="transchangepins" class="btn btn-violet btn-sm noradius">Change PIN</a></li>	  
	  <li><a data-toggle="tab" href="#trans_loadcash" 	table-id="#load_cash_" controller="transloadcashes" class="btn btn-violet btn-sm noradius">Load Cash</a></li>	  	  
	  <li><a data-toggle="tab" href="#trans_withdraw" 	table-id="#withdraw_trans_" controller="withdrawals"class="btn btn-violet btn-sm noradius">Withdrawals</a></li>	  
	</ul>
	<div class="tab-content">
		 <div id="trans_purchase" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader(
				'Purchase Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
	
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('purchases'), 'purchase_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('purchases')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		 <div id="trans_balinq" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Balance Inquiry Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">		
					<?php echo $this->App->tHead($this->Lang->index_header('balance_inquiry'), 'trans_balinq_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('balance_inquiry')); ?>
					
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		  <div id="trans_billspay" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Bills Payment Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
		
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('bills_payment'), 'bills_payment_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('bills_payment')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_cashout" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Cash Out Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">		
					<?php echo $this->App->tHead($this->Lang->index_header('cashouts'), 'cashouts_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cashouts')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_changepin" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Changed PIN Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('change_pin'), 'changepins_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('change_pin')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
		   <div id="trans_loadcash" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Load Cash Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">	
						<?php echo $this->App->tHead($this->Lang->index_header('load_cash'), 'load_cash_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('load_cash')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div>

		   <div id="trans_withdraw" class="tab-pane fade in">
			<?php echo $this->App->CommonHeader(
				'Withdrawal Transactions',
				$this->App->exportButton('csv', 'cards'),
				$this->App->exportButton('print', 'cards')
			); ?>
			
			<div class="related col-md-12 nopadding">
						<?php echo $this->App->tHead($this->Lang->index_header('cashouts'), 'withdraw_trans_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('cashouts')); ?>
				
				
				</div>
				<div class="clear"></div>

		  </div> 
	</div>
	
</div>
<div class="clear"></div>

	
