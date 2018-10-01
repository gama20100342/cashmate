<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("BILLS PAYMENT SUMMARY"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('bills_summary'));
	fputcsv($file, array(""), "\t");
	
	//BALANCE INQUIRY ON US
	if(!empty($trans)){
		$total_s = 0;
		$total_c = 0;
		foreach($trans as $t): 
			$_tb_amount = str_replace("-", "", $t[0]['total_trans']);
			$_tb_count = str_replace("-", "", $t[0]['total_entry']);
			$total_s += $_tb_amount;
			$total_c += $_tb_count;
			fputcsv($file, array( 									
					$t['Institution']['code']."\r",																									
					$t['Institution']['name']."\r",																									
					$t[0]['total_entry'],																					
					number_format($t[0]['total_trans'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		//fputcsv($file, $this->Lang->report_total('onus_transactions', 'PROC CODE TOTAL', $onus_balinq_total_proc));
		fputcsv($file, $this->Lang->report_total_array('bills_summary', 'TOTAL', array(number_format($total_c, 2, ".", ","), number_format($total_s, 2, ".", ","))));
		fputcsv($file, array(""), "\t");
	}
	
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	//header('Content-Disposition: attachment; filename="'.$this->Lang->generateFilename($filename, $date_from, $date_to).'".csv;');
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
	
	
	
	//echo json_encode($trans[0][0]);
	
?>