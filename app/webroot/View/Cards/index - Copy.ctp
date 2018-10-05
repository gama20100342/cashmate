<?php echo $this->App->CommonHeader('Manage Cards'); ?>
<div class="col-md-12">
<?php
	echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'PDF', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/2', 
			'file-pdf'
		);
	echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Excel', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/2', 
			'file-excel'
		);
	echo '<span class="pull-left">&nbsp;</span>';
		echo $this->App->Showbutton(
			'Print', 
			'btn-violet pull-left fs-10', 
			"cards", 
			'index/2', 
			'print'
		);
?>
</div>
<div class="clear"></div>
<div class="cards index col-md-12">
	<?php echo $this->App->tHead(array('Card No', 'Registered', 'Activation Date', 'Last Transaction', 'Balance', 'Status', 'Action')); ?>	
	<?php foreach ($cards as $card): ?>
	<tr>		
		<td><?php echo h($card['Card']['cardno']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<td><?php echo h($card['Card']['last_transaction']); ?>&nbsp;</td>
		<!--td><?php //echo $card['Currency']['code'].' '.h($card['Card']['balance']); ?>&nbsp;</td-->
		<td class="text-right"><?php echo number_format($card['Card']['balance'], 2, ".", ","); ?>&nbsp;</td>
		<td class="bold" ><?php echo $card['Cardstatus']['name']; ?></td>	
		<td class="actions">
			<?php //echo $this->App->btnLink('Edit', 'edit', 'cards', 'edit', $card['Card']['id']); ?>
			<?php echo $this->App->btnLink('View', 'view', 'cards', 'view', $card['Card']['id'], $card['Card']['cardno']); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $card['Card']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $card['Card']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $card['Card']['id']), array(), __('Are you sure you want to delete # %s?', $card['Card']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	<?php echo $this->App->tFoot(); ?>
</div>
<div class="clear"></div>

<div class="modal" id="search_client_modal" keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
			</div>
			<div class="modal-body">
					<div class="col-md-12 nopadding">
					<h5 class="bold"><?php echo __('Search Client'); ?></h5>
					<div id="response_msg"></div>					
					<div class="change_form">
						<?php echo $this->Form->create('User', array('class' => 'form-data', 'id' => 'search_client')); ?>
						<fieldset>						
						<?php						
								echo $this->App->showForminputs(array(																	
										array('input' => 'client_keyword', 'type' => 'text', 'label' => 'Name or Keyword * ', 'class' => 'letters_and_numbers', 'wrapper' => 'col-md-12', 'clear' => 1)										
									), true);	
									
								
						?>					
						</fieldset>
						<div class="clear m-t-30"></div>					
							<button type="button" class="btn btn-danger pull-right m-r-10 m-b-20" data-dismiss="modal">Cancel</button>					
							<button type="button" class="btn btn-success btnsearchclient pull-right m-r-10 m-b-20">Search</button>					
						</div>
					</div>
					<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<?php
	echo $this->Js->Buffer('
				$("#tableid").DataTable({
					destroy: true,					
					"scrollY": "200px",
					"scrollCollapse": false,
					"columnDefs": [{
						"targets": [5, 6],
						"orderable": false
					}],
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
				
				function checkFormEmpty(formid){
					var empty = 0;
					$(formid).find("input").each( function(i, item){
						if($(item).val().length == 0){
							$("#" + $(this).attr("id")).addClass("danger-input");
							$("#response_msg").addClass("text-danger");                       
							$("#response_msg").html("Some info were missing, please try again.");	                          
							empty = 1;
						}else{
							$("#response_msg").removeClass("text-danger");                       
							$("#response_msg").html("");	  
							$("#" + $(this).attr("id")).removeClass("danger-input");
						}
					});

					return empty;
				}
				
				function showMessage(msg, status){
					if(status==401){
						$("#response_msg").addClass("text-danger");
						$("#response_msg").removeClass("text-success");
					}else{
						$("#response_msg").addClass("text-success");
						$("#response_msg").removeClass("text-danger");
					}
					
					$("#response_msg").html(msg);
				}
				
				//empty all fields
				function emptyAllFields(formid){        
					$(formid).find("input").each( function(i, item){
						$(item).val("");
					});
				}
			
				$(document).ready( function(){
					$(".newcard-link").click( function(e){
						e.preventDefault();
						$("#search_client_modal").modal("show").appendTo("body");
					});
					
					$("#search_client_modal").on("shown.bs.modal", function(){
						$(".btnsearchclient").click( function(e){
							e.preventDefault();
							if(checkFormEmpty("#search_client")===0){
							$.ajax({
								method: "POST",
								url: "'.$this->webroot.'/users/changemypassword/'.$this->Session->read('Auth.User.refif').'"/"'.$this->Session->read('Auth.User.id').'",
								data: $("#search_client").serialize(),
								beforeSend: function(){
									$("#response_msg").html("Processing, please wait...");
								},
								success: function(res){
									var _res = JSON.parse(res);
									
									if(_res.status==200){
										$.get("'.$this->webroot.'/users/idle_warning", function(data, status){
											if(status=="success"){
												showMessage(_res.message, _res.status);
												$("#ok-c").removeClass("nodisplay");
												$("#ok-c").show();
												$(".change_form").hide();
											}
										});	
									}else{
										
										showMessage(_res.message, _res.status);	
									}
								},
								error: function(xhr, exception){						
									$("#response_msg").html(xhr.status + " " + exception);
								},
								complete: function(){
								}
							});
						  }
						});
					});
					
				});
	');
?>