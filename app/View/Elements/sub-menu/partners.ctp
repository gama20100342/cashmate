<?php 
	
	if(in_array($action, array("index", ""))){
	//if($action!=="add"){
		echo $this->App->Showbutton(
			'Register New Partner', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'add', 
			'user-plus'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Pending', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'index', 
			'user-alt-slash'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Block', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'index', 
			'user-times'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Active', 
			'btn-violet pull-left fs-10', 
			$controller, 
			'index', 
			'user-check'
		);		
	}
	
	if(in_array($action, array("add", "edit", "view"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}
	
?>