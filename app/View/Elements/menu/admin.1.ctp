<?php
echo '<div class="collapse navbar-collapse pull-left" id="navbar-collapse bold">';
	echo '<ul class="nav navbar-nav">';
		echo '<li>'.$this->Html->link('DASHBOARD', array('controller' => 'cards', 'action' => 'dashboard'), array('class' => 'bold')).'</li>';		
			echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Card Management<span class="caret"></span></a>';
				echo '<ul class="dropdown-menu" role="menu">';
					echo '<li>'.$this->Html->link('Enrolled Customer', array('controller' => 'cards', 'action' => 'enrolled', 1)).'</li>';
					echo '<li>'.$this->Html->link('Approved Customer Application', array('controller' => 'cards', 'action' => 'forapproval', 1)).'</li>';
				   
					echo '<li>'.$this->Html->link('Account Management', array('controller' => 'cards', 'action' => 'index', 2)).'</li>';
				echo '</ul>';
			echo '</li>';
			
			echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account Management<span class="caret"></span></a>';
				echo '<ul class="dropdown-menu" role="menu">';
					echo '<li>'.$this->Html->link('Create Account', array('controller' => 'cardholders', 'action' => 'add')).'</li>';
					echo '<li>'.$this->Html->link('Account Master List', array('controller' => 'cards', 'action' => 'forapproval', 1)).'</li>';				   					
				echo '</ul>';
			echo '</li>';

			echo '<li>'.$this->Html->link('Transaction Management', array('controller' => 'transactions', 'action' => 'index')).'</li>';		
		

		echo '<li class="dropdown">';
			echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>';
			echo '<ul class="dropdown-menu" role="menu">';
				if($user['group_id'] == 1){
					echo '<li>'.$this->Html->link('Transactions', array('controller' => 'transactions', 'action' => 'report')).'</li>';
				}
               if($user['group_id'] == 1 || $user['group_id'] == 3 || $user['group_id'] == 4){
					echo '<li>'.$this->Html->link('Individuals', array('controller' => 'cards', 'action' => 'report')).'</li>';
			   }
			echo '</ul>';
		echo '</li>';
		if($user['group_id'] == 1){
			echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account Settings<span class="caret"></span></a>';
				echo '<ul class="dropdown-menu" role="menu">';
					echo '<li>'.$this->Html->link('Create User', array('controller' => 'users', 'action' => 'add')).'</li>';
				   
					echo '<li>'.$this->Html->link('User Settings', array('controller' => 'users', 'action' => 'index')).'</li>';
				echo '</ul>';
			echo '</li>';
		}
	echo '</ul>';
	
	/*echo $this->Form->create('Card', array('url' => array('controller' => 'cards', 'action' => 'search'), 'class' => 'navbar-form navbar-left'));
			echo '<div class="input-group">';
				echo '<input type="text" name="data[Card][keyword]" class="form-control" placeholder="Search...">';
				echo '<span class="input-group-btn">';
					echo '<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>';
				echo '</span>';
			echo '</div>';
	echo $this->Form->end();*/
echo '</div>';


?>