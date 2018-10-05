<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("INTERBANK FUND TRANSFER"), "\t");
	fputcsv($file, array(""), "\t");
	//fputcsv($file, array("RUN DATE : " . date('Y-m-d')), "\t");
	//fputcsv($file, array("TRANSACTION DATE : " . $title), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));	
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('interbanks'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		$total = 0;
		foreach($trans as $t): 
			$_tb_amount = str_replace("-", "", $t['Transinterbank']['transaction_amount']);
			$total += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transinterbank']['transdate'])),
					$t['Transinterbank']['deviceno'],
					$t['Transinterbank']['trace_number'],									
					$t['Transinterbank']['trans_cardnumber']."\r",								
					$t['Transinterbank']['receiving_accountno']."\r",																
					number_format($t['Transinterbank']['transaction_amount'], 2, ".", ",")."\r"							
					)
			);
		endforeach;		
		fputcsv($file, array(""), "\t");
		fputcsv($file, $this->Lang->report_total('interbank_report_lower', 'Total', number_format($total, 2, ".", ",")));
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>