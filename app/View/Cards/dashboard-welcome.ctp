<div class="cards index col-md-12 m-t-10">
	<?php $user = $this->Session->read('Auth.User'); ?>
	<h4 class="nopadding nomargin nodisplay"> Hello! <div class="text-success"> <?php echo $user['firstname'].' '.$user['lastname']; ?> </div> </h4>
	<h4 class="nopadding nomargin"> Welcome to <div class="text-success"> BRB Carsh Card Portal </div> </h4>
	<hr>	
	<div class="col-lg-3 col-md-3 nopadding">
		<div class="small-box bg-red noradius">
			<div class="inner">
				<div class="fs-60 bold"><?php echo $count_pending; ?></div>
				<div class="fs-14 bold">Available Pre-generated Cards</div>
				<div class="fs-8">As of June 19, 2018</div>
			</div>
			<div class="icon">
				<i class="fa fa-credit-card"></i>
			</div>
			<?php 
				echo $this->Html->link('Show Details <i class="fa fa-arrow-circle-right"></i>', 
					array('controller' => 'cardholders', 'action' => 'index', 3), 
					array('class' => 'small-box-footer', 'escape' => false)
				); 
			?> 	
		</div>
	</div>
	<div class="col-lg-3 col-md-3 nopadding">
		<div class="small-box bg-green noradius">
			<div class="inner">
				<div class="fs-60 bold"><?php echo $count_pending; ?></div>
				<div class="fs-14 bold">Accounts with no Cards</div>
				<div class="fs-8">As of June 19, 2018</div>
			</div>
			<div class="icon">
				<i class="fa fa-credit-card"></i>
			</div>
			<?php 
				echo $this->Html->link('Show Details <i class="fa fa-arrow-circle-right"></i>', 
					array('controller' => 'cardholders', 'action' => 'index', 3), 
					array('class' => 'small-box-footer', 'escape' => false)
				); 
			?> 	
		</div>
	</div>
	<div class="clear"></div>
</div>