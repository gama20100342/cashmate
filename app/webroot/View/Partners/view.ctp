<?php echo $this->App->commonHeader('Partner Information'); ?>
<div class="cardtypes form col-md-12">
	<?php echo $this->App->tHead(array('Company / Business Name', 'Address', 'Contact Person', 'Contact No. / Tel. No.', 'Action')); ?>
	
		<tr>
			<td><?php echo $partner['Partner']['name']; ?></td>						
			<td><?php echo $partner['Partner']['address']; ?></td>						
			<td><?php echo $partner['Partner']['contact_person']; ?></td>						
			<td><?php echo $partner['Partner']['contactno'].' / '.$partner['Partner']['telno']; ?></td>									
			<td class="actions">
				<?php echo $this->App->btnLink('Edit', 'edit', 'partners', 'edit', $partner['Partner']['id']); ?>			
				<?php //echo $this->App->btnLink('View', 'view', 'partners', 'view', $partner['Partner']['id']); ?>							
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $partner['Partner']['id']), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
			</td>
		</tr>
	
	<?php echo $this->App->tFoot(); ?>	
</div>
<div class="clear"></div>