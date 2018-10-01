<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Load Cash"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('cashouts'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transloadcash']['cardno']."\r",
				$t['Transloadcash']['trace_number'],									
				$t['Transloadcash']['transaction_type'],									
				$t['Transloadcash']['processing_code'],									
				$t['Transloadcash']['channels'],									
				$t['Transloadcash']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transloadcash']['transdate'])),
				$t['Transloadcash']['deviceno'],
				$t['Transloadcash']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>