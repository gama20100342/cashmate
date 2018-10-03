<?php

class LangHelper extends Helper{
	
	public function maintenance(){
		return '<div class="text-danger"><i class="fas fa-info-circle fa-lg"></i> This function will be available soon, we are working on it.</div>';
	}
	
    public function showNationality(){

        $string = array(
            'Afghan',
            'Argentine',
            'Spanish',
            'Australian',
            'Belgian',
            'Bolivian',
            'Brazilian',
            'Cambodian',
            'Cameroonian',
            'Canadian',
            'Chilean',
            'Chinese',
            'Colombian',
            'Costa Rican',
            'Cuban',
            'Danish',
            'Dominican',
            'Ecuadorian',	
            'Egyptian',	
            'Salvadorian',	
            'English',	
            'Estonian',	
            'Ethiopian',
            'Finnish',
            'French',
            'German',
            'Ghanaian',
            'Greek',
            'Guatemalan',
            'Haitian',
            'Honduran',
            'Indonesian',
            'Iranian',
            'Irish',
            'Israeli',
            'Italian',
            'Japanese',
            'Jordanian',	
            'Kenyan',
            'Laotian',	
            'Latvian',	
            'Lebanese',	
            'Lithuanian',	
            'Malaysian',	
            'Mexican',
            'Moroccan',	
            'Dutch',
            'New Zealander',
            'Nicaraguan',	
            'Norwegian',	
            'Panamanian',	
            'Paraguayan',	
            'Peruvian',	
            'Filipino',	
            'Polish',	
            'Portuguese',	
            'Puerto Rican',	
            'Romanian',	
            'Russian',	
            'Saudi',	
            'Scottish',	
            'Korean',	
            'Spanish',	
            'Swedish',	
            'Swiss',	
            'Taiwanese',	
            'Tajik',	
            'Thai',	
            'Turkish',	
            'Ukrainian',	
            'British',	
            'American',
            'Uruguayan',	
            'Venezuelan',	
            'Vietnamese',	
            'Welsh',	
        );

        $new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
    }

    public function showStatus(){
        $string = array(
            'Married', 'Widowed', 'Separated', 'Divorced', 'Single'
        );

        $new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
    }
	
	public function ListofIds() {
		$string = array(
			'Philippine passport',
			'Driver’s License',
			'SSS UMID Card',
			'GSIS eCard',
			'Digitized Postal ID',
			'PRC ID',
			'IBP ID',
			'OWWA ID',
			'Diplomat ID',
			'OFW ID',
			'Senior Citizen ID',
			'Voter’s ID',
			'GOCC and Government Office ID'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
		
		
	}
	
	public function listofController(){
		$string = array(
			'atmstations',
			'branches',
			'cardapplications',
			'cardholders',
			'cardnos',
			'cards',
			'cardstatuses',
			'cardtypes',
			'currencies',
			'groups',
			'groupsettings',
			'groupsettingscategories',
			'partners',
			'passwordhistories',
			'postations',
			'settings',
			'statuses',
			'terminals',
			'transactiontypes',
			'transbalanceinquiries',
			'transbillspayments',
			'transcashouts',
			'transchangepins',
			'transloadcashes',
			'transpurchases',
			'useravatars',
			'users',
			'usertokens',
			'withdrawals'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
	}
	
	public function listofViewsOld(){
		$string = array(
			'add',
			'index',
			'view',
			'modify',
			'delete',
			'edit',
			'generate',
			'reset',
			'updatestatus',
			'search',
			'reports'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
	}
	
	
	
	public function listofTitle(){
		$string = array(
			'Mr',
			'Miss',
			'Mrs'			
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	public function listOfStatus(){
		$string = array(
			'Active', 
			'Inactive'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	public function listofPurpose($type=null){
		
		
		$string = array(
			'New Application',
			'Renewal',
			'Replacement',
			'For Personal Use',
			'Gift',
			'Payroll'
			//'Others'
		);
		
		$new_arr = array();
	
		if(isset($type) && !empty($type)){
			switch($type){
				case "new":
					return $string[0];
				break;
				default:
					return $string[0];
				break;
			}
		}else{
			foreach($string as $str):
				$new_arr[$str] = $str;
			endforeach;

			return $new_arr;
		}
		
	}
	
	
	public function listofSex(){
		$string = array(
			'M' => 'Male',	
			'F' => 'Female'	
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	
	public function listOfNatureOfBusiness(){
		$string = array(
			'Service Business',
			'Merchandising Business',
			'Manufacturing Business',
			'Hybrid Business'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	
	public function listOfNatureOfWork(){
		$string = array(
		"Manufacturer",
		"Reseller(includes Wholesalers)",
		"Retailer",
		"Importer",
		"Exporter",
		"Educational Institutions",
		"Banking Institutions",
		"Insurance Services",
		"Financial Institutions",
		"Information Technology / IT",		
		"Security and Detective Agencies",
		"Courier Services",
		"Manpower providers / Labour Contractors",
		"Media and event management Companies",
		"Consultancy Firms / Agencies",
		"House Keeping Services",
		"Advertising Agency",
		"Hotels / Boarding / Lodging",
		"Restaurants / Bar",
		"Catering Services",
		"Tour and Travel Services",
		"Vehicle Rental Services",
		"Transport, Freight / Cargo Services",
		"Hospitals or Nursing  Homes",
		"Health Clinics / Fitness Centres",
		"Beauty Treatment Centres / Parlours",
		"Training and Placement Service Centre",
		"Service Centres / Maintenance Agencies",
		"Market Research Agencies",
		"Marketing Services / Agencies",
		"Coaching classes/ Training Institutes",
		"Gymkhana, Club or Association",
		"Construction Agencies  / Contractors",
		"Cable /DTH services",
		"Printing Press / Printing Agencies",
		"Film / TV Serial Production Agency",
		"Business Centres",
		"Pest Control Services",
		"Telecommunication Services",
		"Electricity Generation, Transmission and Distribution",
		"Mandap / Decoration / Shamiana Services",
		"Commission Agent",
		"Others",
		"Governament");
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
		
	}
	
	
	public function showMessage($string){
			$str = array(
				'label_search_date' => 'Show Transaction Between Dates'
			);
			
			return $str[$string];
	}
	
	public function index_header($type){
		$headers = array(
			'applications' => array(				
				'Application ID',						
				'Registration Date',				
				//'Processed By',				
				'Processed Date',				
				'Purpose',						
				'Card Holder',						
				'Status',						
				'Action'
			),
			'institutions' => array(
				'Code',				
				'Mnemonic',				
				'Name',				
				'Product',								
				'Action'
			),
			'product_limits' => array(
				'name',
				'Limit Cycle',
				'Limit Value',
				'Limit Fees',
				'Channel',
				'Card Type',
				'Expiry Date',
				'Action'
			),
			'cardlimits' => array(
				'Card',
				'Minimum Withdrawal',
				'Maximum Amount per Transaction',			
				'Total Amount for Cash Withdrawal',			
				'Total Amount for Fund Transfer',			
				'Minimum Loading',			
				'Maximum Loading',	
				'Action'
			),
			'products' => array(
				'ID#', 											
				'Name', 											
				'Expiration', 											
				'Action'
			),
			'merchants' => array(
						'Name', 
						'Owner', 
						'Code', 
						'Device', 
						'TeL No.', 
						'Contact No.',
						'Status',												
						'Action'
			),
			'branches' => array(
						'Name', 					
						'Branch Code', 					
						'Added', 						
						'Contact No', 
						'Tel. No.', 
						'Branch Manager', 						
						'Email',
						'Action'
			),
			'users' => array('Name', 'Username', 'Access Role', 'Last Login', 'Status', 'Terminal', 'Action'),
			'terminals' => array(
						'Name',
						'Model',
						'S/N', 						
						'IMEI', 												
						'Branch',
						'IP', 												
						'Mac', 												
						'Registered', 
						'Action'
			),
			'cards' => array(
				'Card No', 				
				'Product Type',							
				'Card Type',							
				'Registered', 							
				'Status',
				'Action'
			),	
			'cardholder' => array(
				'First Name', 
				'Middle Name', 
				'Last Name', 
				'Contact No.', 
				'Gender', 
				'Birthdate',							
				'Action'
			),	
			'cardholder_search' => array(
				'First Name', 
				'Middle Name', 
				'Last Name', 
				'Contact No.', 
				'Gender', 
				'Registered',						
				'Modified',													
				'Status',													
				'Action'
			),	
			'cashouts' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),	
			'balance_inquiry' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'bills_payment' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'change_pin' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'interbank' => array(
				'Terminal No.',
				'Trace No.',
				'Transmitting Card No.',
				'Receiving Acct. No.',
				'Transaction Amount',				
				'Date/Time',
				'Status'
			),
			'purchases' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'load_cash' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'withdrawals' => array(
				'Card No.',
				'Trace No.',
				'Trans. Type',
				'Proc. Code',
				'Channel',
				'Acq. Inst.',
				'Date/Time',
				'Terminal No.',
				'Status'
			),
			'activated_card' => array(
				'Card Holder', 
				'Card No', 
				'Registered', 
				'Modified', 
				'Type', 
				'Product'
			),
			'main_report' => array(
				'Transaction Date and Time',
				'Card Number',
				'Trace Number',
				'Transaction Type',
				'Processing Code',
				'Channels',
				'Terminal ID',
				'Acquirer Institution',
				'Response',
				'Transaction Amount'
			)
			
			
			
		);
		
		return $headers[$type];
	}
	
	public function report_total($type, $text, $total){
		$headers = array(	
			'main_report_lower' => array(
				'', '', '', '', $text, '', '', '', '', $total."\r"
			),
			'onus_transactions' => array(
				'', '', '', '', $text, '', '', '', $total."\r"
			),
			'interbank_report_lower' => array(
				'Total', '', '', '', '', $total."\r"
			),
			'activated_card' => array(
				'Total', $total ."\r"
			)
		);
		
		return $headers[$type];
	}	
	
	public function report_total_array($type, $text, $total=array()){
		$headers = array(				
			'bills_summary' => array(
				'Total', '', $total[0], $total[1]."\r"
			)
		);
		
		return $headers[$type];
	}	
	
	
	
	
	public function report_header($type){
		
		$headers = array(	
			"card_activated" => array(
				'CARD NUMBER',
				'CARDHOLDER NAME',
				'PRODUCT',
				'AGENT',
				'DATE AND TIME',
				'USER'
			),
			"card_blocked" => array(
				'CARD NUMBER',
				'CARDHOLDER NAME',
				'PRODUCT',
				'AGENT',
				'DATE AND TIME',
				'USER'
			),
			'bills_summary' => array(
				'INSTITUTION CODE',
				'INSTITUTION NAME',
				'TRANSACTION COUNT',
				'TRANSACTION AMOUNT'
			),
			'interbanks' => array(
				'Transaction Data and Time',
				'Terminal Number',
				'Trace Number',
				'Transmitting Card Number',
				'Receiving Account Number',
				'Transaction Amount'
			),
			'onus_transactions' => array(
				'TRANSACTION DATE AND TIME',
				'CARD NUMBER',
				'TRACE NUMBER',
				'TRANSACTION TYPE',
				'PROCESSING CODE',
				'CHANNELS',
				'TERMINAL ID',				
				'RESPONSE',
				'TRANSACTION AMOUNT'
			),
			'main_report' => array(
				'TRANSACTION DATE AND TIME',
				'CARD NUMBER',
				'TRACE NUMBER',
				'TRANSACTION TYPE',
				'PROCESSING CODE',
				'CHANNELS',
				'TERMINAL ID',
				'ACQUIRER INSTITUTION',
				'RESPONSE',
				'TRANSACTION AMOUNT'
			),
			'cashouts' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'	
			),	
			'balance_inquiry' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'				
			),
			'withdrawals' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'		
			),
			'bills_payment' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'		
			),
			'change_pin' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'		
			),
			'purchases' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'		
			),
			'load_cash' => array(
				'Card Number',
				'Trace Number',
				'Transsaction Type',
				'Processing Code',
				'Channel',
				'Acquirer Institutions',
				'Transaction Date',
				'Terminal ID',
				'Response'		
			),
			'activated_card' => array(
				'Card Holder', 'Card No', 'Product Type', 'Card Type', 'Balance', 'Status'
			),
			'cardholders' => array(
				'Card Holder', 'Account No,', 'Processed By', 'Date', 'Approved By', 'Date'
			)
			
			
			
		);
		
		return $headers[$type];
		
	}
	
	public function generateFilenameForCard($_stat){
		switch($_stat){
			case "1": //active
				$_fn = 'activated_card';
			break;
			case "2": //inactive
				$_fn = 'inactive_card';
			break;
			case "3": //suspended
				$_fn = 'suspended_card';
			break;
			case "4": //lost
				$_fn = 'lost_card';
			break;
			case "5": //lost
				$_fn = 'blocked_card';
			break;
		}
		
		return $_fn;
	}
	
	public function generateFilename($_rpt, $date_from, $date_to){
		switch($_rpt){
			case "inactive_card":
				$_fl = 'List_of_Cards_Inactive_';
			break;
			case "activated_card":
				$_fl = 'List_of_Cards_Activated_';
			break;
			case "lost_card":
				$_fl = 'List_of_Cards_Lost_';
			break;
			case "suspended_card":
				$_fl = 'List_of_Cards_Suspended_';
			break;
			case "approved_trans_onus":
				$_fl = 'BRB_Approved_Transaction_ONUS_';
			break;
			case "approved_trans_acquirer":
				$_fl = 'BRB_Approved_Transaction_Acquirer_';
			break;
			case "approved_trans_issuer":
				$_fl = 'BRB_Approved_Transaction_Issuer_';
			break;
			case "rejected_trans_onus":
				$_fl = 'BRB_Rejected_Transaction_Report_ONUS_Terminal_';
			break;
			case "rejected_trans_acquirer":
				$_fl = 'BRB_Rejected_Transaction_Report_Acquirer_Terminal_';
			break;
			case "rejected_trans_issuer":
				$_fl = 'BRB_Rejected_Transaction_Report_Issuer_Terminal_';
			break;
			case "reversal_trans_onus":
				$_fl = 'Reversal_Transaction_Report_ONUS_Terminal_';
			break;
			case "reversal_trans_acquirer":
				$_fl = 'Reversal_Transaction_Report_Acquirer_Terminal_';
			break;
			case "reversal_trans_issuer":
				$_fl = 'Reversal_Transaction_Report_Issuer_Terminal_';
			break;
			case "interbank":
				$_fl = 'Interbank_FT_Report_';
			break;
			case "bill_payment":
				$_fl = 'BRB_Bills_Payment_';
			break;
			case "card_holder":
				$_fl = 'CH_Activity_Report_';
			break;
			case "blocked_card":
				$_fl = 'List_of_Blocked_Cards_';
			break;
			case "audit_trail":
				$_fl = 'Audit_Trail_';
			break;
			case "upload":
				$_fl = 'Upload_Report_';
			break;
			case "top_up":
				$_fl = 'Top_Up_Report_';
			break;
			case "credit_report":
				$_fl = 'Credit_Report_';
			break;
			case "debit_report":
				$_fl = 'Debit_Report_';
			break;
			case "total_balance":
				$_fl = 'Total_Balances_';
			break;
			case "mass_enrollment":
				$_fl = 'Mass_Enrollment_Report_';
			break;
			case "audit_trail":
				$_fl = 'Audit_Trail_';
			break;
			case "expired_card":
				$_fl = 'List_of_Expired_Cards_';
			break;
			case "expired_card_summary":
				$_fl = 'Summary_of_Expired_Cards_';
			break;
		}
		
		if(!empty($date_from) && !empty($date_to)){
				if($date_from <= $date_to){
					$file_name = $_fl.date('Ymd',strtotime($date_from)).'_'.date('Ymd',strtotime($date_to));
				}else{
					$file_name = $_fl.date('Ymd',strtotime($date_from));					
				}
		}else{
			$file_name = $_fl.date('Ymd');	
		}
		
		return $file_name;		
	}
	
	public function listOfViews(){
		$string = array(			
			'add' 				=> 'Add',			
			'view' 				=> 'View',			
			'edit' 				=> 'Update',			
			'index'	 			=> 'Browse',			
			'delete' 			=> 'Delete',														
			'generate' 			=> 'Generate',			
			'updatestatus' 		=> 'Change Status',			
			'approved' 			=> 'Approved',			
			'upload' 			=> 'Upload'			
		);
		
		/*$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;*/

        return $string;
	}
	
	public function listOfViews2(){
		$string = array(			
			'add' 				=> 'Add',			
			'view' 				=> 'View',			
			'edit' 				=> 'Modify',			
			'index'	 			=> 'Browse',			
			'delete' 			=> 'Delete',														
			'generate' 			=> 'Generate',							
			'approved' 			=> 'Approved',			
			'upload' 			=> 'Upload',			
			'reset' 			=> 'Reset',			
			'search' 			=> 'Search'			
		);
		
		/*$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;*/

        return $string;
	}
	
	
	public function listOfControllers2(){
		$string = array(			
			'enrolled-customer' 			=> 'Enrolled Customer',			
			'approved-application'  	=> 'Approved Customer Application',			
			'client-information' 		=> 'Client Information',
			'card-tagging'				=> 'Tagging of Cards',
			'transaction-history'		=> 'Transaction History',
			'receiving-cashcard' 		=> 'Receiving of Cash Card',
			'reports-all'	 			=> 'Reports - All',
			'account-settings'			=> 'Account Settings - Users',
			'product-config'			=> 'Configuration of Products',
			'terminal-config'			=> 'Configuration of Terminal',
			'pending-application'		=> 'Pending Applications',
			'batch-upload-crediting' 	=> 'Batch Upload - Crediting',
			'batch-upload-debiting' 	=> 'Batch Upload - Debiting',
			'batch-upload-loading'	 	=> 'Batch Upload - Loading',
			'batch-upload-enroll' 		=> 'Batch Upload - Mass Enrollment',
			'batch-upload-activate' 	=> 'Batch Upload - Mass Activation',
			'batch-upload-deactivate' 	=> 'Batch Upload - Mass Deactivation',
			'batch-upload-reissue'	 	=> 'Batch Upload - Reissuance of Card',
			'auditrail' 				=> 'Audit Trail'
		);
		
		/*$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;*/

        return $string;
	}
	
	public function listOfControllers(){
		$string = array(			
			'branches' 				=> 'Branches',			
			'cards' 				=> 'Cards',			
			'cardholders' 			=> 'Card Holder',			
			'applications' 			=> 'Application',			
			'merchants' 			=> 'Merchant',			
			'transbillspayments' 	=> 'Bills Payment',			
			'transbalanceinquiries' => 'Balance Inquiries',			
			'transcashouts' 		=> 'Cashout',			
			'transchangepins' 		=> 'Change PIN',			
			'transloadcashes' 		=> 'Load Cash',			
			'transpurchases' 		=> 'Purchases',			
			'posdevices' 			=> 'Terminal',			
			'products' 				=> 'Product',			
			'users' 				=> 'Access Accounts',			
			'groups' 				=> 'System Role',			
			'settings' 				=> 'Settings',
			'reissuanace' 			=> 'Reissuanace',
			'reports-all' 			=> 'Reports - All',			
			'reports-cards' 		=> 'Reports - Cards',			
			'reports-cardholder' 	=> 'Reports - Card Holder',			
			'reports-billspayment' 	=> 'Reports - Bills Payment',			
			'reports-balaneinquiries' 	=> 'Reports - Balance Inquiries',			
			'reports-cashout' 		=> 'Reports - Cash Out',			
			'reports-changepin' 	=> 'Reports - Change PIN',			
			'reports-loadcash' 		=> 'Reports - Load Cash',			
			'reports-purchases' 	=> 'Reports - Purchase',
			'crediting'				=> 'Batch Upload - Crediting',
			'debiting' 				=> 'Batch Upload - Debiting',
			'loading' 				=> 'Batch Upload - Loading',
			'mass enrollment' 		=> 'Batch Upload - Mass Enrollment',
			'mass activation' 		=> 'Batch Upload - Mass Activation',
			'mass deactivation' 	=> 'Batch Upload - Mass Deactivation',
			'reissuanace-upload' 	=> 'Batch Upload - Reissuance of Card',
			'auditrail' 			=> 'Audit Trail'
		);
		
		/*$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;*/

        return $string;
	}
	
	public function listOfCycleLimit(){
		$string = array(
			'Minimum Withdrawal',
			'Maximum Amount per Transaction',			
			'Total Amount for Cash Withdrawal',			
			'Total Amount for Fund Transfer',			
			'Minimum Loading',			
			'Maximum Loading',			
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	
	
	public function listOfExpirydate(){
		$string = array(
			'1 Month',
			'6 Months',
			'1 Year',
			'5 Years'			
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	public function listOfTransactionType(){
		$string = array(
			'ON US',
			'Acquirer',
			'Issuer'				
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	
	public function listLimitCycle(){
		$string = array(
			'Daily',
			'Monthly'			
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = strtoupper($str);
        endforeach;

        return $new_arr;
	}
	
	
	
	public function listOfChannels(){
		$string = array(
			'ATM',
			'POS',
			'BOL'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
	}
	
	
	
}


