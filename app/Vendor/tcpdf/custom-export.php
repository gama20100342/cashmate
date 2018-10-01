<?php
	
	/*-----------------------
	| THIS FILE IS INTENDED FOR GENERATING CUSTOMIZE WORD, PDF AND EXCEL REPORT
	| DO NOT CHANGE ANYTHING OR 
	| HEAVEN WILL FALL UPON YOU
	---------------------------*/
	
	require_once '../api/v1/dbConnect.php';
	
	$zone 				= isset($_GET['zone_key']) && !empty($_GET['zone_key']) ? $_GET['zone_key'] : '';
	$report_type 		= isset($_GET['report_type']) && !empty($_GET['report_type']) ? $_GET['report_type'] : '';
	
	if(empty($zone) || empty($report_type)){
		echo '<script>alert("All good things happens to those who wait");</script>';
		exit();
	}
	
	
	$sel_search			= isset($_GET['sel_search']) ? $_GET['sel_search'] : '';
	$results 			= array();
	$branchdb 			= "";	
	$dbs		 		= "";
	$db		 			= new dbConnect();
	$where				= '';
	$datas				= array();
	$logo_path			= "http://192.168.19.239/PTNMONITORING/1.0/plugins/logos/";
	$word_logo 			= dirname(__FILE__).'/logos/logo-small.jpg';
	$report_title 		= 'REPLICATION PTN MONITORING REPORT';
	$region_area  		= strtoupper(isset($zone) && !empty($zone) ? $zone : '-');
	$header_text 		= array('<th style="width: 5%;">No.</th>', '<th style="width: 10%;">BC Code</th>', '<th style="width: 15%;">BC Name</th>', 
							'<th style="width: 15%;">BC Region </th>','<th style="width: 15%;">BC Area </th>', '<th style="width: 15%;">Unreplicated</th>', '<th style="width: 15%;">SysModified</th>', 
							'<th style="width: 10%;">Version</th>'
						);
	$header_text_csv 	= array('No', 'BC Code', 'BC Name', 'Region', 'Area', 'Unreplicated', 'SysModified', 'Version');
	
					
	switch($zone){
		case "Showroom":  $dbs 		= 'REMSShowroom';	$branchdb 	= 'vw_bedryfshowroom'; break;
		case "Mindanao":  $dbs 		= 'REMSMindanao';   $branchdb 	= 'vw_bedryfmindanao'; break;
		case "Visayas":   $dbs 		= 'REMSVisayas';    $branchdb 	= 'vw_bedryfvisayas'; break;
		case "NCR": 	  $dbs 		= 'REMSLuzon';      $branchdb 	= 'vw_bedryfluzon';	 break;
		case "Luzon": 	  $dbs		= 'REMSLuzon';      $branchdb 	= 'vw_bedryfluzon'; break; default: break;
	}
	
	if(isset($sel_search) && !empty($sel_search)){
			$sel_region				= (isset($_GET['sel_region']) ? $_GET['sel_region'] : '');
			$sel_version			= (isset($_GET['sel_version']) ? $_GET['sel_version'] : '');
			$sel_modified			= (isset($_GET['sel_modified']) ? $_GET['sel_modified'] : '');
			$sel_keyword			= (isset($_GET['sel_keyword']) ? $_GET['sel_keyword'] : '');
			$installation_status	= (isset($_GET['installation_status']) ? $_GET['installation_status'] : '');
			
			
			
			
			if(isset($installation_status) && !empty($installation_status)){
				switch($installation_status){
					case "noauto";
						$where = " WHERE xml.Version IS NULL ";
					break;
					case "today":
						$where = " WHERE YEAR(xml.sysmodified) = '".date('Y')."' 
									AND MONTH(xml.sysmodified) = '".date('m')."'		
									AND DAY(xml.sysmodified) = '".date('d')."'";			
					break;
				}
			}else{
				if(isset($sel_keyword) && !empty($sel_keyword)){
				$where = " WHERE (rems.bedrnr LIKE '%".$sel_keyword."%' OR rems.bedrnm LIKE '%".$sel_keyword."%')";				
				}
				
				
				if(isset($sel_region) && !empty($sel_region)){
					$where = " WHERE rems.Class_03 = '".$sel_region."'";
				}
				
				if(isset($sel_modified) && !empty($sel_modified)){
										
					$where .= " AND YEAR(xml.sysmodified) = '".date('Y', strtotime($sel_modified))."' 
								AND MONTH(xml.sysmodified) = '".date('m', strtotime($sel_modified))."'		
								AND DAY(xml.sysmodified) = '".date('d', strtotime($sel_modified))."'";			
				}
				
				if(isset($sel_version) && !empty($sel_version)){
					if($sel_version=="noauto"){
						$where .=" AND xml.Version IS NULL";
					}else{
						$where .= " AND xml.Version = '".$sel_version."'";
					}
				}
				
			}
	}

				   
	$query 	= 	  "SELECT DISTINCT xml.CompanyCode, xml.noOfTransactions, xml.sysmodified, xml.Version, rems.bedrnm, rems.Class_03, rems.Class_04
				   FROM ".$dbs.".dbo.XMLTopicHistory as xml 
				   INNER JOIN REMS.dbo.".$branchdb." as rems ON xml.CompanyCode = rems.bedrnr  
				   ".$where." 
				   ORDER BY xml.noOfTransactions DESC";
	
			

	$results = odbc_exec($db->connect(), $query); 
	$i = 1;
	$version15 = 0;
	$version14 = 0;
	$version13 = 0;
	$version12 = 0;
	$version11 = 0;
	$version10 = 0;
	$noauto    = 0;
	$total_unreplicated = 0;
	$total_branches = 0;
	$new_installed = 0;
	
	if(!empty($results)){
		while(odbc_fetch_row($results)){
			
			$dversion 		= trim(odbc_result($results, 'Version'));
			$modified  		= date('Y M d', strtotime(odbc_result($results, 'sysmodified')));
			$myear   		= date('Y', strtotime(odbc_result($results, 'sysmodified')));
			$unreplicated 	= str_replace("-", "", odbc_result($results, 'noOfTransactions'));
			$branch		 	= strtoupper(trim(odbc_result($results, 'bedrnm')));
			$code			=  odbc_result($results, 'CompanyCode');
			$code			= ($report_type=="csv") ? "'".$code : $code;
			$region			=  trim(odbc_result($results, 'Class_03'));
			$area			=  trim(str_replace($region, "", trim(odbc_result($results, 'Class_04'))));
			$area			= ((strpos($area, 'AREA') !== false || strpos($area, 'Area') !== false) ? str_replace("-", "", $area) : $area);
			
			$datas[] = array(
				$i,
				$code,
				mb_convert_encoding($branch, "UTF-8"),
				$region,
				$area,
				$unreplicated,
				(($myear !=="1970") ? $modified : " - "),
				(!empty($dversion) ? $dversion : " - ")
			);
			
			$total_unreplicated += $unreplicated;
			
			if($modified==date('m/d/Y')){ $new_installed++; }
			if(empty($dversion) || $dversion =="0"){ $noauto++; }
			if($dversion=="Auto 1.5"){ $version15++; }			
			if($dversion=="Auto 1.4"){ $version14++; }			
			if($dversion=="Auto 1.3"){ $version13++; }			
			if($dversion=="Auto 1.2"){ $version12++;}			
			if($dversion=="Auto 1.1"){ $version11++;}			
			if($dversion=="Auto 1.0"){ $version10++; }
			if(!empty($branch)){ $total_branches++; }
			
			$i++;
		}
		
		
		switch($report_type){
			case "doc":
			include("word-format-file.php");
			break;
			case "csv":
			include("csv-format-file.php");
			break;
			case "pdf":
			include("pdf-format-file.php");
			break;
			default:
			break;
		}
		
	}
	
	//var_dump($datas);
	
	
	
?>