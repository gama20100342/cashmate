<?php echo $this->App->CommonHeaderWithButton(
	'Manage System Access',
		$this->App->Showbutton(
			'Register New Access', 
			'btn-violet pull-left fs-10', 
			'users', 
			'add', 
			'user-plus'
		)
		/*.' '.	
		 $this->App->Showbutton(
			'Pending', 
			'btn-violet pull-left fs-10 noradius', 
			'users', 
			'index', 
			'user-alt-slash'
		).' '.			
		 $this->App->Showbutton(
			'Block', 
			'btn-violet pull-left fs-10 noradius', 
			'users', 
			'index', 
			'user-times'
		).' '.	
		 $this->App->Showbutton(
			'Active', 
			'btn-violet pull-left fs-10 noradius-left noradius-top', 
			'users', 
			'index', 
			'user-check'
		)	*/	
); ?>

<div class="col-md-12 nopadding">
	<ul class="nav nav-pills">		
		<li class="active"><a data-toggle="tab" href="#active_account" total="#total_active" title="Active Accounts"  table-id="#active_account_" controller="cardholders" status = "2" class="btn btn-default btn-sm"><i class="fas fa-user-check fa-lg"></i> Active</a></li>	  		
		<li><a data-toggle="tab" href="#pending_account" 	total="#total_pending" title="Pending / For Approval Accounts"  table-id="#pending_account_" controller="cardholders" status = "4" class="btn btn-default btn-sm"><i class="fas fa-user-alt-slash fa-lg"></i> Pending </a></li>		
		<li><a data-toggle="tab" href="#blocked_account" total="#total_blocked" title="Blocked Accounts"  table-id="#blocked_account_" controller="cardholders" status = "6" class="btn btn-default btn-sm"><i class="fas fa-eye-slash fa-lg"></i> Blocked </a></li>	 
	</ul>
	<div class="tab-content">
		   <div id="active_account" class="tab-pane fade in <?php echo isset($status) && $status=="2" ? 'active': ''; ?>">
			<?php echo $this->App->CommonHeader('Active Accounts <span class="badge" id="total_active">0</span>'); ?>
			<div class="btn-group">				
				<?php 
					//echo $this->App->exportButton('pdf', 'cardholders');
					echo $this->App->exportButton('csv', 'cardholders');
					//echo $this->App->exportButton('print', 'cardholders');
				?>
			</div>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), false, 'active_account_', false); ?>					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>
		  </div>
		   <div id="pending_account" class="tab-pane fade in <?php echo isset($status) && $status=="4" ? 'active': ''; ?>">
			<?php echo $this->App->CommonHeader('Pending Applications <span class="badge" id="total_pending">0</span>'); ?>
			<div class="btn-group">				
				<?php 
					//echo $this->App->exportButton('pdf', 'cardholders');
					echo $this->App->exportButton('csv', 'cardholders');
					//echo $this->App->exportButton('print', 'cardholders');
				?>
			</div>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), false, 'pending_account_', false); ?>					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>
		  </div>
		 
		   <div id="blocked_account" class="tab-pane fade in <?php echo isset($status) && $status=="6" ? 'active': ''; ?>">
			<?php echo $this->App->CommonHeader('Blocked Accounts <span class="badge" id="total_blocked">0</span>'); ?>
			<div class="btn-group">				
				<?php 
					//echo $this->App->exportButton('pdf', 'cardholders');
					echo $this->App->exportButton('csv', 'cardholders');
					//echo $this->App->exportButton('print', 'cardholders');
				?>
			</div>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('cardholder'), false, 'blocked_account_', false); ?>					
					<?php echo $this->App->tFoot(); ?>
				</div>
				<div class="clear"></div>
		  </div>
		
	</div>
</div>
</div>
<div class="clear"></div>

<div class="users index col-md-12">
	<?php echo $this->App->tHead(array('Name', 'Username', 'Access Role', 'Last Login', 'Status', 'Terminal', '')); ?>
	<?php foreach ($users as $user): ?>
	<tr>

		<td><?php echo h($user['User']['name']); ?></td>		

		<!--td>

			<?php 
/*
				if(empty($user['Useravatar']['user_id'])){
					echo $this->Html->link($this->html->image('avatar.png', array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);
					
					//echo $this->App->btnLink('Edit', 'edit', 'useravatars', 'add/'.$user['User']['refid'].'/'.$user['User']['firstname'].'/'.$user['User']['lastname']);
				}else{
					echo $this->Html->link($this->html->image($user['Useravatar']['image_file'], array('class' => 'img-30 img-responsive')), 
						array(
							'controller' => 'useravatars',  
							'action' => 'add', 
							$user['User']['refid'], $user['User']['firstname'], $user['User']['lastname']
						),
						array(
							'escape' => false
						)
					);
					//echo $this->App->btnLink('Edit', 'edit', 'useravatars', 'edit_avatar/'.$user['User']['refid'].'/'.$user['User']['id']);
				}
			*/
			?>

		</td-->		
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['Group']['name']); ?>&nbsp;</td>		
		<td><?php echo date('d M Y h:i A', strtotime($user['User']['last_login'])); ?>&nbsp;</td>
		<td><?php echo h($user['Status']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['Terminal']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->App->btnLink('Edit', 'edit', 'users', 'edit', $user['User']['id']); ?>				
			<?php echo $this->App->btnLink('View', 'view', 'users', 'view', $user['User']['id']); ?>				
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"lengthMenu": [[4, 10, 25, 50, 100, -1], [4, 10, 25, 50, 100, "All"]],
					"bStateSave": false, 
					"pagingType": "full_numbers",
					"fnPreDrawCallback": function(){					
						var info =  $(this).DataTable().page.info();
						$("#table_page_Info_search").html(
							"Page " +(info.page+1)+ " of " +info.pages+" Pages"
						);
						return true;
					}
				});
	');
?>
