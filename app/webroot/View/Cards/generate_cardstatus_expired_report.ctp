<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("EXPIRED CARD REPORT"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('card_activated'));
	fputcsv($file, array(""), "\t");
	
	
	if(!empty($trans)){		
		foreach($trans as $t): 			
			fputcsv($file, array( 					
					$t['Card']['cardno']."\r",
					$t['Cardholder']['fullname']."\r",
					$t['Product']['name'],									
					$t['Card']['approved_by'],									
					date('Y M d H:i:s', strtotime($t['Card']['modified'])),					
					$t['Card']['approved_by']
				)
			);
		endforeach;
		
		fputcsv($file, $this->Lang->report_total('activated_card', 'TOTAL', count($trans)));
		fputcsv($file, array(""), "\t");
	}
	

	fseek($file, 0);
	header('Content-Type: application/csv');
			
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>