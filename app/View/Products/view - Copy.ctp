<?php echo $this->App->CommonHeaderWithButton(
	'View Product Information',
	'<a href="'.$this->webroot.'products/edit/'.$product['Product']['id'].'" class="btn btn-xs btn-success pull-left fs-10 m-r-5"><i class="fas fa-edit fa-lg"></i> Edit</a>
	'.$this->App->modalViewLinkCustom($this->webroot.'productlimits/add/'.$product['Product']['id'], 'Add Limit Cycle', '', '').'	
	<a href="#" data-dismiss="modal" class="btn btn-xs btn-danger pull-left fs-10"><i class="fas fa-times fa-lg"></i> Close</a>'		
); ?>

<div class="col-md-12">
		<h3 class="text-violet nopadding nomargin"><?php echo $product['Product']['name']; ?></h3>		
		<div class="clear m-t-10"></div>
		<?php echo $this->App->tHead($this->Lang->index_header('product_limits'), 'products_limit_'); ?>	
			<?php if(!empty($limits)): ?>
				<?php foreach($limits as $l): ?>	
					<tr>
						<td><?php echo $l['Productlimit']['name']; ?></td>
						<td><?php echo $l['Productlimit']['limit_cycle']; ?></td>
						<td><?php echo number_format($l['Productlimit']['limit_value'], 2, ".", ","); ?></td>
						<td><?php echo number_format($l['Productlimit']['limit_fees'], 2, ".", ","); ?></td>						
						<td><?php echo $l['Productlimit']['channels']; ?></td>
						<td><?php echo $l['Cardtype']['name']; ?></td>
						<td><?php echo $l['Productlimit']['expiry_date']; ?></td>
						<td>
							<?php echo $this->App->modalEditLink($this->webroot.'productlimits/edit/'.$l['Productlimit']['id'], ''); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php echo $this->App->tFFoot($this->Lang->index_header('product_limits')); ?>					
					
</div>
<div class="clear"></div>


