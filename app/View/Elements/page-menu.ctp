<?php
	
	//echo $this->params['controller'];
	echo $this->element('sub-menu/'.$this->params['controller'], array('controller' => $this->params['controller'], 'action' => $this->params['action'])); 
	echo '<div class="clear"></div>';
	
    /*switch($controller){
        case "cardholders":
            echo $this->App->Showbutton('Back', 'btn-violet pull-right fs-10', $controller, '');
        break;
        default:
            echo $this->App->Showbutton('Back', 'btn-violet pull-right fs-10', $controller, 'index');
        break;
    }*/	
	
	
?>
