<?php //echo $this->App->CommonHeader('Access Information'); ?>
<div class="cardholders view col-md-12">
		<div class="col-md-5 nopadding text-left m-t-10">
	
			<?php 

					if(empty($user['Useravatar']['user_id'])){
						echo $this->Html->link($this->html->image('avatar.png', array('class' => 'img-50')), 
							array(
								'controller' => 'useravatars',  
								'action' => 'add', 
								$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
							),
							array(
								'escape' => false,
								'class'	=> 'text-center',
							)
						);
						
						
					}else{
						echo $this->Html->link($this->html->image($user['Useravatar']['image_file'], array('class' => 'img-50')), 
							array(
								'controller' => 'useravatars',  
								'action' => 'add', 
								$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
							),
							array(
								'escape' => false,
								'class'	=> 'text-center',
							)
						);					
					}
				
				?>
			
			<div class="clear"></div>
			
		<h3 class="bold text-left nopadding nomargin">
			<?php echo $user['User']['name']; ?> 
			<div class="fs-10"><?php echo $user['Status']['name']; ?> | Last Login : <?php echo !empty($user['User']['last_login']) ? date('Y M d h:i A', strtotime($user['User']['last_login'])) : ' - None - '; ?> | Expires On : <?php echo !empty($user['User']['pass_expire']) ? date('Y M d h:i A', strtotime($user['User']['pass_expire'])) : ' - None - '; ?></div>
		</h3>
	</div>
	<div class="col-md-7 nopadding text-left m-t-10 ">
		<div class="btn-group pull-right">
			<?php echo $this->App->showUserStatusAction($user['User']['status_id'], $user['User']['refid'], $user['User']['id']); ?>
				<?php 
				echo $this->App->Showbutton(
					'Update', 
					'btn-success fs-10 changestat m-l-3', 
					"users", 
					'edit/'.$user['User']['id'],
					'edit'
				);		
				
				echo $this->App->Showbutton(
					'Reset Password', 
					'btn-success fs-10 changestat m-l-3', 
					"users", 
					'reset_password/'.$user['User']['id'],
					'sync'
				);	
				
			?>
			
			<a href="#" data-dismiss="modal" class="m-l-3 btn btn-xs btn-success fs-10"><i class="fas fa-chalkboard-teacher fa-lg"></i> Audit Trail Report</a>			
			<a href="#" data-dismiss="modal" class="m-l-3 btn btn-xs btn-success fs-10"><i class="fas fa-folder fa-lg"></i> Generate Log Folder</a>			
			<a href="#" data-dismiss="modal" class="m-l-3 btn btn-xs btn-danger fs-10"><i class="fas fa-times fa-lg"></i> Close</a>			
		
		</div>
	</div>
	<div class="clear"></div>	
	<div class="col-md-12 nopadding">
		<h6 class="bold text-violet"><?php echo __('Personal Information'); ?></h6>
		<table class="table table-condensed table-bordered fs-11">
			<thead>			
			<tr>
				<th>Title</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Lastname</th>
				<th>Contact No.</th>
				<th>Tel. No.</th>
			</tr>
			</thead>
			<tbody>			
			<tr>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['title']; ?>
				</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['firstname']; ?>
				</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['middlename']; ?>
				</td>
	
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['lastname']; ?>
				</td>
	
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['contact_no']; ?>
				</td>
				<td class="bold text-success text-uppercase">
					<?php echo $user['User']['tel_no']; ?>
				</td>
			</tr>
			</tbody>
			</table>
			
	</div>
	<div class="col-md-12 nopadding">
			<h6 class="bold text-violet"><?php echo __('Access Information'); ?></h6>
				
				<table class="table table-condensed table-bordered fs-11">
				<thead>
				<tr>
					<th>Username</th>
					<th>Access Group</th>					
					<th>Email Address</th>									
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['username']; ?>
					</td>
			
					<td class="bold text-success  text-uppercase">
						<?php echo $user['Group']['name']; ?>
					</td>
				
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['email']; ?>
					</td>
					
					<td class="bold text-success  text-uppercase">
						<?php echo $user['Status']['name']; ?>
					</td>
				</tr>
				</tbody>
				</table>
			
			<div class="clear"></div>
		
	</div>
	<div class="clear"></div>
	
	
<div class="groups index">	
	<h6 class="bold text-violet"><?php echo __('Allowed Access'); ?></h6>
	<div class="col-md-12 nopadding">		
		<?php echo $this->App->tHead(array('Group of User', 'Controller', 'Action'), 'view_user_'); ?>
		<?php foreach ($groupaccesses as $key => $group): ?>
			<tr>				
				<td><?php echo $group['Group']['name']; ?></td>
				<td><?php echo h($group['Groupaccess']['controller']); ?>&nbsp;</td>
				<td><?php echo count(explode(",",  $group['Groupaccess']['action'])) > 0 ? str_replace(",", "<br />", $group['Groupaccess']['action']) : $group['Groupaccess']['action']; ?>&nbsp;</td>
				
			
			</tr>
		<?php endforeach; ?>
		<?php //echo $this->App->tFoot(); ?>	
		<?php echo $this->App->tFFoot(array('Group of User', 'Controller', 'Action')); ?>
	</div>
	<div class="clear"></div>
</div>
</div>
<div class="clear"></div>

