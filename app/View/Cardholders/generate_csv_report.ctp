<?php
   
	ini_set('auto_detect_line_endings', true);	
	$file = fopen("php://memory", "w");
	//fputcsv($file, "Sample File \n");
	//fputcsv($file, "ASADASd");	
	fputcsv($file, $this->Lang->report_header('cardholders'));
	
	$data = array();
	
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array(
					$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'],						
					$t['Cardholder']['refid'],
					$t['Cardholder']['processed_by'],
					date('Y-M-d h:i A', strtotime($t['Cardholder']['registration'])),	
					$t['Cardholder']['approved_by'],
					date('Y-M-d h:i A', strtotime($t['Cardholder']['modified']))																			
					)
				);
		endforeach;		
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);
		
?>