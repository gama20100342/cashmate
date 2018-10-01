<?php //echo $this->App->CommonHeader('Update Card Details', $breadcrumbs, $this->request['controller']); ?>
<?php //echo $this->App->registrationLink(3); ?>
<?php echo $this->App->CommonHeaderWithButton(
	'Update Card Details',
		$this->App->Showbutton(
			'Back', 
			'btn-violet pull-right fs-10', 
			'cards', 
			'index'
		)	
	);
?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Cards', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Manage Cards', 		
				'cards', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Update Card Details'				
			)			
		)
	);
?>



<div class="cardholders form col-md-12">
<?php echo $this->Form->create('Card', array('class' => 'data-form', 'id' => 'new_card_form')); ?>	
	<fieldset>		
		<?php echo $this->Form->input('id'); ?>
		<div class="col-md-12">		
			<div class="col-md-12 bg-gray p-t-5 p-b-5 p-l-5 p-r-5">
				<h5 class="bold bold nomargin"><?php echo __('Card Holder'); ?></h5>
				<h4 class="nomargin bold">
					<?php echo $holder['Cardholder']['firstname'].' '.$holder['Cardholder']['middlename'].' '.$holder['Cardholder']['lastname']; ?>
					<div class="fs-10">Registration Date <?php echo date('Y M d', strtotime($holder['Cardholder']['registration'])); ?></div>
					<div class="fs-10">Processed By : <?php echo $holder['Cardholder']['processed_by']; ?> </div>
					<div class="fs-10">Approved By : <?php echo $holder['Cardholder']['approved_by']; ?></div>
				</h4>
			</div>
			<div class="clear"></div>
			<h5 class="bold bold m-t-20"><?php echo __('Card Information'); ?></h5>
			<?php		
				echo $this->App->showForminputs(array(
					array('input' => 'cardtype_id', 'label' => 'Card Type', 'type' => 'select', 'empty' => false, 'class' => '_cardtype noborder', 'options' => $cardtypes, 'wrapper' => 'col-md-3', 'read-only' => true),							
					array('input' => 'product_id', 'label' => 'Product Type', 'type' => 'select', 'empty' => false, 'class' => '_product_type', 'options' => $products, 'wrapper' => 'col-md-3'),							
				), true);		
				
				
			?>
			<?php		
				echo $this->App->showForminputs(array(					
					array('input' => 'pin_clone', 'type' => 'password', 'default' => '****', 'label' => 'Personal Identification No.( PIN )', 'class' => 'noborder', 'read-only' => true, 'wrapper' => 'col-md-3'),				
					
				), true);		
				
				
			?>
			<?php		
				/*echo $this->App->showForminputs(array(
					array('input' => 'cardstatus_id', 'label' => 'Card Status', 'type' => 'select', 'selected' => 1, 'empty' => true, 'options' => $cardstatuses, 'wrapper' => 'col-md-2')				
				));		*/
			?>
			
			
			<div class="clear"></div>
			<div class="col-md-4 nopadding m-t-20 m-b-5">
						<div class="text-success bold">CARD NO.</div>	
						<div class="text-danger fs-20 bold">
							<?php echo $this->request->data['Card']['cardno']; ?>
						</div>
						
						<div class="clear"></div>
			</div>
			
			
			<div class="clear"></div>
			<?php echo $this->App->formEnd('Save Changes', '#new_card_form'); ?>	
		</div>
		<div class="clear"></div>
		
	</fieldset>		
	
</div>
<div class="clear"></div>

<?php	
	echo $this->Js->Buffer('
		$(document).ready( function(){
			$("._cardtype").change( function(){
				$("._ptype").val($(this).val());
				$("._ptype").html($(this).val());
			});

			$(".tel_no").inputmask("999-999-9999");
			$(".contact_no").inputmask("999-999-9999");
			
			$(".purpose").click( function(){
				var purp = $("input:radio.purpose:checked").val();				
				if(purp=="Others"){				
					$("#others").removeClass("nodisplay");
				}else{
					$("#others").addClass("nodisplay");
				}
			});
			
			$(".middlename").focusout( function(){
				$(".card_name").val($(".firstname").val() + " " + $(".middlename").val() + " " + $(".lastname").val());				
			});
		});
	');
?>
