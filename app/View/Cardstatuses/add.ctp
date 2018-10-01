<?php echo $this->App->CommonHeader('New Card Status');?>
<div class="cardstatuses form col-md-12">
<?php echo $this->Form->create('Cardstatus', array('class' => 'data-form', 'id' => 'new_cardstatus_form')); ?>
	<fieldset>
	<div class="col-md-6 nopadding-left">
	<?php
		echo $this->App->showForminputs(array(				
				array('input' => 'name', 'label' => 'Name', 'class' => 'letters_only'),
				array('input' => 'status_id', 'label' => 'Set Status', 'empty' => false, 'type' => 'select', 'options' => $statuses)
				));
							
	?>
		
	</div>
	<div class="col-md-6 nopadding-right input-wrap">
		<?php echo $this->Form->input('color', array('label' =>'Tag Card Color As', 'id' => 'showPaletteOnly', 'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '));  ?>
	</div>
	
	<div class="clear"></div>
	</fieldset>
	<?php echo $this->App->formEnd('Save', '#new_cardstatus_form'); ?>
</div>
<?php
	
	echo $this->Html->script('spectrumColorpicker', array('inline' => true)); 
	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("#showPaletteOnly").spectrum({
				showPaletteOnly: true,
				showPalette:true,
				color: "red",
				palette: [
					["black", "white", "blanchedalmond", "rgb(255, 128, 0);", "hsv 100 70 50"],
					["red", "yellow", "green", "blue", "violet"]
				]
			});
		});
	');
	
?>