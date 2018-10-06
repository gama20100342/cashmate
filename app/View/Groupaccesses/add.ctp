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
				'label' => 'This setting will be inherit to this group of users', 		
				'empty'	=> false,
				'class' => 'comonkeypress',
				'wrapper' => 'col-md-12',
				'clear'	=> 1
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
		
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Card Holders</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Cardholder"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_cardholer][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
		
	</div>
	
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">BRB Card</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Card"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_cards][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">BRB Settings</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["BRB_Settings"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_brbsetting][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Access Settings</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Access_Settings"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_access][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
	</div>
	
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Reports</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Reports"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_reports][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
	</div>
	
	
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Product</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Product"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_product][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Institutions</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Institution"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_institution][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
	</div>
	
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Terminal</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Terminal"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_terminal][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Account Access</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Account_Access"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_account][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
	</div>
	
	
	<div class="col-md-2 nopadding">	
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">Branch</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Branch"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_branch][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div class="panel panel-default noradius">
			<div class="panel-heading p-t-3 p-l-3 p-r-3 p-b-3"><h5 class="nopadding nomargin fs-12 bold">User Profile</h5></div>
			<div class="panel-body nopadding nomargin">
				<ul class="list-group">
				<?php foreach($this->lang->listOfController_final()["Profile"] as $key => $t): ?>			
						<li class="list-group-item p-t-3 p-b-3 p-l-3 p-r-3 noradius noborder-left noborder-right noborder-bottom">
						<label class="checkbox-inline text-uppercase text-success fs-10 bold">
								<input type="checkbox" name="data[Groupaccess][action_profile][]" value="<?php echo $key; ?>"><div class="m-t-3"><?php echo $t; ?></div>						
						</label>
						</li>			
				<?php endforeach; ?>
				<ul>
			</div>
		</div>
		
		
	</div>
	
	
	
	
	<div class="clear"></div>
	
	<div class="col-md-4 nopadding-right nodisplay">
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

