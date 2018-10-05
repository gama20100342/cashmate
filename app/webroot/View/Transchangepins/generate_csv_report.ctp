<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Change PIN"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('cashouts'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transchangepin']['cardno']."\r",
				$t['Transchangepin']['trace_number'],									
				$t['Transchangepin']['transaction_type'],									
				$t['Transchangepin']['processing_code'],									
				$t['Transchangepin']['channels'],									
				$t['Transchangepin']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transchangepin']['transdate'])),
				$t['Transchangepin']['deviceno'],
				$t['Transchangepin']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>