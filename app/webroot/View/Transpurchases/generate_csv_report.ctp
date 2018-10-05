<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Purchase"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('cashouts'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transpurchase']['cardno']."\r",
				$t['Transpurchase']['trace_number'],									
				$t['Transpurchase']['transaction_type'],									
				$t['Transpurchase']['processing_code'],									
				$t['Transpurchase']['channels'],									
				$t['Transpurchase']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transpurchase']['transdate'])),
				$t['Transpurchase']['deviceno'],
				$t['Transpurchase']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>