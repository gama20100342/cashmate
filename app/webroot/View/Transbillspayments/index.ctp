<?php echo $this->App->CommonHeaderWithButton(
	'Bills Payment Transactions'
); ?>

<?php echo $this->App->CommonBreadcrumbs(
	array(
			$this->App->ShowNormaLink(
				'Bills Payment', 		
				'transbillspayments', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Transactions', 		
				'transbillspayments', 
				'index'
			),
			$this->App->ShowNormaLink(
				'Search Transactions'
			)	
		)
	);
?>

<div class="cards view col-md-12">	
			<div class="col-md-6 nopadding">	
				<div class="text-success fs-11 nodisplay"><?php echo $this->Lang->showMessage('label_search_date'); ?></div>
				<div class="input-group">
				<?php			   
				echo $this->App->showForminputs(array(		
					array('input' => 'date_from', 'label' => false, 'type' => 'text', 'class' => 'date date_from', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-4 nopadding'),
					array('input' => 'date_to', 'label' => false, 'type' => 'text', 'class' => 'date date_to', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-4 nopadding'),
				), true);	
				?>
				<span class="input-group-button">
					<button type="button" class="btn btn-sm btn-success showtrans">Show Transaction</button>
				</span>
				</div>
			</div>
			<div class="col-md-6 nopadding">
				<div class="btn-group pull-right">
				<?php 
					echo $this->App->exportButton('csv', 'transbillspayments');
					echo $this->App->exportButton('print', 'transbillspayments');
						
					/*echo $this->App->ShowbuttonAjaxWithReport(
						'Save as PDF', 
						'btn-violet pull-left fs-9 noradius', 						
						'file-pdf',
						'_pdf_res',
						$this->webroot.'transbillspayments/generate_pdf_report'
					);
					
					echo $this->App->ShowbuttonAjaxWithReport(
						'Save as CSV', 
						'btn-violet pull-left fs-9 noradius', 						
						'file-excel',
						'_csv_res',
						$this->webroot.'transbillspayments/generate_csv_report'
					);
					
					echo $this->App->ShowbuttonAjaxWithReport(
						'Print', 
						'btn-violet pull-left fs-9 noradius', 						
						'print',
						'_print_res'
					);	*/				
				?>
				
			</div>
			</div>
			<div class="clear"></div>
			
			<div class="related col-md-12 nopadding trans_content m-t-20">	
					<?php echo $this->App->tHead($this->Lang->index_header('bills_payment'), 'trans_balinq_'); ?>					
					<?php echo $this->App->tFFoot($this->Lang->index_header('bills_payment')); ?>
				
				</div>
				<div class="clear"></div>

		  </div>
		  
</div>

<?php
	
	echo $this->Js->Buffer('
		$(document).ready( function(){				
			get_transaction_data_default("'.$this->webroot.'transbillspayments/getAllTransactions", "#trans_balinq_", [2, 6]);
			
			$(".showtrans").click( function(){
				var _date_from 	= $(".date_from").val();
				var _date_to 	= $(".date_to").val();
				
				if(_date_to.length !==10 || _date_from.length !==10 || _date_to <= _date_from){
					_error_message("show", "Please select the valid dates.");
				}else{
					get_transaction_data_default("'.$this->webroot.'transbillspayments/getAllTransactions/" + _date_from + "/" + _date_to, "#trans_balinq_", [2, 6]);
				}
			})
			
			_reports_action_buttons();		
		});
	');
	
	
?>

