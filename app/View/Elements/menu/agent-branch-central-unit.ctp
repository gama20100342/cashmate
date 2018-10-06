
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
	<ul class="nav navbar-nav dropdown">
			<li><?php echo $this->App->pageLink('<i class="fas fa-home fa-lg"></i> Home', 'cards', 'dashboard'); ?></li>											
			<li><?php echo $this->App->pageLink('<i class="fas fa-plus-circle fa-lg"></i> Approved Accounts', 'cardapplications', 'index'); ?></li>												
			<li><?php echo $this->App->pageLink('<i class="fas fa-user fa-lg"></i>  Accounts', 'cardholders', 'index_active'); ?></li>																						
				
			<li><?php echo $this->App->pageLink('<i class="fas fa-id-card fa-lg"></i> Link Card', 'cardholders', 'tag_cards'); ?></li>																						
			<li><?php echo $this->App->pageLink('<i class="fas fa-id-card fa-lg"></i> Receive Cards', 'cards', 'received_cards'); ?></li>																									
			<li><?php echo $this->App->pageLink('<i class="fas fa-calculator fa-lg"></i> Transactions', 'cards', 'show_all_transactions'); ?></li>	
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
						<li><?php echo $this->App->pageLink('List of Users', 'users', 'generate_listofusers'); ?></li>						
						<li class="separator-submenu"></li>
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
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Approved"
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Approved Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Approved"
										>Issuer</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Approved Transactions Per Terminal "
											data-url="<?php echo $this->webroot; ?>terminals/generate_terminal_transreport/Approved"
										>Per Terminal</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="All Transaction Type Approved Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_alltranstype/Approved"
										>All Transaction Type</a>
									</li>
								</ul>
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
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Rejected"
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Rejected Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Rejected"
										>Issuer</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Rejected Transactions Per Terminal "
											data-url="<?php echo $this->webroot; ?>terminals/generate_terminal_transreport/Rejected"
										>Per Terminal</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="All Transaction Type Rejected Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_alltranstype/Rejected"
										>All Transaction Type</a>
									</li>
								</ul>
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
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/acquirer/Reversal"
										>Acquirer</a>
									</li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Issuer Reversal Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_transaction_report/issuer/Reversal"
										>Issuer</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="Reversal Transactions Per Terminal "
											data-url="<?php echo $this->webroot; ?>terminals/generate_terminal_transreport/Reversal"
										>Per Terminal</a>
									</li>
									<li class="separator-submenu"></li>
									<li>
										<a href="#" 
											class="" 
											data-toggle="modal" 								
											data-target="#_reports_date_modal"
											data-title="All Transaction Type Reversal Transactions"
											data-url="<?php echo $this->webroot; ?>cards/generate_alltranstype/Reversal"
										>All Transaction Type</a>
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
	</ul>

</div>