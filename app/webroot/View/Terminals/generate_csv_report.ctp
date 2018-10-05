<?php
   
	
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response)." TRANSACTIONS"), "\t");
	fputcsv($file, array("ON US PER TERMINAL"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('terminal_transactions'));
	fputcsv($file, array(""), "\t");
	
	//TRANSACTION ON US - PER TERMINAL
	if(!empty($_onus_data)){		
	
		$total_balance_inquiry 	= 0;
		$total_cash_withdrawals = 0;
		$total_cash_out 		= 0;			
		$total_purchase  		= 0;			
		$total_fund_transfer  	= 0;			
		$total_cash_load 		= 0;			
		$total_bills_payment 	= 0;			
					
		foreach($_onus_data as $t): 
		
			$total_balance_inquiry 	+= $t['total_balance_inquiry'];
			$total_cash_withdrawals += $t['total_cash_withdrawals'];
			$total_cash_out 		+= $t['total_cash_out']; 				
			$total_purchase  		+= $t['total_purchase']; 				
			$total_fund_transfer  	+= $t['total_fund_transfer'];
			$total_cash_load 		+= $t['total_cash_load']; 				
			$total_bills_payment 	+= $t['total_bills_payment'];		
						
			fputcsv($file, array( 
					$t['deviceno']."\r",				
					$t['total_balance_inquiry'],
					$t['total_cash_withdrawals'], 	
					$t['total_bills_payment'], 			
					$t['total_cash_out'], 	
					$t['total_cash_load'],								
					$t['total_fund_transfer'],					
					$t['total_purchase'],										
												
				)
			);
			
		endforeach;
		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array(
			"GRAND TOTAL", 
			$total_balance_inquiry, 
			$total_cash_withdrawals, 
			$total_bills_payment,
			$total_cash_out,
			$total_cash_load,
			$total_fund_transfer,
			$total_purchase
		));
		
	}else{
		fputcsv($file, array("GRAND TOTAL"));
	}
	
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
		
	
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response)." TRANSACTIONS"), "\t");
	fputcsv($file, array("ISSUER PER TERMINAL"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('terminal_transactions'));
	fputcsv($file, array(""), "\t");
	
	
	//TRANSACTION ACQUIRER - PER TERMINAL
	if(!empty($_acq_data)){		
	
		$total_balance_inquiry 	= 0;
		$total_cash_withdrawals = 0;
		$total_cash_out 		= 0;			
		$total_purchase  		= 0;			
		$total_fund_transfer  	= 0;			
		$total_cash_load 		= 0;			
		$total_bills_payment 	= 0;			
					
		foreach($_acq_data as $t): 
		
			$total_balance_inquiry 	+= $t['total_balance_inquiry'];
			$total_cash_withdrawals += $t['total_cash_withdrawals'];
			$total_cash_out 		+= $t['total_cash_out']; 				
			$total_purchase  		+= $t['total_purchase']; 				
			$total_fund_transfer  	+= $t['total_fund_transfer'];
			$total_cash_load 		+= $t['total_cash_load']; 				
			$total_bills_payment 	+= $t['total_bills_payment'];		
						
			fputcsv($file, array( 
					$t['deviceno']."\r",				
					$t['total_balance_inquiry'],
					$t['total_cash_withdrawals'], 	
					$t['total_bills_payment'], 			
					$t['total_cash_out'], 	
					$t['total_cash_load'],								
					$t['total_fund_transfer'],					
					$t['total_purchase'],										
												
				)
			);
			
		endforeach;
		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array(
			"GRAND TOTAL", 
			$total_balance_inquiry, 
			$total_cash_withdrawals, 
			$total_bills_payment,
			$total_cash_out,
			$total_cash_load,
			$total_fund_transfer,
			$total_purchase
		));
		
	}else{
		fputcsv($file, array("GRAND TOTAL"));
	}
	
	
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response)." TRANSACTIONS"), "\t");
	fputcsv($file, array("ACQUIRER PER TERMINAL"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('terminal_transactions'));
	fputcsv($file, array(""), "\t");
	
	//TRANSACTION ISSUER - PER TERMINAL
	if(!empty($_iss_data)){		
	
		$total_balance_inquiry 	= 0;
		$total_cash_withdrawals = 0;
		$total_cash_out 		= 0;			
		$total_purchase  		= 0;			
		$total_fund_transfer  	= 0;			
		$total_cash_load 		= 0;			
		$total_bills_payment 	= 0;			
					
		foreach($_iss_data as $t): 
		
			$total_balance_inquiry 	+= $t['total_balance_inquiry'];
			$total_cash_withdrawals += $t['total_cash_withdrawals'];
			$total_cash_out 		+= $t['total_cash_out']; 				
			$total_purchase  		+= $t['total_purchase']; 				
			$total_fund_transfer  	+= $t['total_fund_transfer'];
			$total_cash_load 		+= $t['total_cash_load']; 				
			$total_bills_payment 	+= $t['total_bills_payment'];		
						
			fputcsv($file, array( 
					$t['deviceno']."\r",				
					$t['total_balance_inquiry'],
					$t['total_cash_withdrawals'], 	
					$t['total_bills_payment'], 			
					$t['total_cash_out'], 	
					$t['total_cash_load'],								
					$t['total_fund_transfer'],					
					$t['total_purchase'],										
												
				)
			);
			
		endforeach;
		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array(
			"GRAND TOTAL", 
			$total_balance_inquiry, 
			$total_cash_withdrawals, 
			$total_bills_payment,
			$total_cash_out,
			$total_cash_load,
			$total_fund_transfer,
			$total_purchase
		));
		
	}else{
		fputcsv($file, array("GRAND TOTAL"));
	}
	
	
	fseek($file, 0);
	header('Content-Type: application/csv');		
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>