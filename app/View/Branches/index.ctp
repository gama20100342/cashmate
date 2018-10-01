<?php //echo $this->App->CommonHeader('DA5 Branches', $breadcrumbs, $this->request['controller']); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Manage Branches',
		$this->App->Showbutton(
			'Batch Upload Register', 
			'btn-violet pull-right fs-10', 
			'branches', 
			'upload_branches', 
			'upload'
		).
		$this->App->Showbutton(
			'Register', 
			'btn-violet pull-right fs-10', 
			'branches', 
			'add', 
			'plus'
		).
		$this->App->Showbutton(
			'Manage', 
			'btn-violet pull-right fs-10', 
			'branches', 
			'index', 
			'list'
		)
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Branches', 		
				'branches', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage'
			)	
		)
	);
?>

<div class="col-md-12">
	<ul class="nav nav-pills">
	  <li class="active"><a data-toggle="tab" href="#active_account" table-id="#active_branches_" controller="branches" status = "Active" class="btn btn-violet btn-sm noradius"><i class="fas fa-home fa-lg"></i> Active </a></li>	  
	  <!--li><a data-toggle="tab" href="#inactive_account" table-id="#inactive_account_" controller="cardholders" status = "4" class="btn btn-violet btn-sm noradius"><i class="fas fa-user-lock fa-lg"></i> Inactive </a></li-->	  
	 
	</ul>
	<div class="tab-content">
		 <div id="active_account" class="tab-pane fade in active">
			<?php /*echo $this->App->CommonHeader(
				'&nbsp;',
				$this->App->exportButton('csv', 'posdevices')
			); */ ?>
			
			<div class="btn-group nodisplay">
				<?php 
					/*echo $this->App->Showbutton(
						'Save as PDF', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'file-pdf'
					);
					echo $this->App->Showbutton(
						'Save as Excel', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'file-excel'
					);
					echo $this->App->Showbutton(
						'Print', 
						'btn-violet pull-left fs-9 noradius', 
						"cards", 
						'index/2', 
						'print'
					);
					*/
				?>
			</div>
			
			<div class="related col-md-12 nopadding">	
					<?php echo $this->App->tHead($this->Lang->index_header('branches'), 'active_branches_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('branches')); ?>
					
					
				</div>
				<div class="clear"></div>

		  </div>
		  
		</div>
</div>
<div class="clear"></div>
<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){				
			get_transaction_data_default("'.$this->webroot.'branches/indexAjax/Active", "#active_branches_", [7]);
		});
	');
?>
