
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('<i class="fas fa-home fa-lg"></i> Home', 'cards', 'dashboard'); ?></li>							
			
	
			<li><?php echo $this->App->pageLink('<i class="fas fa-plus-circle fa-lg"></i> Enroll New Account', 'cardholders', 'add/new'); ?></li>												
			<li><?php echo $this->App->pageLink('<i class="fas fa-user fa-lg"></i>  Accounts', 'cardholders', 'index_active'); ?></li>																						
				
			<li><?php echo $this->App->pageLink('<i class="fas fa-id-card fa-lg"></i> Link Card', 'cardholders', 'tag_cards'); ?></li>																						
			
			
			<li><?php echo $this->App->pageLink('<i class="fas fa-calculator fa-lg"></i> Transactions', 'cards', 'show_all_transactions'); ?></li>	
	</ul>

</div>