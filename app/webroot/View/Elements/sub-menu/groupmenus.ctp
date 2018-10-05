<?php 
	
	if(in_array($action, array("index", ""))){
	//if($action!=="add"){
		echo $this->App->Showbutton(
			'Add New Menu', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'add', 
			'plus'
		);	
		/*echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Capabilities', 
			'btn-violet pull-left fs-10', 
			'groupsettings', 
			'index', 
			'user-check'
		);	
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Categories', 
			'btn-violet pull-left fs-10', 
			'groupsettingscategories', 
			'index', 
			'user-check'
		);	*/
		
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