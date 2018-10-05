<!DOCTYPE html>
<html>
<head>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cash Card</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
 <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(        
        'skin.min',
		'theme',
        'all',
        'bootstrap.min',
        'animate.min',
        'bootstrap-dropdownhover.min',        
		'jquery-ui-dataTable',
		'dataTables.jqueryui.min',		
        'uploadfile', 
		'datepicker3',
		'spectrumColorpicker',
		//'tabs',
		//'tabstyles',		
        'custom',        
        'util'
    ));	
        
    echo $this->Html->script(array(
        'jQuery-2.2.0.min'
    ));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('js');
	
	?>
</head>

<body class="hold-transition skin-green layout-top-nav fixed">
    <header class="main-header">
      <?php echo $this->element('navigation', array('user' => $this->Session->read('Auth.User'))); ?>
    </header>   
    <div class="content-wrapper col-md-10 col-lg-10 nopadding">
      <section class="content-menu m-t-73 m-l-27">    
        <?php echo $this->Session->flash(); ?>            
        <?php echo $this->element('page-menu'); ?>
      </section>
      <section class="content nopadding m-l-27">         
          <?php echo $this->fetch('content'); ?> 
      </section>
    </div>   
    <div class="clear"></div>
    <footer class="brb-footer">
        <?php echo $this->element('footer'); ?>
    </footer>
    

    
    <div class="modal" id="response_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
					<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
				<div class="modal-body text-center m-b-15">
					<p class="response_message text-success fs-12 m-b-20 m-t-10">You are about to save these details. Are all information correct?</p>
					<?php echo $this->Html->link('Yes', '#', array('form-id' =>'', 'class' => 'btn btn-success btn-sm', 'id' => 'yes_info_correct')); ?>
					<?php echo $this->Html->link('Cancel', '#', array('data-dismiss' => 'modal', 'class' => 'btn btn-danger btn-sm', 'id' => 'no_info_correct')); ?>
				</div>
			</div>
		</div> 
    </div>
	
	<div class="modal" id="home_default_modal" data-backdrop="static" keyboard="false">
			<div class="modal-dialog modal-max nopadding">
			  <div class="modal-content noradius nopadding">       			
				<div class="modal-body nopadding" id="home_default_content">
					
				</div>
			</div>
		  </div> 
	</div>
		
   
	<div class="modal" id="load_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-body text-center">
				   <input type="text" class="form-control input-lg" />			   
				</div>
			</div>
		</div> 
   </div>
   
   <div class="modal" id="_message_modal_default" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-sm m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
						<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
				<div class="modal-body text-center m-b-15">
					<p class="text-success fs-12 m-b-20 m-t-10 message_modal_text"></p>
					<?php echo $this->Html->link('Ok', '#', array('data-dismiss' => 'modal', 'class' => 'btn btn-success btn-sm')); ?>
				</div>
			</div>
		</div> 
   </div>
   
   
	<div class="modal fade" id="login_idle" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-sm m-t-180">
		  <div class="modal-content">       
			<div class="modal-header">
					<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
			<div class="modal-body text-center m-b-15">
				<p class="text-success fs-12 m-b-20 m-t-10">Your session has been idle over it's time limit. Please login again</p>
				<?php echo $this->Html->link('Ok', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-success btn-sm')); ?>
			</div>
		</div>
	  </div> 
	</div>
	
	
	<div class="modal" id="_loading_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-xs m-t-180">        
            <div class="text-center text-success fs-12 _loading_spin">
				<i class="fa fa-sync fa-spin fa-lg fa-fw"></i> Processing Request. Please wait...				
            </div>
        </div>
    </div> 
   </div>
   
   <div class="modal" id="_pdf_content_modal" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-lg">
		  <div class="modal-content">       
			<div class="modal-header">
					<i class='fa fa-bell fa-lg fa-fw'></i> System Notification
				</div>
			<div class="modal-body text-center m-b-15 _pdf_content_body">
				
			</div>
		</div>
	  </div> 
   </div>
   
   
   <div class="modal" id="_error_modal" data-backdrop="static" keyboard="false">
        <div class="modal-dialog modal-xs m-t-180">        
            <div class="text-center text-danger fs-12 _error_spin">
				<i class="fa fa-exclamation-triangle fa-lg fa-fw"></i> 
				<div class="bold">Unable to process the request</div>
				<div class="_mem text-warning"></div>
				<div class="m-t-10">
					<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Ok</button>
				</div>
            </div>
        </div>
    </div> 
	
	
	
   
    <div class="modal" id="_reports_date_modal" data-backdrop="static" keyboard="false">
         <div class="modal-dialog m-t-180">
			<div class="modal-content">       
				<div class="modal-header">
						<i class='fa fa-calendar fa-lg fa-fw'></i><span class="report_title bold fs-12"></span>
				</div>
				<div class="modal-body m-b-15">
					<div class="text-success fs-11"><?php echo $this->Lang->showMessage('label_search_date'); ?></div>
					<div class="input-group">
						<span class="input-group-addon noborder">
							<input type="checkbox" class="noborder _allreport" value="all" />All						 
						</span>
						<?php			   
						echo $this->App->showForminputs(array(		
							array('input' => 'date_from', 'label' => false, 'type' => 'text', 'default' => date('Y-m-d'), 'class' => 'bold date _date_from', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-6 nopadding'),
							array('input' => 'date_to', 'label' => false, 'type' => 'text', 'default' => date('Y-m-d'), 'class' => 'bold date _date_to', 'placeholder' => 'yyyy-mm-dd', 'wrapper' => 'col-md-6 nopadding', 'clear' => 1),
						), true);	
						?>
						
					</div>
					
					<div class="col-md-12 m-t-15 nopadding">
							<button type="button" class="btn btn-xs btn-danger pull-right" data-dismiss="modal"><i class="fas fa-times fa-lg"></i> Close</button>
							<button type="button" class="btn btn-xs btn-success m-r-5 gen_csv_report pull-right"><i class="fas fa-file-excel fa-lg"></i> Generate Report</button>							
						</div>
					<div class="clear"></div>
					<div class="_report_error text-danger fs-11"></div>
				</div>
			</div>
		</div> 
    </div> 
	
	
	<div class="modal" id="_search_client" data-backdrop="static" keyboard="false">
		<div class="modal-dialog modal-max nopadding">
		  <div class="modal-content noradius nopadding">       			
			<div class="modal-header">
						<i class='fa fa-info fa-lg fa-fw'></i>Search Client Information
						<button type="button" class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="fas fa-times fa-lg"></i> Close</button>
				</div>
				
			<div class="modal-body">
				<div class="col-md-12">
					<div class="search-content">	
							<div class="text-success fs-11">Type the Keyword</div>
							<?php			   
							echo $this->App->showForminputs(array(		
								//array('input' => 'keyword_cardno', 'label' => false, 'type' => 'text', 'id' => 'keyword_cardno', 'class' => 'client_keyword numbers_only', 'placeholder' => 'Card No.', 'wrapper' => 'col-md-4 nopadding'),							
								array('input' => 'keyword_name', 'label' => false, 'type' => 'text', 'id' => 'keyword_name', 'class' => 'client_keyword numbers_and_letters', 'placeholder' => 'Card Holder Name.', 'wrapper' => 'col-md-4 nopadding'),							
							), true);	
							?>
							<div class="col-md-2 nopadding-right">								
								<button 
									type="button" 
									class="btn btn-lg btn-success pull-left searchclient m-r-5"
									url ="<?php echo $this->webroot; ?>cardholders/searchByHolder"
								><i class="fas fa-search fa-lg"></i> Find</button>							
								
							</div>
						
						<div class="clear"></div>
						
					</div>
					
					
						<div class="related col-md-12 nopadding m-t-10">					
							<?php echo $this->App->tHead($this->Lang->index_header('cardholder_search'), 'search_content_'); ?>					
							<?php echo $this->App->tFFoot(); ?>
						</div>
						<div class="clear"></div>
				
				</div>
				<div class="clear"></div>
			</div>
		</div>
	  </div> 
	</div> 
	  
  

	
   <?php echo $this->Js->writeBuffer(); ?>
   
</body>
</html>


<?php
	echo $this->Html->script(array(
    'bootstrap.min',
    'inputmask/inputmask',
	'inputmask/jquery.inputmask',
    'inputmask/inputmask.extensions',   
    'inputmask/inputmask.date.extensions',
    'inputmask/inputmask.phone.extensions',    
	 'inputmask/inputmask.numeric.extensions',
    'bootstrap-datepicker',  
    'bootstrap-dropdownhover.min',  
    'jquery.dataTables.min',  
	'dataTables.jqueryui.min',
	//'jquery.canvasjs.min',
	'chartjs/Chart.bundle',
	'chartjs/utils',
	'jquery.idledetection.min',
    'cookies',  
	'printThis',
    'custom',
    'common-script'	
));	

echo $this->fetch('script');

?>

<script type="text/javascript">
	$(document).ready( function(){
		/*search client script*/
	
		$("#_search_client").on("shown.bs.modal", function(){
			$(".client_keyword").val("");
			var _data	  	= [];
			
			$("#keyword_name").focus();
			
			$("#search_content_").DataTable({
				data: _data,
				destroy: true,
				"bFilter": false
			});
			
			$(".searchclient").click( function(){				
				var _name 		= $("#keyword_name").val();				
				var _cardno 	= "default"; //$("#keyword_cardno").val();				
				var url 		= $(this).attr("url");
				
				if(_name.length < 1){
					_name 	= "default";			
				}
				
				if(_cardno.length < 1){
					_cardno = "default";			
				}
				
				url = `${url}/${_cardno}/${_name}`;
				
				
				$.ajax({
					method		: "GET",
					url			: url,
					cache		: false,				
					beforeSend	: function(){
						_loading_message("show");
					},
					success		: function(data){
						
							var _mdata = JSON.parse(data);
							if(_mdata.status==200){
								$.each(_mdata.data, function(i, item){
									_data.push(item);
								});
						
								$("#search_content_").DataTable({
									data: _data,
									destroy: true,	
									"bFilter": true,
									"scrollY": "230px",
									"scrollCollapse": false,
									"columnDefs": [{
										"targets": [3, 4, 5, 6, 7, 8],
										"orderable": false
									}],
									"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
									"bStateSave": false, 
									"pagingType": "full_numbers"
								});
																					
								$(".user-link-modal").click( function(){
									var _surl = $(this).attr("url");
									var _murl = $(this).attr("data-_murl");
									var _type = $(this).attr("data-_type");
									var td_id = $(this).attr("data-td-id");
									
									_loading_message("show");
									$.get(_surl, function(resp){
										$("#home_default_content").html(resp).promise().done( function(){
												$("#home_default_modal").modal("show");
												updateCardStatusLinks(td_id);												
												_loading_message("hide");	
																								
										});
									});
								});
							}else{
								_error_message("show", _mdata.message);
							}
							
							
						
					},
					error		: function(err1, err2, err3){
						_error_message("show", "Service is not yet available this time");
					
					},
					complete	: function(){
						_loading_message("hide");
						
					},
					
				});
				
			});
		});
		
		/*modal detail in tab view*/
		$("#view_card_detail_, #home_default_modal").on("shown.bs.modal", function(){
			$(this).appendTo("body");
		});
		
		/*$("#home_default_modal").on("hidden.bs.modal", function(){
			$("#_search_client").appendTo("body");
			
		});*/
		
		
		/*generate reports using the main menu links*/
		
		$("#_reports_date_modal").on("shown.bs.modal", function(e){
			var _title 	= $(e.relatedTarget).data('title');
			var _url	= $(e.relatedTarget).data("url");
			
			$(".report_title").html(_title);
			
			$("._allreport").click( function(){
				if($("._allreport").is(":checked")){
					$("._date_from, ._date_to").prop("disabled", true);
				}else{
					$("._date_from, ._date_to").prop("disabled", false);
				}
			});
			
			$(".gen_csv_report").click( function(e){
				
				e.preventDefault();
				var _allreport	= $("._allreport").val();				
				var _date_from 	= $("._date_from").val();
				var _date_to 	= $("._date_to").val();
				
				if($("._allreport").is(":checked")){
					window.location.href = _url;
				}else{	
					if(_date_to.length !==10 || _date_from.length !==10 || _date_to < _date_from){
						$("._report_error").html("Please select the valid dates.");
					}else{
						window.location.href = _url + '/' + _date_from + '/' + _date_to;	
					}		
				}
										
			});
						
		});
	});
</script>

