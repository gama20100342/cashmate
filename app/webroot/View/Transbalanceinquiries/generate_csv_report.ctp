<?php
   
   /* header('Content-Description: File Transfer');
    header('Content-Type: application/csv');
    header("Content-Disposition: attachment; filename=page-data-export.csv");
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    $handle = fopen('php://output', 'w');
    ob_clean(); 

		foreach($this->App->report_tHeader($this->Lang->report_header('cashouts')) as $key => $index):
			fputcsv($handle, $row);   // direct to buffered output
		endforeach;

    ob_flush(); 
    fclose($handle);
    die();		
  */
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Balanace Inquiry"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('balance_inquiry'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transbalanceinquiry']['cardno']."\r",
				$t['Transbalanceinquiry']['trace_number'],									
				$t['Transbalanceinquiry']['transaction_type'],									
				$t['Transbalanceinquiry']['processing_code'],									
				$t['Transbalanceinquiry']['channels'],									
				$t['Transbalanceinquiry']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])),
				$t['Transbalanceinquiry']['deviceno'],
				$t['Transbalanceinquiry']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>