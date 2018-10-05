<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("CASHCARD LIST OF USERS"), "\t");
	fputcsv($file, array(""), "\t");
	//fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("DATE:", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(
		"NAME",
		"ACCESS INFORMATION",
		"USERNAME",
		"EMAIL ADDRESS",
		"STATUS"
	));
	fputcsv($file, array(""), "\t");
	
	$total_active = 0;
	$total_inactive = 0;
	$total_blocked = 0;
	
	if(!empty($users)){		
		foreach($users as $t): 			
			if($t['User']['status_id']==1){
				$total_active++;
			}
			
			if($t['User']['status_id']==2){
				$total_inactive++;
			}
			
			if($t['User']['status_id']==4){
				$total_blocked++;
			}
			
			fputcsv($file, array( 					
					$t['User']['name']."\r",
					$t['Group']['name'],
					$t['User']['username'],
					$t['User']['email'],
					//date('Y-m-d', strtotime($t['User']['pass_expire']))."\r",
					$t['Status']['name']
				)
			);
		endforeach;			
		fputcsv($file, array(""), "\t");
	}
	
	fputcsv($file, array(
		"", "", "", "TOTAL ACTIVE", $total_active 
	));
	fputcsv($file, array(
		"", "", "", "TOTAL INACTIVE", $total_inactive
	));
	fputcsv($file, array(
		"", "", "", "TOTAL BLOCKED", $total_blocked
	));
	fputcsv($file, array(
		"", "", "", "TOTAL", count($users) 
	));
	

	fseek($file, 0);
	header('Content-Type: application/csv');
			
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>