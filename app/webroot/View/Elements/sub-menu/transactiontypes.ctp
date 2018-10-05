<?php 
		
	$_url[]= explode("/", $this->request->url);
	$controller = $_url[0][0];
	$action 	= isset($_url[0][1]) && !empty($_url[0][1]) ? $_url[0][1] : '';
	$param1 	= isset($_url[0][2]) && !empty($_url[0][2]) ? $_url[0][2] : '';
	$param2 	= isset($_url[0][3]) && !empty($_url[0][3]) ? $_url[0][3] : '';
	$param3 	= isset($_url[0][4]) && !empty($_url[0][4]) ? $_url[0][4] : '';
	
	//$card_id = trim(str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	//$cardno  = str_replace($card_id, "", str_replace($this->params['controller'], "", str_replace("/", "", str_replace($action, "", $this->request->url))));
	
	/*if(in_array($action, array("view"))){
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
	}
	
	*/
	
	if(in_array($action, array("index", ""))){		
			echo $this->App->Showbutton(
				'Add New Type of Transaction', 
				'btn-violet pull-left fs-10', 
				"transactiontypes", 
				'add', 
				'pen-alt'
			);	
			
		
	}
	
	
	if(in_array($action, array("view"))){		
			echo $this->App->Showbutton(
				'Filter By Date', 
				'btn-violet pull-left fs-10', 
				"transactiontypes", 
				'edit', 
				'calendar'				
			);	
			echo '<span class="pull-left">&nbsp;</span>';
			echo $this->App->Showbutton(
				'POS', 
				'btn-violet pull-left fs-10', 
				"transactiontypes", 
				'add', 
				'clipboard-list'
			);	
			echo '<span class="pull-left">&nbsp;</span>';
			echo $this->App->Showbutton(
				'ATM', 
				'btn-violet pull-left fs-10', 
				"transactiontypes", 
				'add', 
				'box'
			);	
		
	}
	
	/*
	if(in_array($action, array("loadCard"))){
		 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'view/'.$param1.'/'.$param2		
		);
	}*/
	
	
	if(in_array($action, array("add", "edit", "view"))){
	 echo $this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			$controller, 
			'index'
		);
	}
	
	
?>