<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("TOTAL BALANCES"), "\t");
	fputcsv($file, array(""), "\t");
	//fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("", "AMOUNT", "COUNT"));
	fputcsv($file, array("TOTAL BALANCES", "", ""));
	fputcsv($file, array("TOTAL WITHDRAWAL", "", ""));
	fputcsv($file, array("TOTAL TOTAL CREDIT", "", ""));
	fputcsv($file, array(""), "\t");
	
	fseek($file, 0);
	header('Content-Type: application/csv');
			
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>