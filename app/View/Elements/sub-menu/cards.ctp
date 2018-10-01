<?php 
	
	/*
	$_url[]= explode("/", $this->request->url);
	$controller = $_url[0][0];
	$action 	= $_url[0][1];
	$param1 	= isset($_url[0][2]) && !empty($_url[0][2]) ? $_url[0][2] : '';
	$param2 	= isset($_url[0][3]) && !empty($_url[0][3]) ? $_url[0][3] : '';
	$param3 	= isset($_url[0][4]) && !empty($_url[0][4]) ? $_url[0][4] : '';
	
	//$card_id = trim(str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	//$cardno  = str_replace($card_id, "", str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	
	if(in_array($action, array("view"))){
		echo $this->App->Showbutton(
			'Load Card', 
			'btn-violet pull-left fs-10 loadcard', 
			"cards", 
			'loadCard/'.$param1.'/'.$param2,
			'money-bill'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'De-activate', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'eye-slash'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Block', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'lock'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Activate', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'eye'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Search Transaction', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'user-tag'
		);
	}
	
	
	if(!in_array($action, array("add", "edit", "dashboard", "view", "loadCard", "generate_reports_by_category"))){
	//if($action!=="add"){
		/*echo $this->App->Showbutton(
			'Enroll New Card', 
			'btn-violet pull-left fs-10 newcard-link', 
			"cardholders", 
			'add', 
			'pen-alt'
		);*/	
		/*echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Suspended Cards', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/3', 
			'lock'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Active Cards', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/1', 
			'eye'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Inactive Cards', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/2', 
			'eye-slash'
		);
		echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Lost Cards', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/4', 
			'eye-slash'
		);*/
	//}
	
	/*
	if(in_array($action, array("loadCard"))){
		 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'view/'.$param1.'/'.$param2		
		);
	}
	
	if(in_array($action, array("generate_reports_by_category"))){
		 echo $this->App->Showbutton(
			'Filter Transaction', 
			'btn-violet pull-left fs-10', 
			"cardholders", 
			'add', 
			'user-tag'
		);
	}
	
	
	if(in_array($action, array("edit", "view"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}*/
	
	
?>