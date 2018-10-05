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
	/*
	$data = array();
	$file = fopen("php://memory", "w");
	fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
	fputcsv($file, array("BINANGONAN RURAL BANK"), "\t");
	fputcsv($file, array("Bills Payment"), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array("Print Date : " . $title), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, array(""), "\t");
	fputcsv($file, $this->Lang->report_header('bills_payment'));
	fputcsv($file, array(""), "\t");
	if(!empty($trans)){
		foreach($trans as $t): 
			fputcsv($file, array( 
				$t['Transbillspayment']['cardno']."\r",
				$t['Transbillspayment']['trace_number'],									
				$t['Transbillspayment']['transaction_type'],									
				$t['Transbillspayment']['processing_code'],									
				$t['Transbillspayment']['channels'],									
				$t['Transbillspayment']['acquirer_institution'],																	
				date('Y M d h:i A', strtotime($t['Transbillspayment']['transdate'])),
				$t['Transbillspayment']['deviceno'],
				$t['Transbillspayment']['response']
					)
			);
		endforeach;
	}
	
	fseek($file, 0);
	header('Content-Type: application/csv');
		
	header('Content-Disposition: attachment; filename="'.$file_name.'".csv;');
	fpassthru($file);*/
	
	
	/*
	header("Content-Type: application/vnd.ms-excel");
	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
	echo "<body>";
	echo "<b>testdata1</b> \t <u>testdata2</u> \t \n ";
	echo "<b>testdata1</b> \t <u>testdata2</u> \t \n ";
	echo "</body>";
	echo "</html>";

	header("Content-disposition: attachment; filename=spreadsheet.xls");
	*/
	
	$xl = new COM("Excel.Application") or die ("ERROR: Unable to instantaniate COM!\r\n");

	//Hide MS Excel application window
	$xl->Visible = 0;

	//Create new document
	$xlBook = $xl->Workbooks->Add();

	//Create Sheet 1
	$xlBook->Worksheets(1)->Name = "Worksheet 1";
	$xlBook->Worksheets(1)->Select;

	//Set Width & Height
	$xl->ActiveSheet->Range("A1:A1")->ColumnWidth = 10.0;
	$xl->ActiveSheet->Range("B1:B1")->ColumnWidth = 13.0;

	//Add text
	$xl->ActiveSheet->Cells(1,1)->Value = "TEXT";
	$xl->ActiveSheet->Cells(1,1)->Font->Bold = True;

	//Save document
	$filename = tempnam(sys_get_temp_dir(), "excel");
	$xlBook->SaveAs($filename);

	//Close and quit
	unset( $xlBook);
	$xl->ActiveWorkBook->Close();
	$xl->Quit();
	unset( $xl );

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment;Filename=document_name.xls");

	// Send file to browser
	readfile($filename);
	unlink($filename);

?>