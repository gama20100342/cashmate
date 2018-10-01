
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('<i class="fas fa-home fa-lg"></i> Home', 'cards', 'dashboard'); ?></li>			
			<li><?php echo $this->App->pageLink('<i class="fas fa-plus-circle fa-lg"></i> Enroll New Account', 'cardholders', 'add'); ?></li>
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
			<li class="nodisplay">
				<a href="<?php echo $this->webroot; ?>cardholders/add" class="homebtn fs-11">
						
							<i class="fas fa-user-plus fa-lg"></i> Enroll New Account
						
					</a>
			</li>
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-user fa-lg"></i> BRB Accounts <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Enroll New Account', 'cardholders', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage Card Holders', 'cardholders', 'index'); ?></li>										
						<li><?php echo $this->App->pageLink('Manage Cards', 'cards', 'index'); ?></li>																
					</ul>
			</li>
			
				
			<!--li class="dropdown"-->
				<?php //echo $this->App->pageLink('<i class="fas fa-home fa-lg"></i> Merchants', 'merchants', 'index'); ?>
				<!--a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-home fa-lg"></i> Merchant <span class="caret"></span></a-->
					<!--ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'merchants', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'merchants', 'index'); ?></li>
					</ul-->
			<!--/li-->
			
			<!--li class="dropdown"-->
				<?php //echo $this->App->pageLink('<i class="fas fa-home fa-lg"></i> Branches', 'branches', 'index'); ?>
				<!--a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-home fa-lg"></i> Branch <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'branches', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage', 'branches', 'index'); ?></li>
					</ul-->
			<!--/li-->
			
			
		<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn fadeInRight fadeInLeft"><i class="fas fa-calculator fa-lg"></i> Transactions  <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius" role="menu">		
						<li><?php echo $this->App->pageLink('Balance Inquiry', 'transbalanceinquiries', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Bills Payment', 'transbillspayments', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Change PIN', 'transchangepins', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('POS Purchase', 'transpurchases', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('POS Cash Out', 'transcashouts', 'index'); ?></li>						
						<li><?php echo $this->App->pageLink('Load Cash', 'transloadcashes', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Withdrawals', 'transwithdrawals', 'index'); ?></li>																		
						<li><?php echo $this->App->pageLink('Interbank Fund Transfer', 'transinterbanks', 'index'); ?></li>	
					</ul>
			</li>
		
			<li>
				<a href="#" class="noborder noradius fs-11 nooutline" id="site_search" data-toggle="modal" data-target="#_search_client"><i class="fas fa-search fa-lg"></i> Search </a>
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