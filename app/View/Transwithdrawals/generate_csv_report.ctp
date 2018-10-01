<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Withdrawals"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('withdrawals'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transwithdrawal']['cardno']."\r",
				$t['Transwithdrawal']['trace_number'],									
				$t['Transwithdrawal']['transaction_type'],									
				$t['Transwithdrawal']['processing_code'],									
				$t['Transwithdrawal']['channels'],									
				$t['Transwithdrawal']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transwithdrawal']['transdate'])),
				$t['Transwithdrawal']['deviceno'],
				$t['Transwithdrawal']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>