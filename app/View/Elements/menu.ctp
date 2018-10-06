<?php 
	/*
		1 Super Administrator
		22 Agent Branch - Branches 	
		21 Agent Branch - Central Unit 	
		18 BRB Branch - Officer 	
		17 BRB Branch - Staff 	
		20 Card Management Department Officer 
		19 Card Production Department Officer 	
		15 Customer Care Officer 	
		16 Customer Care Staff 	
		1 Super Administrator 	
		13 System and Data Administrator Officer 
		14 Technical and Technical Compliance Officer
		
		*/

	switch($user['group_id']){	
			
			case 1:
			case 13:
			case 14:
				echo $this->element('menu/admin', array('user' => $user));
			break;
			case 15:
			case 16:
			case 17:
			case 18:
			case 19:
			case 20:
			case 21:
				echo $this->element('menu/agent-branch-central-unit', array('user' => $user));
			break;
			case 22:
				echo $this->element('menu/agent-branch-branches', array('user' => $user));
			break;
	}

