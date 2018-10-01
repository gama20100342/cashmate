<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');




// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
		$image_file 	= dirname(__FILE__).'/logos/logored.png';
		$header_text 	= array(
			'No.', 'BC Code', 'BC Name', 'BC Area', 'Unreplicated', 'SysModified', 'Version'
		);
		$report_title 	= 'REPLICATION PTN MONITORING REPORT';
		$region_area  	= 'REGION - AREA ';
		$report_date  	= 'As of '.date('F d, Y');
		
		$top_header = '<div style="text-align: center;"><br />
					    <img src="'.$image_file.'" style="width: 300px;"/>
						<font style="font-weight: bold;">
						<br />
							'.$report_title.'
						</font> <br /> 
						<font style="font-weight: bold; font-size: 12px !important;">
							'.$region_area.'
						</font>
						<br />
							'.$report_date.'
						</div><br /><br />';
		
		$header_title = $this->writeHTML($top_header, true, false, false, false, '');
		
		$sub_header = '<table cellpadding="6" border="1" cellspacing="0" style="text-align: center!important; border: 1px solid #ccc;">
								<tr><th colspan="4">Business Center</th><th colspan="3">Transaction Status</th></tr>						
								<tr>';
						foreach($header_text as $h):
							$sub_header .='<th>'.$h.'</th>';
						endforeach;						
		$sub_header .='</tr></table>';
		
		$header_title .= $this->writeHTML($sub_header, true, false, false, false, '');
		
		
        // Logo
       // $image_file = K_PATH_IMAGES.'logo_example.jpg';
       // $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
		$margin = $this->getMargins();
		$this->SetY(20);
		// set cell padding
		//$this->setCellPaddings(1, 1, 1, 1);

		// set cell margins
		//$this->setCellMargins(5, 5, 5, 5);
		
        $this->SetFont('helvetica', 'B', 12);
		$this->SetFillColor(215, 235, 255);
        // Title
        //$this->Cell(0, 15, $header_title, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->MultiCell(0, 15, $header_title, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		//$this->MultiCell(80, 5, $header_title."\n", 1, 'J', 1, 1, '' ,'', true);
		
		//MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$this->MultiCell(0, 15, $header_title, 0, 'C', 0, 0, '', '', true);
		
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD

EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_003.pdf', 'I');
$pdf->Output('http://localhost/php_mvc/plugins/example_003.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
	
//echo json_encode($_POST['ndata']);
	
?>