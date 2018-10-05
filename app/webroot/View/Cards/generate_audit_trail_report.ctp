<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("AUDIT TRAIL GENERAL AND SUB PER USERNAME AND SUB PER TERMINAL"), "\t");
	fputcsv($file, array(""), "\t");
	//fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("USERNAME", "USER TYPE", "TRANSACTION DIRECTORY", "TRANSACTION TYPE", "TRANSACTION DESCRIPTION", "DATE", "TIME"));	
	fputcsv($file, array(""), "\t");
	
	fseek($file, 0);
	header('Content-Type: application/csv');
			
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>