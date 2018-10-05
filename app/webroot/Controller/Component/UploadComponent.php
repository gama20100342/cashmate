<?php
	class UploadComponent extends Component{
		
		public function logDir($username, $type){
			$dir 	= "C:/cashmate_logs";
			switch($type){
				case "audit": 
					$log_folder = "auditlogs"; 
				break;
				case "access":				
					$log_folder = "access"; 
				break;
			}
			
			return $dir.'/'.date('Y').'/'.date('m').'/'.$username.'/'.$log_folder;			
		}
		
		public function checkLogFolder($year, $month, $username, $type){
			$dir 	= "C:/cashmate_logs";
			
			switch($type){
				case "audit": 
					$log_folder = "auditlogs"; 
				break;
				case "access":				
					$log_folder = "access"; 
				break;
			}
			
			if(is_dir($dir.'/'.$year) && is_writeable($dir.'/'.$year)){	
				if(is_dir($dir.'/'.$year.'/'.$month) && is_writeable($dir.'/'.$year.'/'.$month)){
					if(is_dir($dir.'/'.$year.'/'.$month.'/'.$username) && is_writeable($dir.'/'.$year.'/'.$month.'/'.$username)){
						if(is_dir($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder) && is_writeable($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder)){
							return true;
						}else{
							if(mkdir($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder, 0777)){
								return true;
							}else{
								return false;
							}
						}
					}else{
						if(mkdir($dir.'/'.$year.'/'.$month.'/'.$username, 0777)){
							return true;
						}else{
							return false;
						}
					}
				}else{
					if(mkdir($dir.'/'.$year.'/'.$month, 0777)){
						return true;
					}else{
						return false;
					}
				}
			}else{
				if(mkdir($dir.'/'.$year, 0777)){
					if(is_dir($dir.'/'.$year.'/'.$month) && is_writeable($dir.'/'.$year.'/'.$month)){		
						if(is_dir($dir.'/'.$year.'/'.$month.'/'.$username) && is_writeable($dir.'/'.$year.'/'.$month.'/'.$username)){
							if(is_dir($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder) && is_writeable($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder)){
								return true;
							}else{
								if(mkdir($dir.'/'.$year.'/'.$month.'/'.$username.'/'.$log_folder, 0777)){
									return true;
								}else{
									return false;
								}
							}
						}else{
							if(mkdir($dir.'/'.$year.'/'.$month.'/'.$username, 0777)){
								return true;
							}else{
								return false;
							}
						}
					}else{
						if(mkdir($dir.'/'.$year.'/'.$month, 0777)){
							return true;
						}else{
							return false;
						}
					}
				}else{
					return false;
				}
			}
		}
		
		public function checkFolder($ldir=null){
			
			$fldir	= (!empty($ldir) ? $ldir : 'Uploads');
			$dir 	= APP.'webroot/'.$fldir;
			$year 	= date('Y');
			$month 	= date('m');
			
			
			if(is_dir($dir.'/'.$year) && is_writeable($dir.'/'.$year)){	
				if(is_dir($dir.'/'.$year.'/'.$month) && is_writeable($dir.'/'.$year.'/'.$month)){		
					return true;
				}else{
					if(mkdir($dir.'/'.$year.'/'.$month, 0777)){
						return true;
					}else{
						return false;
					}
				}
			}else{
				if(mkdir($dir.'/'.$year, 0777)){
					if(is_dir($dir.'/'.$year.'/'.$month) && is_writeable($dir.'/'.$year.'/'.$month)){		
						return true;
					}else{
						if(mkdir($dir.'/'.$year.'/'.$month, 0777)){
							return true;
						}else{
							return false;
						}
					}
				}else{
					return false;
				}
			}
		}
		
		
		public function RenamevideoandUpload($filename, $newfilename, $extension){
			$dir 			= APP.'webroot/img/Videos/'.date('Y').'/'.date('m').'/';
			$upload_dir  	= $dir . basename($filename['name']);	
			
			
			if($this->checkFolder('Videos')){
				if(move_uploaded_file($filename['tmp_name'], $upload_dir)){
					$file_handler = fopen($upload_dir, 'r');	
					fclose($file_handler);
					if(!empty($newfilename)){
						if(rename($upload_dir, $dir.''.$newfilename.'.'.$extension)){			
							return true;
						}else{
							return false;
						}
					}else{
						return true;
					}				
				}else{
					return false;
				}
			}
		}
		
		public function RenameandUpload($filename, $newfilename, $extension){
			$dir 			= APP.'webroot/Uploads/'.date('Y').'/'.date('m').'/';
			$upload_dir  	= $dir . basename($filename['name']);	
			
			
			if($this->checkFolder()){
				if(move_uploaded_file($filename['tmp_name'], $upload_dir)){
					$file_handler = fopen($upload_dir, 'r');	
					fclose($file_handler);
					if(!empty($newfilename)){
						if(rename($upload_dir, $dir.''.$newfilename.'.'.$extension)){			
							return true;
						}else{
							return false;
						}
					}else{
						return true;
					}				
				}else{
					return false;
				}
			}
		}
		
		public function uploadCSV($filename, $newfilename, $extension){
			$dir 			= APP.'webroot/files/';
			$upload_dir  	= $dir . basename($filename['name']);	
			
			
			if($this->checkFolder()){
				if(move_uploaded_file($filename['tmp_name'], $upload_dir)){
					$file_handler = fopen($upload_dir, 'r');	
					fclose($file_handler);
					if(!empty($newfilename)){
						if(rename($upload_dir, $dir.''.$newfilename.'.'.$extension)){			
							return true;
						}else{
							return false;
						}
					}else{
						return true;
					}				
				}else{
					return false;
				}
			}
		}
		
		public function uploadforDownloadfile($filename, $directory, $newfilename=null){
			$dir = $directory;						
			$upload_dir  = $dir . basename($filename['name']);												
			if(move_uploaded_file($filename['tmp_name'], $upload_dir)){
				$file_handler = fopen($upload_dir, 'r');	
				fclose($file_handler);
				if(!empty($newfilename)){
					if(rename($upload_dir, $dir.''.$newfilename)){			
						return true;
					}else{
						return false;
					}
				}else{
					return true;
				}				
			}else{
				return false;
			}			
		}
		
		
		public function gettotalvotes($candidate, $electiion, $position){
			$totalcvote = $this->requestAction(array('controller' => 'votations', 'action' => 'countCandidateVote', $candidate, $electiion, $position));
			return $totalcvote;	
		}
		
	}
?>