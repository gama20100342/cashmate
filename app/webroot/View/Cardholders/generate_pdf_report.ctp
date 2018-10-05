<?php 
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


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
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();

$html = '<style>'.file_get_contents(APP.'/webroot/css/bootstrap.min.css').'</style>';
$html .= '<style>'.file_get_contents(APP.'/webroot/css/custom.css').'</style>';
$html .= '<style>'.file_get_contents(APP.'/webroot/css/util.css').'</style>';
$html .= $this->App->tHead($this->Lang->report_header('cashouts'));

if(!empty($trans)){
	$html .='<tbody>';
	foreach($trans as $key => $t):	
		$html .='<tr>';
				$html .='<td>'.$t['Transbalanceinquiry']['posimei'].'</td>';
				$html .='<td>'.$t['Transbalanceinquiry']['cardno'].'</td>';
				$html .='<td>'.$t['Transbalanceinquiry']['accountname'].'</td>';
				$html .='<td>'.date('Y M d h:i A', strtotime($t['Transbalanceinquiry']['transdate'])).'</td>';																		
				$html .='<td>'.$t['Transbalanceinquiry']['processed_by'].'</td>';
				$html .='<td>'.$t['Status']['name'].'</td>';
		$html .='</tr>';
	endforeach;
	$html .='</tbody>';
}

$html .= $this->App->tFoot();
// print a block of text using Write()
//$pdf->write(0, $text, '', 0, 'C', true, 0, false, false, 0);

$pdf->writeHTML($html, true, false, true, false, '');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($file_name.'.pdf', 'D');



?>