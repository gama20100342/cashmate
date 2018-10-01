<?php

echo '<div class="collapse navbar-collapse pull-left" id="navbar-collapse">';
	echo '<ul class="nav navbar-nav">';
		echo '<li>'.$this->Html->link('Dashboard', array('controller' => 'applicants', 'action' => 'dashboard')).'</li>';
		echo '<li>'.$this->Html->link('Loads', array('controller' => 'applicants', 'action' => 'index')).'</li>';
		echo '<li class="dropdown">';
		
		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				echo '<li> 	'.$this->Html->link('Agent Reports', array('controller' => 'applicants', 'action' => 'agentreport')).'</li>';
				
			echo '</ul>';
		echo '</li>';
	echo '</ul>';
echo '</div>';


?>