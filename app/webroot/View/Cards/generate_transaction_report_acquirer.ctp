<?php
  
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array($status ." TRANSACTIONS : ACQUIRER"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("RUN DATE", date('Y-m-d h:i:s')."\r"));
	fputcsv($file, array("TRANSACTION DATE", $title."\r"));
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('main_report'));
	fputcsv($file, array(""), "\t");
	
	//BALANCE INQUIRY ON US
	if(!empty($acq_balance_inquiries)){
		$total_balance_inquiry = 0;
		foreach($acq_balance_inquiries as $t): 
			$_tb_amount = str_replace("-", "", $t['Transbalanceinquiry']['transaction_amount']);
			$total_balance_inquiry += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])),
					$t['Transbalanceinquiry']['cardno']."\r",
					$t['Transbalanceinquiry']['trace_number'],									
					strtoupper($t['Transbalanceinquiry']['transaction_type']),									
					strtoupper($t['Transbalanceinquiry']['processing_code']),									
					$t['Transbalanceinquiry']['channels'],									
					$t['Transbalanceinquiry']['deviceno'],
					$t['Transbalanceinquiry']['acquirer_institution'],																									
					$t['Transbalanceinquiry']['response'],
					number_format($t['Transbalanceinquiry']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_balinq_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_balance_inquiry, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	
	//END OF BALANCE INQUIRY
	
	//PURCHASE ACQUIRER
	if(!empty($acq_purchase)){
		$total_purchase = 0;
		foreach($acq_purchase as $t): 
			$_tb_amount = str_replace("-", "", $t['Transpurchase']['transaction_amount']);
			$total_purchase += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transpurchase']['transdate'])),
					$t['Transpurchase']['cardno']."\r",
					$t['Transpurchase']['trace_number'],									
					strtoupper($t['Transpurchase']['transaction_type']),									
					strtoupper($t['Transpurchase']['processing_code']),									
					$t['Transpurchase']['channels'],									
					$t['Transpurchase']['deviceno'],
					$t['Transpurchase']['acquirer_institution'],																									
					$t['Transpurchase']['response'],
					number_format($t['Transpurchase']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_purchase_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_purchase, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF PURCHASE
	
	

	
	//CASH WITHDRAWALS ACQUIRER
	if(!empty($acq_withdrawals)){
		$total_withdrawals = 0;
		foreach($acq_withdrawals as $t): 
			$_tb_amount = str_replace("-", "", $t['Transwithdrawal']['transaction_amount']);
			$total_withdrawals += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transwithdrawal']['transdate'])),
					$t['Transwithdrawal']['cardno']."\r",
					$t['Transwithdrawal']['trace_number'],									
					strtoupper($t['Transwithdrawal']['transaction_type']),									
					strtoupper($t['Transwithdrawal']['processing_code']),									
					$t['Transwithdrawal']['channels'],									
					$t['Transwithdrawal']['deviceno'],
					$t['Transwithdrawal']['acquirer_institution'],																									
					$t['Transwithdrawal']['response'],
					number_format($t['Transwithdrawal']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_withdrawals_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_withdrawals, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF CASH WITHDRAWALS


	//BILLS PAYMENT ACQUIRER
	if(!empty($acq_billspayment)){
		$total_billspayment = 0;
		foreach($acq_billspayment as $t): 
			$_tb_amount = str_replace("-", "", $t['Transbillspayment']['transaction_amount']);
			$total_billspayment += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transbillspayment']['transdate'])),
					$t['Transbillspayment']['cardno']."\r",
					$t['Transbillspayment']['trace_number'],									
					strtoupper($t['Transbillspayment']['transaction_type']),									
					strtoupper($t['Transbillspayment']['processing_code']),									
					$t['Transbillspayment']['channels'],									
					$t['Transbillspayment']['deviceno'],
					$t['Transbillspayment']['acquirer_institution'],																									
					$t['Transbillspayment']['response'],
					number_format($t['Transbillspayment']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_billspayment_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_billspayment, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF BILLS PAYMENT
	

	
	//CHANGE PIN ACQUIRER
	if(!empty($acq_changepin)){
		$total_changepin = 0;
		foreach($acq_changepin as $t): 
			$_tb_amount = str_replace("-", "", $t['Transchangepin']['transaction_amount']);
			$total_billspayment += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transchangepin']['transdate'])),
					$t['Transchangepin']['cardno']."\r",
					$t['Transchangepin']['trace_number'],									
					strtoupper($t['Transchangepin']['transaction_type']),									
					strtoupper($t['Transchangepin']['processing_code']),									
					$t['Transchangepin']['channels'],									
					$t['Transchangepin']['deviceno'],
					$t['Transchangepin']['acquirer_institution'],																									
					$t['Transchangepin']['response'],
					number_format($t['Transchangepin']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_changepin_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_changepin, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF CHANGE PIN
	
	
	
	//CASH LOAD ACQUIRER
	if(!empty($acq_loadcash)){
		$total_cashload = 0;
		foreach($acq_loadcash as $t): 
			$_tb_amount = str_replace("-", "", $t['Transloadcash']['transaction_amount']);
			$total_cashload += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transloadcash']['transdate'])),
					$t['Transloadcash']['cardno']."\r",
					$t['Transloadcash']['trace_number'],									
					strtoupper($t['Transloadcash']['transaction_type']),									
					strtoupper($t['Transloadcash']['processing_code']),									
					$t['Transloadcash']['channels'],									
					$t['Transloadcash']['deviceno'],
					$t['Transloadcash']['acquirer_institution'],																									
					$t['Transloadcash']['response'],
					number_format($t['Transloadcash']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_loadcash_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_cashload, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF CASH LOAD
	
	
	
	//CASH OUT ACQUIRER
	if(!empty($acq_cashout)){
		$total_cashout = 0;
		foreach($acq_cashout as $t): 
			$_tb_amount = str_replace("-", "", $t['Transcashout']['transaction_amount']);
			$total_cashout += $_tb_amount;
			fputcsv($file, array( 
					date('Y M d h:i A', strtotime($t['Transcashout']['transdate'])),
					$t['Transcashout']['cardno']."\r",
					$t['Transcashout']['trace_number'],									
					strtoupper($t['Transcashout']['transaction_type']),									
					strtoupper($t['Transcashout']['processing_code']),									
					$t['Transcashout']['channels'],									
					$t['Transcashout']['deviceno'],
					$t['Transcashout']['acquirer_institution'],																									
					$t['Transcashout']['response'],
					number_format($t['Transcashout']['transaction_amount'], 2, ".", ",")."\r"
				)
			);
		endforeach;
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'PROC CODE TOTAL', $acq_cashout_total_proc));
		fputcsv($file, $this->Lang->report_total('main_report_lower', 'TOTAL', number_format($total_cashout, 2, ".", ",")));
		fputcsv($file, array(""), "\t");
	}
	//END OF CASH OUT
	
	

	fseek($file, 0);
	header('Content-Type: application/csv');
		
	//header('Content-Disposition: attachment; filename="'.$this->Lang->generateFilename($filename, $date_from, $date_to).'".csv;');
	header('Content-Disposition: attachment; filename='.$this->Lang->generateFilename($filename, $date_from, $date_to).'.csv;');
	fpassthru($file);
		
?>