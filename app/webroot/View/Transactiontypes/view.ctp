<?php echo $this->App->commonHeader($transactiontype['Transactiontype']['name'].' <i class="fa fa-angle-double-right"></i> All Transactions'); ?>
<div class="cardtypes form col-md-12">	
	<?php echo $this->element('transaction-tables/'.$table_template, array('model' => $model, 'trans' => $trans, 'template' => $table_template)); ?>	
</div>
<div class="clear"></div>

<?php
	echo $this->Js->Buffer('
		$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "220px",
					"scrollCollapse": false,
					"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
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