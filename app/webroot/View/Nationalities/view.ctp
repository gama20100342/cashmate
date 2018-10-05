<div class="nationalities view">
<h2><?php echo __('Nationality'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nationality'), array('action' => 'edit', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nationality'), array('action' => 'delete', $nationality['Nationality']['id']), array(), __('Are you sure you want to delete # %s?', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nationalities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nationality'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cardholders'), array('controller' => 'cardholders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cardholders'); ?></h3>
	<?php if (!empty($nationality['Cardholder'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Middlename'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Fullname'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Mothermaiden'); ?></th>
		<th><?php echo __('Present Address'); ?></th>
		<th><?php echo __('Permanent Address'); ?></th>
		<th><?php echo __('Province Address'); ?></th>
		<th><?php echo __('Placeofbirth'); ?></th>
		<th><?php echo __('Contact No'); ?></th>
		<th><?php echo __('Tel No'); ?></th>
		<th><?php echo __('Nationality Id'); ?></th>
		<th><?php echo __('Civil Status'); ?></th>
		<th><?php echo __('Idpresented'); ?></th>
		<th><?php echo __('Idp No'); ?></th>
		<th><?php echo __('Idp Expire'); ?></th>
		<th><?php echo __('Tin'); ?></th>
		<th><?php echo __('Employeer'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Business Address'); ?></th>
		<th><?php echo __('Office No'); ?></th>
		<th><?php echo __('Business Name'); ?></th>
		<th><?php echo __('Annual Income'); ?></th>
		<th><?php echo __('Refid'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nationality['Cardholder'] as $cardholder): ?>
		<tr>
			<td><?php echo $cardholder['id']; ?></td>
			<td><?php echo $cardholder['firstname']; ?></td>
			<td><?php echo $cardholder['middlename']; ?></td>
			<td><?php echo $cardholder['lastname']; ?></td>
			<td><?php echo $cardholder['fullname']; ?></td>
			<td><?php echo $cardholder['gender']; ?></td>
			<td><?php echo $cardholder['birthdate']; ?></td>
			<td><?php echo $cardholder['mothermaiden']; ?></td>
			<td><?php echo $cardholder['present_address']; ?></td>
			<td><?php echo $cardholder['permanent_address']; ?></td>
			<td><?php echo $cardholder['province_address']; ?></td>
			<td><?php echo $cardholder['placeofbirth']; ?></td>
			<td><?php echo $cardholder['contact_no']; ?></td>
			<td><?php echo $cardholder['tel_no']; ?></td>
			<td><?php echo $cardholder['nationality_id']; ?></td>
			<td><?php echo $cardholder['civil_status']; ?></td>
			<td><?php echo $cardholder['idpresented']; ?></td>
			<td><?php echo $cardholder['idp_no']; ?></td>
			<td><?php echo $cardholder['idp_expire']; ?></td>
			<td><?php echo $cardholder['tin']; ?></td>
			<td><?php echo $cardholder['employeer']; ?></td>
			<td><?php echo $cardholder['position']; ?></td>
			<td><?php echo $cardholder['business_address']; ?></td>
			<td><?php echo $cardholder['office_no']; ?></td>
			<td><?php echo $cardholder['business_name']; ?></td>
			<td><?php echo $cardholder['annual_income']; ?></td>
			<td><?php echo $cardholder['refid']; ?></td>
			<td><?php echo $cardholder['status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cardholders', 'action' => 'view', $cardholder['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cardholders', 'action' => 'edit', $cardholder['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cardholders', 'action' => 'delete', $cardholder['id']), array(), __('Are you sure you want to delete # %s?', $cardholder['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cardholder'), array('controller' => 'cardholders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
