
<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Cards', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Receive Cards'				
			)	
		)
	);
?>

<div class="cardholders form col-md-12">
	<?php echo $this->Lang->maintenance(); ?>
</div>
