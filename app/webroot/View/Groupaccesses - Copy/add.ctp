<?php echo $this->App->CommonHeaderWithButton(
	'New Access Setting',
	 $this->App->Showbutton(
		'Back', 
		'btn-violet pull-right fs-10', 
		'groupaccesses', 
		'index'
	)	
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Access Security', 		
				'groupaccesses', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'groupaccesses', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Register Setting'
			)	
		)
	);
?>

<div class="groups form">
	<div class="col-md-12">
<?php echo $this->Form->create('Groupaccess', array('class' => 'data-form', 'id' => 'new_url_form')); ?>
	<fieldset>	
	<div class="col-md-8 nopadding-left">
	<?php			
		
		echo $this->App->showForminputs(array(				
			/*array(
				'input' => 'groupmenu_id', 
				'type'	=> 'select',
				'options' => $groupmenus,
				'label' => 'Select Menu *', 		
				'empty'	=> false,
				'class' => 'numbers_and_letters comonkeypress',
				'wrapper' => 'col-md-9'
			),*/
			array(
				'input' => 'group_id', 
				'type'	=> 'select',
				'options' => $groups,
				'label' => 'Select Group of Users*', 		
				'empty'	=> false,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-9',
				'clear'	=> true
			),
			array(
				'input' => 'controller', 
				'type'	=> 'select',
				'options' => $this->Lang->listOfControllers2(),
				'label' => 'Set Controller *', 		
				'empty'	=> false,
				'selected'	=> $selected,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-9',			
			)
			/*,
			array(
				'input' => 'action', 
				'type'	=> 'select',
				'options' => $this->Lang->listOfViews2(),
				'label' => 'Set Action *', 		
				'empty'	=> false,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-4',			
			)*/
			/*array(
				'input' => 'allowed', 
				'type'	=> 'select',
				'options' => array('1' => 'Allowed', '2' => 'Prohibit'),
				'label' => 'Set Status *', 		
				'empty'	=> false,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-3',			
			)*/			
			));
		?>
	</div>
	<div class="col-md-4 nopadding-right">
	<?php 
			echo '<div class="col-md-12 text-success fs-10 bold nopadding"><label for="">SELECT ACTION</label></div>';
			 echo '<div class="col-md-12">';
			 foreach($this->Lang->listOfViews2() as $key => $view): 

			?>
				<label class="checkbox-inline text-uppercase text-success fs-10 bold">
						<input type="checkbox" name="data[Groupaccess][action][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $view; ?></div>						
				</label>
				<div class="clear"></div>
				<?php 
				
			endforeach; 
				echo '</div>';
				echo '<div class="clear p-b-10"></div>';
				
		
	?>
	</div>
	<div class="clear"></div>
	
	</fieldset>	
	<?php echo $this->App->formEnd('Save', '#new_url_form'); ?>
	</div>	
	<div class="clear"></div>	
</div>

