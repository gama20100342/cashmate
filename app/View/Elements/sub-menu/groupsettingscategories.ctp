<?php 
	
	if(in_array($action, array("index", ""))){
		echo $this->App->Showbutton(
			'Register New Category', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'add', 
			'user-plus'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Access Role', 
			'btn-violet pull-left fs-10', 
			'groups', 
			'index', 
			'user-check'
		);			
		
	}
	
	if(in_array($action, array("add", "edit"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}
	
?>