<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("BILLS PAYMENT SUMMARY"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("PRINT DATE", date('Y-m-d h:i:s')."\r"));	
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("DESCRIPTION", "TOTAL"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("NO. OF CARDHOLDERS", $total_holders));
	fputcsv($file, array("NO. OF ACTIVE CARDHOLDERS", $total_active));
	fputcsv($file, array("NO. OF INACTIVE CARDHOLDERS", $total_inactive));
	fputcsv($file, array("NO. OF CARDHOLDERS WITH 0", 0));
	fputcsv($file, array("NO. OF CARDHOLDERS WITH 1 - 5", 0));
	fputcsv($file, array("NO. OF CARDHOLDERS WITH 6 - 10", 0));
	fputcsv($file, array("NO. OF CARDHOLDERS WITH 11 - 15", 0));
	fputcsv($file, array("NO. OF CARDHOLDERS WITH OVER 16", 0));
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
	
			
	
?>