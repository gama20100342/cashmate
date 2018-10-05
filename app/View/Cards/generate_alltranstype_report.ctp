<?php
  
	
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	
	
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response) ." TRANSACTIONS"), "\t");
	fputcsv($file, array("ON US"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('onus_transactions'));

	
	//ON US
	if(!empty($__onus)){
		$grand_total = 0;
		foreach($__onus as $t): 
				$grand_total += $t['transaction_amount'];
				fputcsv($file, array( 
						date('Y M d h:i A', strtotime($t['transdate'])),
						$t['cardno']."\r",
						$t['trace_number'],									
						strtoupper($t['transaction_type']),									
						strtoupper($t['processing_code']),									
						$t['channels'],									
						$t['deviceno'],																									
						$t['response'],
						number_format($t['transaction_amount'], 2, ".", ",")."\r"
					)
				);				
		endforeach;		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","",number_format($grand_total, 2, ".", ",")."\r"));
	}else{
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","", "0"));	
	}
	
	
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response) ." TRANSACTIONS"), "\t");
	fputcsv($file, array("ISSUER"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('onus_transactions'));
	
	
	//ON US
	if(!empty($__issuer)){
		$grand_total = 0;
		foreach($__issuer as $t): 
				$grand_total += $t['transaction_amount'];
				fputcsv($file, array( 
						date('Y M d h:i A', strtotime($t['transdate'])),
						$t['cardno']."\r",
						$t['trace_number'],									
						strtoupper($t['transaction_type']),									
						strtoupper($t['processing_code']),									
						$t['channels'],									
						$t['deviceno'],																									
						$t['response'],
						number_format($t['transaction_amount'], 2, ".", ",")."\r"
					)
				);				
		endforeach;		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","",number_format($grand_total, 2, ".", ",")."\r"));
	}else{
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","", "0"));	
	}
	
	
	fputcsv($file, array("BINANGONAN RURAL BANK REPORT"), "\t");
	fputcsv($file, array(strtoupper($response) ." TRANSACTIONS"), "\t");
	fputcsv($file, array("ACQUIRER"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('onus_transactions'));
	
	
	//ON US
	if(!empty($__acquirer)){
		$grand_total = 0;
		foreach($__acquirer as $t): 
				$grand_total += $t['transaction_amount'];
				fputcsv($file, array( 
						date('Y M d h:i A', strtotime($t['transdate'])),
						$t['cardno']."\r",
						$t['trace_number'],									
						strtoupper($t['transaction_type']),									
						strtoupper($t['processing_code']),									
						$t['channels'],									
						$t['deviceno'],																									
						$t['response'],
						number_format($t['transaction_amount'], 2, ".", ",")."\r"
					)
				);				
		endforeach;		
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","",number_format($grand_total, 2, ".", ",")."\r"));
	}else{
		fputcsv($file, array(""), "\t");
		fputcsv($file, array("","","","","","","GRAND TOTAL","", "0"));	
	}
	
	
	

	fseek($file, 0);
	header('Content-Type: application/csv');
			
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
	

	/*foreach($_onus["Purchase"] as $_t): 
		echo $_t["Transpurchase"]["id"].'<br />';
	endforeach;*/
	
?>