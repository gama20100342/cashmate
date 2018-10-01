<?php

	header("Cache-Control: ");// leave blank to avoid IE errors
	header("Pragma: ");// leave blank to avoid IE errors
	header("Content-type: application/octet-stream");
	header("content-disposition: attachment;filename=FILENAME.doc"); 

	$time_generated = date('Y_m_d_h_i_s_a');
	$tgen_year		= date('Y');
	$tgen_month  	= date('m');
	$tgen 			= array();
	$tgen["details"] = array(
		'time' 	=> $time_generated,
		'year' 	=> $tgen_year,  
		'month' => $tgen_month 
	);
	$image_file1 	= dirname(__FILE__).'/logos/logo-small.jpg';
	
		$report_title 	= 'REPLICATION PTN MONITORING REPORT';
		$region_area  	= 'REGION - AREA ';
		$report_date  	= 'As of '.date('F d, Y');
	
	$header_text 	= array(
						'<th style="width: 5%;">No.</th>', 
						'<th style="width: 10%;">BC Code</th>', 
						'<th style="width: 20%;">BC Name</th>', 
						'<th style="width: 25%;">BC Region / Area</th>', 
						'<th style="width: 15%;">Unreplicated</th>', 
						'<th style="width: 15%;">SysModified</th>', 
						'<th style="width: 10%;">Version</th>'
					);
						
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<meta name=ProgId content=Word.Document>
<meta name=Generator content="Microsoft Word 9">
<meta name=Originator content="Microsoft Word 9">
<title>PTN Monitoring Doc Report</title>
<style>
body, html{font: 12px arial, sans-serif, heveltica !important;}
@page section {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:1in 1in 1in 1in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
div.section {page:section;}
</style>
</head>
<body>
<div class=section>
<?php
	
	
		$top_header = '<table cellpadding="10" cellspacing="0" border="1">
							<tr>
								<td rowspan="2" style="width: 30%;"> 
									<img src="'.$image_file1.'" style="width: 300px;"/></td>														
								<td colspan="4" style="text-align: center; width: 70%;">'.$report_title.' - '.$region_area.'</td>
							</tr>
							<tr>
								<td style="width: 6%;">Date</td>
								<td style="width: 40%;">'.date('l F d, Y').'</td>
								<td style="width: 6%;">Time</td>
								<td>'.date('h:i A').'</td>
							</tr>
						</table>';
		echo $top_header;
		
		
		$txt = '<table cellpadding="10" border="1" cellspacing="0" style="text-align: center!important; border: 1px solid #ccc;">
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
		$txt .='<tbody></table>';

		echo $txt;

?>
</div>
</body>
</html>