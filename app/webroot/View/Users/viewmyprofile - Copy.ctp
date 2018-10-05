<?php //echo $this->App->CommonHeader('Access Information'); ?>
<div class="cardholders view col-md-12">
		<div class="col-md-12 nopadding text-center m-t-10">
	
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
		</div>		
		<div class="clear"></div>
		
	<h3 class="bold text-center nopadding nomargin">
		<?php echo $user['User']['name']; ?> 
		<div class="fs-10"><?php echo $user['Status']['name']; ?> | Last Login : <?php echo !empty($user['User']['last_login']) ? date('Y M d h:i A', strtotime($user['User']['last_login'])) : ' - None - '; ?> | Expires On : <?php echo !empty($user['User']['pass_expire']) ? date('Y M d h:i A', strtotime($user['User']['pass_expire'])) : ' - None - '; ?></div>
	</h3>
	<div class="clear"></div>
	<div class="text-center m-t-3">
			<?php //echo $this->App->showUserStatusAction($user['User']['status_id'], $user['User']['refid'], $user['User']['id']); ?>
				<?php 
				echo $this->App->Showbutton(
					'Change Password', 
					'btn-success fs-10 changestat m-l-3', 
					"users", 
					'changemypassword',
					'edit'
				);		
			?>
			<!--a href="#" data-dismiss="modal" class="m-l-3 btn btn-xs btn-danger fs-10"><i class="fas fa-times fa-lg"></i> Close</a-->
		
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
					<th>Added</th>									
					<th>Added By</th>
					<th>Modified</th>									
					<th>Added By</th>
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
						<?php echo !empty($user['User']['added']) ? date('Y M d h:i A', strtotime($user['User']['added'])) : ' - None - '; ?>
					</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['added_by']; ?>
					</td>
					
					<td class="bold text-success  text-uppercase">
						<?php echo !empty($user['User']['modified']) ? date('Y M d h:i A', strtotime($user['User']['modified'])) : ' - None - '; ?>
					</td>
					<td class="bold text-success  text-uppercase">
						<?php echo $user['User']['modified_by']; ?>
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

<?php 
echo $this->Js->Buffer('	
	$("#view_user_").DataTable({
		destroy: true,		
		"scrollY": "100px",
		"scrollCollapse": false,
		"lengthMenu": [[4, 10, 25, 50, 100, -1], [4, 10, 25, 50, 100, "All"]],
		"columnDefs": [{
			"targets": [2],
			"orderable": false
		}],
		"bStateSave": false, 
		"pagingType": "full_numbers",		
	});
');
?>

