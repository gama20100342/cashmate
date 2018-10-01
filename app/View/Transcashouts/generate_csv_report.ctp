<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Cashout"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('cashouts'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transcashout']['cardno']."\r",
				$t['Transcashout']['trace_number'],									
				$t['Transcashout']['transaction_type'],									
				$t['Transcashout']['processing_code'],									
				$t['Transcashout']['channels'],									
				$t['Transcashout']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transcashout']['transdate'])),
				$t['Transcashout']['deviceno'],
				$t['Transcashout']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>