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

	
	ini_set('auto_detect_line_endings', true);	
	$file = fopen("php://memory", "w");
	fputcsv($file, $this->Lang->report_header('activated_card'));
	$data = array();
	
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array(
					$t['Cardholder']['firstname'].' '.$t['Cardholder']['middlename'].' '.$t['Cardholder']['lastname'],											
					"'".$t['Card']['cardno']."'",
					//date('m/d/Y', strtotime($t['Card']['registration'])),									
					//date('m/d/Y', strtotime($t['Card']['modified'])),									
					$t['Product']['name'],
					$t['Cardtype']['name'],
					$t['Card']['balance'],
					$t['Cardstatus']['name']
					
				)
			);
		endforeach;		
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');		
	header('Content-Disposition: attachment; filename="'.$this->Lang->generateFilename($this->Lang->generateFilenameForCard($status), $date_from, $date_to).'".csv;');
	fpassthru($file);
		
?>