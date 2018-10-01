<?php echo $this->App->tHead(array('Card No.',  'Terminal', 'Trans Date','R. Balance',  'Total Amount', 'C. Balance', 'POS', 'ATM', 'Status', 'OR No.')); ?>	
<?php foreach ($trans as $t): ?>
		<tr>
			<!--td><?php //echo $t['User']['id']; ?></td-->
			<td>
				<?php echo $t[$model]['cardno']; ?>
				<div class="fs-9"><?php echo $t['Cardholder']['fullname']; ?></div>
			</td>			
			<td><?php echo $t[$model]['terminal_id']; ?></td>
			<td><?php echo $t[$model]['transdate']; ?></td>
			<td class="text-right"><?php echo $t[$model]['remaining_balance']; ?></td>
			<td class="text-right"><?php echo $t[$model]['total_amount']; ?></td>
			<td class="text-right"><?php echo $t[$model]['current_balance']; ?></td>
			<td><?php echo $t[$model]['postation_id']; ?></td>
			<td><?php echo $t[$model]['atmstation_id']; ?></td>
			<td><?php echo $t['Status']['name']; ?></td>
			<td><?php echo $t[$model]['ornumber']; ?></td>
		</tr>
<?php endforeach; ?>
<?php echo $this->App->tFoot(); ?>