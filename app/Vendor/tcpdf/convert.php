<?php

	
	//header("Content-Type: application/json; charset=UTF-8");
	
	
	//$sdata = array();
	$ndata 			= json_decode(file_get_contents("php://input"));
	$tgen_dir 		= '/reports/';
	$time_generated = date('Y_m_d_h_i_s_a');
	$tgen_year		= date('Y');
	$tgen_month  	= date('m');
	$tgen 			= array();
	//$r_title		= $_GET['title'];
	$tgen["details"] = array(
		'time' 	=> $time_generated,
		'year' 	=> $tgen_year,
		'month' => $tgen_month
	);
	
	$header_text 	= array(
						'<th style="width: 5%;">No.</th>', 
						'<th style="width: 10%;">BC Code</th>', 
						'<th style="width: 20%;">BC Name</th>', 
						'<th style="width: 25%;">BC Region / Area</th>', 
						'<th style="width: 15%;">Unreplicated</th>', 
						'<th style="width: 15%;">SysModified</th>', 
						'<th style="width: 10%;">Version</th>'
					);
						
	/*------------------
	for testing output
	------------------*/
	/*foreach($ndata as $key => $d):
		$sdata[] = array(
			'id' => $d[0],
			'name' => $d[1],
			'name' => $d[2],
		);
		
	endforeach;
	
	//echo json_encode(array("count" => count($ndata)));
	echo json_encode($sdata);
	//var_dump($sdata);
	*/
	
	
	
require_once('tcpdf.php');

class PtnPDF extends TCPDF {

    //Page header
    public function Header() {
		//$image_file 	= dirname(__FILE__).'/logos/logored.png';
		$image_file1 	= dirname(__FILE__).'/logos/logo.jpg';
	
		$report_title 	= 'PTN Replication Monitoring ';
		$region_area  	= strtoupper(isset($_GET['title']) && !empty($_GET['title']) ? $_GET['title'] : '-');
		$report_date  	= 'As of '.date('F d, Y');
		$header_text 	= array(
							'No.', 'BC Code', 'BC Name', 'BC Area', 'Unreplicated', 'SysModified', 'Version'
						);
						
		$top_header = '<table cellpadding="10" cellspacing="0" border="1">
							<tr>
								<td rowspan="2" style="width: 30%;"> <img src="'.$image_file1.'" style="width: 300px;"/></td>														
								<td colspan="3" style="text-align: center; width: 70%;">'.$report_title.' - '.$region_area.'</td>
							</tr>
							<tr>
								<td style="width: 6%;">Date</td>
								<td style="width: 40%;">'.date('l F d, Y').'</td>
								<td style="width: 6%;">Time</td>
								<td>'.date('h:i A').'</td>
							</tr>
						</table>';
		/*$top_header .= '<div style="text-align: center;">
						<br />
					    <img src="'.$image_file1.'" style="width: 300px;"/>
						<font style="font-weight: bold;">
						<br />
							'.$report_title.'
						</font> <br /> 
						<font style="font-weight: bold; font-size: 12px !important;">
							'.$region_area.'
						</font>
						<br />
							'.$report_date.'
						</div>';*/
		
		$header_title = $this->writeHTML($top_header, true, false, false, false, '');
		
		
		//$header_title .= $this->writeHTML($sub_header, true, true, true, true, '');
		//$margin = $this->getMargins();
		//$this->SetY(20);
        $this->SetFont('helvetica', 'B', 12);
		$this->SetFillColor(215, 235, 255);
		$this->MultiCell(0, 15, $header_title, 0, 'C', 0, 0, '', '', true);
		
    }

  
    public function Footer() {
        $this->SetY(-10);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 0, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf = new PtnPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MLHUILLIER FINANCIAL SERVICES');
$pdf->SetTitle('PTN MONITORING REPORT');
$pdf->SetSubject('PTN MONITORING REPORT');


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(16, 33, 32);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//$pdf->SetFooterMargin(20);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(TRUE, 20);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


						
// set font
$pdf->SetFont('times', 'B', 10);


$txt ='';
// add a page
$pdf->AddPage();

$txt .= '<table cellpadding="6" border="1" cellspacing="0" style="text-align: center!important; border: 1px solid #ccc;">
			<thead>
				<tr style="font-size: 10px !important;">
					<th colspan="4" style="width: 60%">BUSINESS CENTER</th>
					<th colspan="3" style="width: 40%">REPLICATION STATUS</th>
				</tr>						
				<tr style="font-size: 12px !important;">';
					foreach($header_text as $h):
						$txt .= $h;
					endforeach;						
$txt .='</tr></thead>';
$txt .='<tbody>';
if(!empty($ndata)){
foreach($ndata as $key => $d):
	$txt .='<tr style="font-size: 10px !important;">';
		$txt .='<td style="width: 5%;">'.$d[0].'</td>';
		$txt .='<td style="width: 10%;">'.$d[1].'</td>';
		$txt .='<td style="width: 20%; text-align: left !important;">'.$d[2].'</td>';
		$txt .='<td style="width: 25%; text-align: left !important;">'.$d[3].' '.$d[4].'</td>';
		$txt .='<td style="width: 15%;">'.$d[5].'</td>';
		$txt .='<td style="width: 15%;">'.$d[6].'</td>';
		$txt .='<td style="width: 10%;">'.$d[7].'</td>';
	$txt .='</tr>';
endforeach;
}
$txt .='</tbody></table>';
		
		

$pdf->writeHTML($txt, true, false, false, false, '');

// print a block of text using Write()
//$pdf->writeHTML(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_003.pdf', 'I');



// write some JavaScript code
/*$js = <<<EOD
app.alert('PTN MONITORING REPORT', 3, 0, 'Report Successfully Created');
EOD;*/

// force print dialog
$js = 'print(true);';

// set javascript
$pdf->IncludeJS($js);

ob_clean();
$pdf->Output(dirname(__FILE__). $tgen_dir . $tgen_year .'/'. $tgen_month.'/ptn_report_'.$time_generated.'.pdf', 'F');
echo json_encode($tgen, JSON_PRETTY_PRINT);

///$pdf->Output('example_003.pdf', 'I');


//============================================================+
// END OF FILE
//============================================================+
	

	
?>