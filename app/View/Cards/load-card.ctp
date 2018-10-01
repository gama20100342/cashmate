<?php echo $this->App->CommonHeader('Card Details'); ?>
<div class="cards view col-md-12">
	<table class="table table-condensed table-bordered">
		<thead>
			<tr>
			<th>Card No.</th>
			<th>Card Type</th>
			<th>Card Holder</th>
			<th>Application Date</th>
			<th>Activation Date</th>
			<th>Last Transaction</th>
			<th>Balance</th>
			<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $card['Card']['cardno']; ?></td>
				<td><?php echo $card['Cardtype']['name']; ?></td>
				<td><?php echo $card['Cardholder']['fullname']; ?></td>
				<td><?php echo $card['Cardapplication']['registered']; ?></td>
				<td><?php echo $card['Cardapplication']['registered']; ?></td>
				<td><?php echo $card['Card']['last_transaction']; ?></td>
				<td><?php echo $card['Card']['balance']; ?></td>
				<td class="bold"><?php echo $card['Cardstatus']['name']; ?></td>
			</tr>
		</tbody>
	</table>
	
</div>
<?php echo $this->App->CommonHeader('Load Card'); ?>
<div class="col-md-12">
		<?php echo $this->Form->create('Card', array('class' => 'data-form', 'id' => 'new_card_form')); ?>
	<?php		
				echo $this->Form->input('id');
				echo $this->App->showForminputs(array(
					array('input' => 'new_balance', 'placeholder' => '0.00', 'label' => 'Amount ( PHP )','class' => 'numbers_only'),				
				));		
			?>
			
			<?php echo $this->App->formEnd('Update Card Balance', '#new_card_form'); ?>
	<div class="clear"></div>
</div>
<div class="clear"></div>

	
<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			
		});
	');
?>
	
