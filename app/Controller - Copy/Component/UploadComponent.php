<?php
	class UploadComponent extends Component{
		
		public function checkFolder($ldir=null){
			
			$fldir	= (!empty($ldir) ? $ldir : 'Uploads');
			$dir 	= APP.'webroot/img/'.$fldir;
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
			$dir 			= APP.'webroot/img/Uploads/'.date('Y').'/'.date('m').'/';
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