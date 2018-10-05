
<div class="collapse navbar-collapse pull-left" id="navbar-collapse bold">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('DASHBOARD', 'cards', 'dashboard'); ?></li>			
			<!--li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-address-card fa-lg"></i> Cards <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">									
						<li><?php echo $this->App->pageLink('Enroll New Card', 'cardholders', 'index'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'cards', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Card Types', 'cardtypes', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Card Status', 'cardstatuses', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Transactions', 'transactiontypes', 'index'); ?></li>						
					
					</ul>
			</li-->
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-user fa-lg"></i> BRB Cards <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Enroll New Account', 'cardholders', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage Card Holders', 'cardholders', 'index'); ?></li>										
						<li><?php echo $this->App->pageLink('Manage Cards', 'cards', 'index'); ?></li>										
						<li><?php echo $this->App->pageLink('Upload', 'cardholders', 'index'); ?></li>										
						<li class="separator-submenu"></li>
						<li><?php echo $this->App->pageLink('Pending / For Approval <span class="badge fs-8">100</span> ', 'cardholders', 'index'); ?></li>										
					</ul>
			</li>
			
				
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-home fa-lg"></i> Merchant / Branch <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li class="dropdown">
								<a href="#">Merchant<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Register', 'merchants', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'merchants', 'index'); ?></li>
								</ul>
						</li>		
						<li class="dropdown">
								<a href="#">DA5 Branches<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Register', 'branches', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'branches', 'index'); ?></li>
								</ul>
						</li>					
					
					</ul>
			</li>
			
		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn fadeInRight fadeInLeft"><i class="fas fa-calculator fa-lg"></i> Transactions  <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius" role="menu">		
						<li><?php echo $this->App->pageLink('Balance Inquiry', 'transbalanceinquiries', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Bills Payment', 'transbillspayments', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Change PIN', 'transchangepins', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('POS Purchase', 'transpurchases', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('POS Cash Out', 'transcashouts', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Load Cash', 'transloadcashes', 'index'); ?></li>												
					</ul>
			</li>
			
		<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-tasks fa-lg"></i> Reports <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius noshadow" role="menu">
						<!--li class="dropdown">
								<a href="#">Intrabank<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Fund Transfer ( SA-CA )', 'cards', 'generate_reports_by_category', 'Fund-Transfer'); ?></li>									
								</ul>
						</li>												
						<li class="dropdown">
								<a href="#">Applications<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Exception', 'cards', 'generate_reports_by_category', 'Exception'); ?></li>
									<li><?php echo $this->App->pageLink('Manual Application', 'cards', 'generate_reports_by_category'); ?></li>
									<li><?php echo $this->App->pageLink('Manual Application Re-Issue', 'cards', 'generate_reports_by_category'); ?></li>									
								</ul>
						</li>
						<li class="dropdown">
								<a href="#">Bills Payment<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li><?php echo $this->App->pageLink('Summary', 'cards', 'generate_reports_by_category'); ?></li>
									<li><?php echo $this->App->pageLink('DPS', 'cards', 'generate_reports_by_category'); ?></li>
									<li><?php echo $this->App->pageLink('Monthend', 'cards', 'generate_reports_by_category'); ?></li>									
								</ul>
						</li>	
						<li class="dropdown">
								<a href="#">Cards<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Delivery', 'cards', 'generate_reports_by_category'); ?></li>
									<li><?php echo $this->App->pageLink('Detail', 'cards', 'generate_reports_by_category'); ?></li>
									<li><?php echo $this->App->pageLink('Generated', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Debit Card', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Deleted', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Activated', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Hostlisted', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Renewal', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Active', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Inactive', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Expired', 'cards', 'generate_reports_by_category'); ?></li>									
									<li><?php echo $this->App->pageLink('Total Issued Cards', 'cards', 'generate_reports_by_category'); ?></li>									
								</ul>
						</li>	
						<li class="dropdown">
								<a href="#">Transactions Summary<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Balance Inquiry', 'transbalanceinquiries', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Bills Payment', 'transbillspayments', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Change PIN', 'transchangepins', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('POS Purchase', 'transpurchases', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('POS Cash Out', 'transcashouts', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Load Cash', 'transloadcashes', 'index'); ?></li>
								</ul>
						</li>
						<li class="dropdown">
								<a href="#">Fee Summary<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Balance Inquiry', 'transbalanceinquiries', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Bills Payment', 'transbillspayments', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Change PIN', 'transchangepins', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('POS Purchase', 'transpurchases', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('POS Cash Out', 'transcashouts', 'index'); ?></li>						
									<li><?php echo $this->App->pageLink('Load Cash', 'transloadcashes', 'index'); ?></li>
								</ul>
						</li-->						
					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-fax fa-lg"></i> POS <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'posdevices', 'add'); ?></li>						
						<li><?php echo $this->App->pageLink('Manage', 'posdevices', 'index'); ?></li>					

					</ul>
			</li>
			
			<!--li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-home fa-lg"></i> ATM <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'partners', 'add'); ?></li>						
						<li><?php echo $this->App->pageLink('Manage', 'partners', 'index'); ?></li>					

					</ul>
			</li-->
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-key fa-lg"></i> Account Settings <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register New Access', 'users', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'users', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Settings', 'groups', 'index'); ?></li>												
						<!--li class="dropdown">
								<a href="#">Access Role<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Role', 'groups', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'groups', 'index'); ?></li>																										
								</ul>
						</li>	
						<li class="dropdown">
								<a href="#">Role Capabilities<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Capabilities', 'groupsettings', 'add'); ?></li>
									<li><?php echo $this->App->pageLink('Manage', 'groupsettings', 'index'); ?></li>																								
								</ul>
						</li>				
						<li class="dropdown">
								<a href="#">Access Categories<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius noshadow">
									<li><?php echo $this->App->pageLink('Add New Category', 'groupsettingscategories', 'add'); ?></li>															
									<li><?php echo $this->App->pageLink('Manage', 'groupsettingscategories', 'index'); ?></li>															
								</ul>
						</li-->	
					</ul>
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-cog fa-lg"></i> System <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
										
						<li><?php echo $this->App->pageLink('Settings', 'settings', 'edit', 1); ?></li>												
						<li><?php echo $this->App->pageLink('Logout Account', 'users', 'logout'); ?></li>												
						
					</ul>
			</li>
			
			
			<?php 
			/*
			echo $this->Form->create('Card', array('url' => array('controller' => 'cards', 'action' => 'search'), 'class' => 'navbar-form navbar-left'));
				echo '<div class="input-group">';
					echo '<input type="text" name="data[Card][keyword]" class="form-control" placeholder="Search...">';
							echo '<span class="input-group-btn">';
							echo '<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>';
						echo '</span>';
					echo '</div>';
			echo $this->Form->end();*/
			?>

		
	</ul>

</div>