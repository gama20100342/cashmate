<?php

echo '<div class="collapse navbar-collapse pull-left" id="navbar-collapse">';
	echo '<ul class="nav navbar-nav">';
		echo '<li>'.$this->Html->link('Dashboard', array('controller' => 'transactiontypes', 'action' => 'index')).'</li>';
		echo '<li>'.$this->Html->link('Loads', array('controller' => 'applicants', 'action' => 'index')).'</li>';
		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Accounts<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				echo '<li>'.$this->Html->link('List', array('controller' => 'applicants', 'action' => 'index')).'</li>';
				echo '<li>'.$this->Html->link('Upload Accounts', array('controller' => 'teammembers', 'action' => 'index')).'</li>';
			echo '</ul>';
		echo '</li>';
		
		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				echo '<li>'.$this->Html->link('New', array('controller' => 'users', 'action' => 'add')).'</li>';
               
				echo '<li>'.$this->Html->link('Browse', array('controller' => 'users', 'action' => 'index')).'</li>';
			echo '</ul>';
		echo '</li>';
		
		
		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Maintenance<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				echo '<li>'.$this->Html->link('Active Agent', array('controller' => 'teammembers', 'action' => 'index')).'</li>';
				echo '<li>'.$this->Html->link('Transfer Accounts', array('controller' => 'applicants', 'action' => 'transferaccounts')).'</li>';
			echo '</ul>';
		echo '</li>';
		
		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				echo '<li> 	'.$this->Html->link('Name List', array('controller' => 'applicants', 'action' => 'namelist')).'</li>';
				// echo '<li> 	'.$this->Html->link('Name List for Text Blast', array('controller' => 'applicants', 'action' => 'namelist')).'</li>';
				// echo '<li> 	'.$this->Html->link('MIS', array('controller' => 'applicants', 'action' => 'mis')).'</li>';
				// echo '<li> 	'.$this->Html->link('Today\'s Monitoring', array('controller' => 'applicants', 'action' => 'agentreport')).'</li>';
				echo '<li> 	'.$this->Html->link('Agent Reports', array('controller' => 'applicants', 'action' => 'agentreport')).'</li>';
			echo '</ul>';
		echo '</li>';
	echo '</ul>';
echo '</div>';


?>