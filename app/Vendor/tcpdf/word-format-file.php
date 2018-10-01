<?php

	header("Cache-Control: ");// leave blank to avoid IE errors
	header("Pragma: ");// leave blank to avoid IE errors
	header("Content-type: application/octet-stream");
	header("content-disposition: attachment;filename=".$region_area."_ptn_monitoring_".date('Y_m_d_h_i_A').".doc"); 
				
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
@page section {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:.5in 1in .5in 1in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
div.section {page:section;}
</style>
</head>
<body>
<div class=section>
<?php

		$top_header = '<table cellpadding="10" cellspacing="0" border="1">
							<tr>
								<td rowspan="2" style="width: 30%;"> 
									<img src="'.$logo_path.'logo-small.jpg" style="width: 300px;"/></td>														
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
					<th colspan="5" style="width: 60%">BUSINESS CENTER</th>
					<th colspan="3" style="width: 40%">REPLICATION STATUS</th>
				</tr>						
				<tr style="font-size: 12px !important;">';
					foreach($header_text as $h):
						$txt .= $h;
					endforeach;						
		$txt .='</tr></thead>';
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
		}
		$txt .='<tbody></table>';
		
		$txt .= '<table width="30%" cellpadding="3" cellspacing="0" border="1">
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
	
	
		echo $txt;

?>
</div>
</body>
</html>