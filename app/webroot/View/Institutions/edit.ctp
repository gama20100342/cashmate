<?php echo $this->App->CommonHeaderWithButton(
	'Add Institution',
	$this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'institutions', 
		'index'
	)	
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Institution', 		
				'institutions', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'institutions', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Update Institution'
			)	
		)
	);
?>

<div class="groups form">
	<div class="col-md-8">
	<?php echo $this->Form->create('Institution', array('class' => 'data-form', 'id' => 'new_institution_form')); ?>
	<fieldset>	
		
	<?php
		echo $this->Form->input('id');
		
		echo $this->Form->hidden('modified', array('type' => 'hidden', 'default' => date('Y-m-d')));
		
		echo $this->Form->hidden('modifiedby', array('type' => 'hidden', 'default' => $author));
		
		echo $this->App->showForminputs(array(				
			array(
				'input' => 'code', 
				'label' => 'Code *', 				
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-6 nopadding',				
			),
			array(
				'input' => 'mnemonic', 
				'label' => 'Mnemonic *', 				
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-6 nopadding',
				'clear' 	=> 1
			),
			array(
				'input' => 'name', 
				'label' => 'Name *', 				
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-12 nopadding',
				'clear' 	=> 1
			)/*,
			array(
				'input' => 'product_id', 
				'label' => 'Select Product *', 				
				'type'	=> 'select',
				'options' => $products,
				'empty' => false,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-12 nopadding',
				'clear' 	=> 1
			)*/
		));
		
		
			$product = explode(",", $this->request->data['Institution']['product_id']);
			
			 echo '<div class="col-md-12 m-t-20 text-success fs-10 bold nopadding"><label for="">SELECT SINGLE / MULTIPLE PRODUCT </label></div>';
			 echo '<div class="col-md-12">';			 
			 foreach($pro as $key => $p): 			 
	?>
				<label class="checkbox-inline text-uppercase text-success fs-10 bold">
						<input 
							type="checkbox" 
							name="data[Institution][product_id][]" 
							value="<?php echo $p['Product']['id']; ?>"
							<?php if(isset($product[$key]) && !empty($product[$key])): ?>
								<?php echo 'checked="checked"'; ?>
							<?php endif; ?>
						>
						<div class="m-t-3"><?php echo $p['Product']['id'] .' - '.$p['Product']['name']; ?></div>						
				</label>
				<div class="clear"></div>
	<?php 
				
			endforeach; 
				echo '</div>';
				echo '<div class="clear p-b-10"></div>';
		
	?>
	
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save Changes', '#new_institution_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>
