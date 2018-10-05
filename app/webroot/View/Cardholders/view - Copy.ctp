<?php echo $this->App->CommonHeader('CARD HOLDER DETAILS'); ?>
<div class="cardholders view col-md-12">
	<h3 class="bold"><?php echo $cardholder['Cardholder']['fullname']; ?> <?php echo $this->App->btnLink('Update', 'edit', 'cardholders', 'edit', $cardholder['Cardholder']['id']); ?></h3>
	<div class="col-md-6 nopadding-left">
		<h5 class=""><?php echo __('Personal Information'); ?></h5>
		<table class="table table-condensed table-bordered fs-11">
			<tbody>
			<tr>
				<td>Date of Birth</td>
				<td class="bold text-success  text-uppercase">
					<?php echo date('Y M d', strtotime($cardholder['Cardholder']['birthdate'])); ?>
				</td>
			</tr>
			<tr>
				<td>Place of Birth</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['placeofbirth']; ?>
				</td>
			</tr>
			<tr>
				<td>Monther Maiden Name</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['mothermaiden']; ?>
				</td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['present_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['permanent_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Province Address</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['province_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Contact No.</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['contact_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Tel No.</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['tel_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Nationality</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['nationality']; ?>
				</td>
			</tr>
			<tr>
				<td>Civil Status</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['civil_status']; ?>
				</td>
			</tr>
			<tr>
				<td>ID Presented</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['idpresented']; ?><br />
					<?php echo $cardholder['Cardholder']['idp_no']; ?><br />
					<?php echo $cardholder['Cardholder']['idp_expire']; ?>
				</td>
			</tr>
			<tr>
				<td>TIN</td>
				<td class="bold text-success text-uppercase">
					<?php echo $cardholder['Cardholder']['tin']; ?>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
	<div class="col-md-6 nopadding-left">
		<h5 class=""><?php echo __('Account Information'); ?></h5>
			<?php if(!empty($cardholder['Card'])): ?>
			<table class="table table-condensed table-bordered fs-11">
			<tbody>
			<tr>
				<td>Date of Birth</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Card']['cardno']; ?>
				</td>
			</tr>
			</table>
			<?php endif; ?>
			<?php echo $this->App->btnLink('Create New Account', 'edit', 'cards', 'add', $cardholder['Cardholder']['id']); ?>			
			<div class="clear"></div>
			<h5 class=""><?php echo __('Business / Employeer Information'); ?></h5>
			<table class="table table-condensed table-bordered fs-11">
			<tbody>
			<tr>
				<td>Employeer</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['employeer']; ?>
				</td>
			</tr>
			<tr>
				<td>Position</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['position']; ?>
				</td>
			</tr>
			<tr>
				<td>Business / Employeer Address</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['business_address']; ?>
				</td>
			</tr>
			<tr>
				<td>Office No.</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['office_no']; ?>
				</td>
			</tr>
			<tr>
				<td>Bussiness Name</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['business_name']; ?>
				</td>
			</tr>
			<tr>
				<td>Annual Income</td>
				<td class="bold text-success  text-uppercase">
					<?php echo $cardholder['Cardholder']['annual_income']; ?>
				</td>
			</tr>
			</table>
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>
<?php echo $this->App->CommonHeader('Transactions History'); ?>
<div class="col-md-12">
	<ul class="nav nav-pills nav-justified">
	  <li class="active"><a data-toggle="tab" href="#trans_balinq" class="btn btn-violet btn-sm noradius">Balance Inquiries</a></li>
	  <li><a data-toggle="tab" href="#trans_billspay" class="btn btn-violet btn-sm noradius">Bills Payment</a></li>
	  <li><a data-toggle="tab" href="#trans_cashout" class="btn btn-violet btn-sm noradius">Cash Out</a></li>	  
	  <li><a data-toggle="tab" href="#trans_changepin" class="btn btn-violet btn-sm noradius">Change PIN</a></li>	  
	  <li><a data-toggle="tab" href="#trans_laodcash" class="btn btn-violet btn-sm noradius">Load Cash</a></li>	  
	  <li><a data-toggle="tab" href="#trans_purchase" class="btn btn-violet btn-sm noradius">Purchases</a></li>	  
	  <li><a data-toggle="tab" href="#trans_withdraw" class="btn btn-violet btn-sm noradius">Withdrawals</a></li>	  
	</ul>
	<div class="tab-content">
		 <div id="trans_balinq" class="tab-pane fade in active">
			<?php echo $this->App->CommonHeader('Balance Inquiries'); ?>
			<div class="related col-md-12">	
					<?php echo $this->App->tHead(array('Transcode', 'Terminal', 'Date/Time', 'POS', 'ATM', 'Status', '')); ?>
					<?php if (!empty($cardholder['Transbalanceinquiry'])): ?>
					<?php foreach ($cardholder['Transbalanceinquiry'] as $transbalanceinquiry): ?>
						<tr>			
							<td><?php echo $transbalanceinquiry['transcode']; ?></td>			
							<td><?php echo $transbalanceinquiry['terminal_id']; ?></td>
							<td><?php echo $transbalanceinquiry['transdate']; ?></td>
							<td><?php echo $transbalanceinquiry['postation_id']; ?></td>
							<td><?php echo $transbalanceinquiry['atmstation_id']; ?></td>
							<td><?php echo $transbalanceinquiry['status_id']; ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('controller' => 'transbalanceinquiries', 'action' => 'view', $transbalanceinquiry['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('controller' => 'transbalanceinquiries', 'action' => 'edit', $transbalanceinquiry['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transbalanceinquiries', 'action' => 'delete', $transbalanceinquiry['id']), array(), __('Are you sure you want to delete # %s?', $transbalanceinquiry['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					<?php endif; ?>
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>

		  </div>
	</div>
</div>
<div class="clear"></div>






<?php echo $this->App->CommonHeader('Bills Payment Transactions'); ?>
<div class="related col-md-12">
	<?php echo $this->App->tHead(array('Transcode', 'Partner', 'Terminal', 'Transdate', 'Status', '')); ?>
	<?php if (!empty($cardholder['Transbillspayment'])): ?>	
	<?php foreach ($cardholder['Transbillspayment'] as $transbillspayment): ?>
		<tr>
			<td><?php echo $transbillspayment['transcode']; ?></td>
			<td><?php echo $transbillspayment['card_id']; ?></td>
			<td><?php echo $transbillspayment['partner_id']; ?></td>
			<td><?php echo $transbillspayment['terminal_id']; ?></td>
			<td><?php echo $transbillspayment['transdate']; ?></td>
			<td><?php echo $transbillspayment['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transbillspayments', 'action' => 'view', $transbillspayment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transbillspayments', 'action' => 'edit', $transbillspayment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transbillspayments', 'action' => 'delete', $transbillspayment['id']), array(), __('Are you sure you want to delete # %s?', $transbillspayment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php endif; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>


<div class="related">
	<h3><?php echo __('Related Transcashouts'); ?></h3>
	<?php if (!empty($cardholder['Transcashout'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Cashout Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardholder['Transcashout'] as $transcashout): ?>
		<tr>
			<td><?php echo $transcashout['id']; ?></td>
			<td><?php echo $transcashout['transactiontype_id']; ?></td>
			<td><?php echo $transcashout['transcode']; ?></td>
			<td><?php echo $transcashout['card_id']; ?></td>
			<td><?php echo $transcashout['cardholder_id']; ?></td>
			<td><?php echo $transcashout['accountname']; ?></td>
			<td><?php echo $transcashout['terminal_id']; ?></td>
			<td><?php echo $transcashout['remaining_balance']; ?></td>
			<td><?php echo $transcashout['cashout_amount']; ?></td>
			<td><?php echo $transcashout['current_balance']; ?></td>
			<td><?php echo $transcashout['transdate']; ?></td>
			<td><?php echo $transcashout['atmstation_id']; ?></td>
			<td><?php echo $transcashout['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transcashouts', 'action' => 'view', $transcashout['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transcashouts', 'action' => 'edit', $transcashout['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transcashouts', 'action' => 'delete', $transcashout['id']), array(), __('Are you sure you want to delete # %s?', $transcashout['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transcashout'), array('controller' => 'transcashouts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transchangepins'); ?></h3>
	<?php if (!empty($cardholder['Transchangepin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Old Pin'); ?></th>
		<th><?php echo __('New Pin'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardholder['Transchangepin'] as $transchangepin): ?>
		<tr>
			<td><?php echo $transchangepin['id']; ?></td>
			<td><?php echo $transchangepin['transactiontype_id']; ?></td>
			<td><?php echo $transchangepin['transcode']; ?></td>
			<td><?php echo $transchangepin['card_id']; ?></td>
			<td><?php echo $transchangepin['cardholder_id']; ?></td>
			<td><?php echo $transchangepin['accountname']; ?></td>
			<td><?php echo $transchangepin['user_id']; ?></td>
			<td><?php echo $transchangepin['terminal_id']; ?></td>
			<td><?php echo $transchangepin['transdate']; ?></td>
			<td><?php echo $transchangepin['old_pin']; ?></td>
			<td><?php echo $transchangepin['new_pin']; ?></td>
			<td><?php echo $transchangepin['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transchangepins', 'action' => 'view', $transchangepin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transchangepins', 'action' => 'edit', $transchangepin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transchangepins', 'action' => 'delete', $transchangepin['id']), array(), __('Are you sure you want to delete # %s?', $transchangepin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transchangepin'), array('controller' => 'transchangepins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transloadcashes'); ?></h3>
	<?php if (!empty($cardholder['Transloadcash'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Load Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardholder['Transloadcash'] as $transloadcash): ?>
		<tr>
			<td><?php echo $transloadcash['id']; ?></td>
			<td><?php echo $transloadcash['transactiontype_id']; ?></td>
			<td><?php echo $transloadcash['transcode']; ?></td>
			<td><?php echo $transloadcash['card_id']; ?></td>
			<td><?php echo $transloadcash['cardholder_id']; ?></td>
			<td><?php echo $transloadcash['accountname']; ?></td>
			<td><?php echo $transloadcash['user_id']; ?></td>
			<td><?php echo $transloadcash['terminal_id']; ?></td>
			<td><?php echo $transloadcash['transdate']; ?></td>
			<td><?php echo $transloadcash['remaining_balance']; ?></td>
			<td><?php echo $transloadcash['load_amount']; ?></td>
			<td><?php echo $transloadcash['current_balance']; ?></td>
			<td><?php echo $transloadcash['atmstation_id']; ?></td>
			<td><?php echo $transloadcash['postation_id']; ?></td>
			<td><?php echo $transloadcash['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transloadcashes', 'action' => 'view', $transloadcash['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transloadcashes', 'action' => 'edit', $transloadcash['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transloadcashes', 'action' => 'delete', $transloadcash['id']), array(), __('Are you sure you want to delete # %s?', $transloadcash['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transloadcash'), array('controller' => 'transloadcashes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transpurchases'); ?></h3>
	<?php if (!empty($cardholder['Transpurchase'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Total Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Postation Id'); ?></th>
		<th><?php echo __('Atmstation Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Soa'); ?></th>
		<th><?php echo __('Ornumber'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardholder['Transpurchase'] as $transpurchase): ?>
		<tr>
			<td><?php echo $transpurchase['id']; ?></td>
			<td><?php echo $transpurchase['transactiontype_id']; ?></td>
			<td><?php echo $transpurchase['transcode']; ?></td>
			<td><?php echo $transpurchase['user_id']; ?></td>
			<td><?php echo $transpurchase['card_id']; ?></td>
			<td><?php echo $transpurchase['cardholder_id']; ?></td>
			<td><?php echo $transpurchase['accountname']; ?></td>
			<td><?php echo $transpurchase['terminal_id']; ?></td>
			<td><?php echo $transpurchase['transdate']; ?></td>
			<td><?php echo $transpurchase['remaining_balance']; ?></td>
			<td><?php echo $transpurchase['total_amount']; ?></td>
			<td><?php echo $transpurchase['current_balance']; ?></td>
			<td><?php echo $transpurchase['postation_id']; ?></td>
			<td><?php echo $transpurchase['atmstation_id']; ?></td>
			<td><?php echo $transpurchase['status_id']; ?></td>
			<td><?php echo $transpurchase['soa']; ?></td>
			<td><?php echo $transpurchase['ornumber']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transpurchases', 'action' => 'view', $transpurchase['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transpurchases', 'action' => 'edit', $transpurchase['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transpurchases', 'action' => 'delete', $transpurchase['id']), array(), __('Are you sure you want to delete # %s?', $transpurchase['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transpurchase'), array('controller' => 'transpurchases', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Withdrawals'); ?></h3>
	<?php if (!empty($cardholder['Withdrawal'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transactiontype Id'); ?></th>
		<th><?php echo __('Transcode'); ?></th>
		<th><?php echo __('Card Id'); ?></th>
		<th><?php echo __('Cardholder Id'); ?></th>
		<th><?php echo __('Accountname'); ?></th>
		<th><?php echo __('Terminal Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Remaining Balance'); ?></th>
		<th><?php echo __('Withdrawal Amount'); ?></th>
		<th><?php echo __('Current Balance'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cardholder['Withdrawal'] as $withdrawal): ?>
		<tr>
			<td><?php echo $withdrawal['id']; ?></td>
			<td><?php echo $withdrawal['transactiontype_id']; ?></td>
			<td><?php echo $withdrawal['transcode']; ?></td>
			<td><?php echo $withdrawal['card_id']; ?></td>
			<td><?php echo $withdrawal['cardholder_id']; ?></td>
			<td><?php echo $withdrawal['accountname']; ?></td>
			<td><?php echo $withdrawal['terminal_id']; ?></td>
			<td><?php echo $withdrawal['transdate']; ?></td>
			<td><?php echo $withdrawal['remaining_balance']; ?></td>
			<td><?php echo $withdrawal['withdrawal_amount']; ?></td>
			<td><?php echo $withdrawal['current_balance']; ?></td>
			<td><?php echo $withdrawal['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'withdrawals', 'action' => 'view', $withdrawal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'withdrawals', 'action' => 'edit', $withdrawal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'withdrawals', 'action' => 'delete', $withdrawal['id']), array(), __('Are you sure you want to delete # %s?', $withdrawal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Withdrawal'), array('controller' => 'withdrawals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
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
	');
	
	
?>
