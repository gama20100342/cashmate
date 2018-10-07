<nav class="navbar navbar-static-top">
      <div class="container" style="width: 100%">
        <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <?php echo $this->element('menu', array('user' => $user)); ?>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">				
              <a href="#" class="dropdown-toggle user-image-menu" data-toggle="dropdown">                                                      
                  <div class="hidden-xs pull-right m-l-3 text-upper m-t-5"><?php echo $user['firstname']; ?></div>
                  <?php 
										
					if(!empty( $this->Session->read('User.avatar')) && file_exists(APP.'webroot/' .  $this->Session->read('User.avatar'))){
						$image = $this->webroot . $this->Session->read('User.avatar');
					}else{
						$image = $this->webroot.'img/avatar.png';						
					}

					echo $this->App->showUserPicture($image, '30', 'pull-right'); 
                  
				  ?>
				  <div class="clear"></div>
              </a>
			  
              <ul class="dropdown-menu nopadding">
                <li class="user-header text-left text-white">     				
					<div class="col-md-12 nopadding">
					<?php 
		
						echo $this->Html->link($this->App->showUserPicture($image, '80', ''), 
							array(
								'controller' => 'useravatars',  
								'action' => 'add', 
								 $user['refid'], $user['firstname'], $user['lastname']
							),
							array(
								'escape' => false,
								'class'	=> 'text-center',
							)
						);					
						?>	
					</div>
					<div class="col-md-12 nopadding">
						<h6 class="text-center">
							<div class="fs-18 bold"><?php echo $user['firstname'] . '<br />' . $user['lastname']; ?></div>
							<div class="fs-10 m-t-10">Last Login</div>
							<div class="fs-10"><?php echo date('M d Y h:i A', strtotime($user['last_login'])); ?></div>
						</h6>
					</div>
					<div class="clear"></div>
                </li>
                <li class="user-footer">
                  
                  <div class="text-center">
				           <?php echo $this->Html->link('My Profile', array('controller' => 'users', 'action' => 'viewmyprofile'), array('class' => 'btn btn-success btn-flat')); ?>
				           <?php echo $this->Html->link('Sign Out', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-danger btn-flat')); ?>
                  </div>
                </li>
              </ul>

            </li>
          </ul>
        </div>
      </div>
      	<div class="clear"></div>
    </nav>