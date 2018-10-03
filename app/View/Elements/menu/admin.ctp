
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('<i class="fas fa-tachometer-alt fa-lg"></i> Dashboard', 'cards', 'dashboard'); ?></li>			
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
			<li>
				<a href="#" class="homebtn noborder noradius fs-11 nooutline" id="site_search" data-toggle="modal" data-target="#_search_client"><i class="fas fa-search fa-lg"></i> Search </a>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-pen-alt fa-lg"></i> Registration <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Enroll New Account', 'cardholders', 'add/new'); ?></li>
						<li><?php echo $this->App->pageLink('Approved Application', 'cardapplications', 'index'); ?></li>																												
					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-upload fa-lg"></i> Upload <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Batch Branches Registration', 'branches', 'upload_branches'); ?></li>											
						<li><?php echo $this->App->pageLink('Batch Account Registration', 'cardholders', 'upload_holders'); ?></li>											
						<li><?php echo $this->App->pageLink('Existing Client Information', 'cardholders', 'upload_holders'); ?></li>					
						<li class="separator-submenu"></li>
						<li><?php echo $this->App->pageLink('Upload Card Activation', 'cards', 'uploadcard'); ?></li>										
						<li><?php echo $this->App->pageLink('Upload Card Deactivation', 'cards', 'uploadcard'); ?></li>										
						<li><?php echo $this->App->pageLink('Upload Pre-Generated Cards', 'cards', 'upload_pregenerated'); ?></li>										
						<li><?php echo $this->App->pageLink('Card Reissuance', 'cards', 'upload_reissuance'); ?></li>					
					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-user fa-lg"></i> Accounts <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li class="nodisplay"><?php echo $this->App->pageLink('Enroll New Account', 'cardholders', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage Accounts', 'cardholders', 'index'); ?></li>																						
						
					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-id-card fa-lg"></i> Cards <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">										
						<li><?php echo $this->App->pageLink('Manage Cards', 'cards', 'index'); ?></li>																
						<li><?php echo $this->App->pageLink('Generate Perso File', 'cards', 'generate_perso'); ?></li>										
						<li class="nodisplay"><?php echo $this->App->pageLink('Upload Customized Cards', 'cards', 'uploadcard'); ?></li>																
						<li class="separator-submenu"></li>
						<li><?php echo $this->App->pageLink('Received Cards', 'cards', 'received_cards'); ?></li>										
						<li class="nodisplay"><?php echo $this->App->pageLink('Pending / For Approval <span class="badge fs-8">100</span> ', 'cardholders', 'index'); ?></li>										
						<li class="separator-submenu"></li>
						<li><a href="#">Tag Card</a></li>																
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
		
			
			
		<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-tasks fa-lg"></i> Reports <span class="caret"></span></a>
					<ul class="dropdown-menu noborder noradius noshadow" role="menu">
						<li>
							<a href="#" 
								class="" 
								data-toggle="modal" 								
								data-target="#_reports_date_modal"
								data-title="Generate Main Report"
								data-url="<?php echo $this->webroot; ?>cards/generateMainReport"
							>Main Report</a>
						</li>
						
						<li class="separator-submenu"></li>
						<li class="dropdown">
								<a href="#" 
									class="" 											
									data-title="All Approved Transactions"
									data-url="<?php echo $this->webroot; ?>transbillspayments/generate_summary_report""
								>All Approved Transactions</a>
						</li>
						<li class="dropdown">
								
								<a href="#">Approved Transactions<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="On Us Approved Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/onus/Approved"
										>ON US</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Acquirer Approved Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Approved""
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Approved Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Approved""
										>Issuer</a>
									</li>
								</ul>
						</li>
						<li class="dropdown">
								<a href="#" 
									class="" 											
									data-title="All Rejected Transactions"
									data-url="<?php echo $this->webroot; ?>transbillspayments/generate_summary_report""
								>All Rejected Transactions</a>
						</li>
						<li class="dropdown">
								<a href="#">Rejected Transactions<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="On Us Rejected Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/onus/Rejected"
										>ON US</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Acquirer Rejected Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Rejected""
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Rejected Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Rejected""
										>Issuer</a>
									</li>
								</ul>
						</li>
						<li class="dropdown">
								<a href="#" 
									class="" 											
									data-title="All Reversal Transactions"
									data-url="<?php echo $this->webroot; ?>transbillspayments/generate_summary_report""
								>All Reversal Transactions</a>
						</li>
						<li class="dropdown">
								<a href="#">Reversal Transactions<span class="caret"></span></a>
								<ul class="dropdown-menu noborder noradius">
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="On Us Reversal Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/onus/Reversal"
										>ON US</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Acquirer Reversal Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Reversal""
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Reversal Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Reversal""
										>Issuer</a>
									</li>
								</ul>
						</li>
						<li class="nodisplay"><?php echo $this->App->pageLink('Bills Payment', 'transloadcashes', 'index'); ?></li>
							
						<li><?php //echo $this->App->pageLink('InterBank Fund Transfer', 'transloadcashes', 'index'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Bills Payment Summary"
											data-url="<?php echo $this->webroot; ?>transbillspayments/generate_summary_report""
										>Bills Payment Summary</a>
										
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Interbank Fund Transfer"
											data-url="<?php echo $this->webroot; ?>transinterbanks/generate_csv_report""
										>Interbank Fund Transfer</a>
						</li>						
						
						<li class="separator-submenu"></li>
						<li><?php echo $this->App->pageLink('Card Holder Activities', 'cardholders', 'generate_cardholder_activity'); ?></li>
						<li class="separator-submenu"></li>
						<li><?php 
						
							//echo $this->App->reportLinkModal('List of Cards Activated', 'cards', 'generate_csv_report/1'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="List of Activated Cards"
											data-url="<?php echo $this->webroot; ?>cards/generate_cardstatus_report/1"
										>List of Activated Cards</a>
										
						</li>
						<li><?php 
							//echo $this->App->reportLinkModal('List of Blocked Cards', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="List of Blocked Cards"
											data-url="<?php echo $this->webroot; ?>cards/generate_cardstatus_report/5"
										>List of Blocked Cards</a>
										
						</li>						
						<li><?php 
							//echo $this->App->reportLinkModal('List of Expired Card', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="List of Expired Cards"
											data-url="<?php echo $this->webroot; ?>cards/generate_cardstatus_report/7"
										>List of Expired Cards</a>
						</li>						
						<li><?php 
							//echo $this->App->reportLinkModal('Summary of Expired Card', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Summary of Expired Cards"
											data-url="<?php echo $this->webroot; ?>cards/generate_summary_of_expired_cards"
										>Summary of Expired Cards</a>
							</li>										
						<li class="separator-submenu"></li>					
						<li><?php //echo $this->App->reportLinkModal('Top-up Reports', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Top-up Reports"
											data-url="<?php echo $this->webroot; ?>transloadcashes/generate_top_up_report"
										>Top-up Reports</a>
						</li>						
						<li><?php //echo $this->App->reportLinkModal('Credit Report', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Credit Report"
											data-url="<?php echo $this->webroot; ?>debitcredits/generate_credit_report"
										>Credit Report</a>
						</li>						
						<li><?php //echo $this->App->reportLinkModal('Debit Report', 'cards', 'generate_csv_report/2'); ?>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Debit Report"
											data-url="<?php echo $this->webroot; ?>debitcredits/generate_debit_report"
										>Debit Report</a>
						</li>						
						<li><?php echo $this->App->reportLinkModal('Total Balances', 'cards', 'generate_total_balances_report'); ?></li>						
						<li><?php //echo $this->App->reportLinkModal('Mass Enrollment', 'cards', 'generate_csv_report/2'); ?>
									<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Generate Mass Enrollment Report"
											data-url="<?php echo $this->webroot; ?>cards/generate_mass_enrollment_report"
										>Mass Enrollment</a>
						</li>						
						<li class="separator-submenu"></li>			
						<li><?php //echo $this->App->reportLinkModal('Audit Trail', 'cards', 'generate_csv_report/2'); ?>
									<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Generate Audit Trail Report"
											data-url="<?php echo $this->webroot; ?>cards/generate_audit_trail_report"
										>Audit Trail</a>
						</li>						
								
					</ul>
			</li>
			<!--li class="dropdown"-->
				<?php //echo $this->App->pageLink('<i class="fas fa-fax fa-lg"></i> Terminal', 'posdevices', 'index'); ?>
				<!--a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-fax fa-lg"></i> Terminal <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'posdevices', 'add'); ?></li>						
						<li><?php echo $this->App->pageLink('Manage', 'posdevices', 'index'); ?></li>					

					</ul-->
			<!--/li-->
			
			<!--li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-home fa-lg"></i> ATM <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register', 'partners', 'add'); ?></li>						
						<li><?php echo $this->App->pageLink('Manage', 'partners', 'index'); ?></li>					

					</ul>
			</li-->
			
			<li class="dropdown nodisplay">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-key fa-lg"></i> System Users <span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
						<li><?php echo $this->App->pageLink('Register New Access', 'users', 'add'); ?></li>
						<li><?php echo $this->App->pageLink('Manage Accounts', 'users', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Manage Account Group', 'groups', 'index'); ?></li>																		
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
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn"><i class="fas fa-cog fa-lg"></i> Settings<span class="caret"></span></a>
					<ul class="dropdown-menu noborder" role="menu">
										
						<li><?php echo $this->App->pageLink('BRB Settings', 'settings', 'edit', 1); ?></li>																		
						<li><?php echo $this->App->pageLink('Access Security', 'groupaccesses', 'index'); ?></li>												
						<li class="separator-submenu"></li>		
						<li><?php echo $this->App->pageLink('Product', 'products', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Terminal', 'terminals', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Branches', 'branches', 'index'); ?></li>												
						<li><?php echo $this->App->pageLink('Institutions', 'institutions', 'index'); ?></li>												
								
						<li class="separator-submenu"></li>		
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-animations="fadeIn">System Access <span class="caret"></span></a>
						<ul class="dropdown-menu noborder" role="menu">
							<li><?php echo $this->App->pageLink('Register New Access', 'users', 'add'); ?></li>
							<li><?php echo $this->App->pageLink('Manage Access', 'users', 'index'); ?></li>												
							<li><?php echo $this->App->pageLink('Manage Role', 'groups', 'index'); ?></li>																		
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
						<li>
						<li class="separator-submenu"></li>															
						<li><?php echo $this->App->pageLink('My Profile', 'users', 'viewmyprofile'); ?></li>												
						<!--li>
							<a href="#"
								url="'.$this->webroot.'users/changepassword" 
								title="View Card Holder" 												
								data-_type = "holder"
								data-toggle="modal"
								data-target="#view_card_detail_"										
								class="fs-10 user-link-modal cslink btn-xs nooutline noradius">Change Password</a>
							<?php //echo $this->App->pageLink('Change Password', 'users', 'changemypassword'); ?>
						</li-->		
																							
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