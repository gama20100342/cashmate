<?php

require_once('tcpdf.php');

class PtnPDF extends TCPDF {

    public function Header() {
		$image_file1 	= dirname(__FILE__).'/logos/logo.jpg';
		$report_title 	= 'PTN Replication Monitoring ';
		$region_area  	= strtoupper(isset($_GET['zone_key']) && !empty($_GET['zone_key']) ? $_GET['zone_key'] : '-');
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
	
		$header_title = $this->writeHTML($top_header, true, false, false, false, '');
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

$pdf = new PtnPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('MLHUILLIER FINANCIAL SERVICES');
$pdf->SetTitle('PTN MONITORING REPORT');
$pdf->SetSubject('PTN MONITORING REPORT');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(16, 38, 32);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

$pdf->SetFont('times', 'B', 10);
$pdf->AddPage();
$txt = '<table cellpadding="6" border="1" cellspacing="0" style="text-align: center!important; border: 1px solid #ccc;">
			<thead>
				<tr style="font-size: 10px !important;">
					<th colspan="5" style="width: 60%">BUSINESS CENTER</th>
					<th colspan="3" style="width: 40%">REPLICATION STATUS</th>
				</tr>						
				<tr style="font-size: 12px !important;">';
					foreach($header_text as $h):
						$txt .= $h;
					endforeach;						
		$txt .='</tr>
		</thead>';
$txt .='<tbody>';
	if(!empty($datas)){
	foreach($datas as $key => $d):
		$txt .='<tr style="font-size: 10px !important;">';
			$txt .='<td style="width: 5%;">'.$d[0].'</td>';
			$txt .='<td style="width: 10%;">'.$d[1].'</td>';
			$txt .='<td style="width: 15%; text-align: left !important;">'.$d[2].'</td>';
			$txt .='<td style="width: 15%; text-align: left !important;">'.$d[3].'</td>';
			$txt .='<td style="width: 15%; text-align: left !important;">'.$d[4].'</td>';
			$txt .='<td style="width: 15%;">'.$d[5].'</td>';
			$txt .='<td style="width: 15%;">'.$d[6].'</td>';
			$txt .='<td style="width: 10%;">'.$d[7].'</td>';
		$txt .='</tr>';
	endforeach;
		//$txt .='<tr><td colspan="7">Total Unreplicated Items: </td></tr>';
	}else{
		$txt .='<tr><td colspan="7">No Data Found</td></tr>';
	}

$txt .='</tbody>
		</table>';
$pdf->writeHTML($txt, true, false, false, false, '');
$pdf->AddPage();
$txt2 = '<table width="30%" cellpadding="3" cellspacing="0" border="1">
			<tr><td colspan="2">Auto Replication Installed</td></tr>
			<tr><td>V1.5</td><td style="text-align: right;">'.$version15.'</td></tr>
			<tr><td>V1.4</td><td style="text-align: right;">'.$version14.'</td></tr>
			<tr><td>V1.3</td><td style="text-align: right;">'.$version13.'</td></tr>
			<tr><td>V1.2</td><td style="text-align: right;">'.$version12.'</td></tr>
			<tr><td>V1.1</td><td style="text-align: right;">'.$version11.'</td></tr>
			<tr><td>V1.0</td><td style="text-align: right;">'.$version10.'</td></tr>			
			<tr><td>No Auto</td><td style="text-align: right;">'.$noauto.'</td></tr>
			<tr><td>Total Branches</td><td style="text-align: right;">'.$total_branches.'</td></tr>			
			<tr><td>Total Unreplicated</td><td style="text-align: right;">'.$total_unreplicated.'</td></tr>
		</table>';
	
$pdf->writeHTML($txt2, true, false, false, false, '');		

if(isset($_GET['auto_print']) && $_GET['auto_print']=="1"){
	$js = 'print(true);';
	$pdf->IncludeJS($js);	
}
$pdf->Output($region_area.'_ptn_monitoring_'.date('Y_m_d_h_i_A').'.pdf', 'I');
?>