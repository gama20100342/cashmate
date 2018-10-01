	
	
	function _reports_action_buttons(){
						/*------------------
						| Print Result
						-------------------*/
						$("#_print_res").click( function(){							
							  $(".trans_content").printThis({
								  debug: false, 
								  importCSS: true,
								  copyTagClasses: true,
								  printContainer: false,
								  loadCSS: [
									 // "/css/print.css"
								  ],            
							 });
						});
						
						/*-------------------
						| Download PDF Result
						-------------------*/
						$("#_pdf_res").click( function(){
							
							var _url 	= $(this).attr("url");
							var _date_from 	= $(".date_from").val();
							var _date_to 	= $(".date_to").val();
							
							if(_date_to.length !==10 || _date_from.length !==10){
								window.location.href = _url;
							}else{								
								window.location.href = _url + '/' + _date_from + '/' + _date_to;	
								//window.location.href = `${url}/${_date_from}/${_date_to}`; //_url + '/' + _date_from + '/' + _date_to;	
							}
						
						});
						
						/*------------------
						| Download CSV File
						-------------------*/
						$("#_csv_res, ._csv_res").click( function(){
							_loading_message("show");
							
							var _url 		= $(this).attr("url");
							var _date_from	= 0;
							var _date_to 	= 0;
							
							if($(".date_from").length){
								_date_from	= $(".date_from").val();
							}
							if($(".date_to").length){
								 _date_to 	= $(".date_to").val();
							}
							
							if(_date_to.length !==10 || _date_from.length !==10){
								window.location.href = _url;
								
							}else{								
								window.location.href = _url + '/' + _date_from + '/' + _date_to;	
								
							}
							
							
							setTimeout( function(){
									_loading_message("hide");
							},2000);
							//alert(_url);

						});
						
	}
	
	

	function _showActionModal(){
		$(".viewmodal_link, .editmodal_link").click( function(){				
			_loading_message("show");
			 _surl 	= $(this).attr("url");						
			 _tbl 	= $(this).attr("tbl");						

			 
			$("#_default_content_modal_").modal("show");	
			//$("#_default_body_modal_").html("");
			
			$.get(_surl, function(resp){
				$("#_default_body_modal_").html(resp).promise().done( function(){
					_loading_message("hide");					
					_showActionModal();			
					//alert(_tbl);		
					if(_tbl.length > 1){
						$(_tbl).DataTable({														
							"scrollY": "200px",
							"scrollCollapse": false,
							/*"columnDefs": [{
								"targets": [1],
								"orderable": false
							}],*/
							"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
							"bStateSave": false, 
							"pagingType": "full_numbers"							
						});	
					}
					
					/*-------mask for the form---*/
					$(".numbers_and_letters").inputmask({"regex" : "[a-zA-Z0-9._-\\s]+"});
					$(".numbers_only").inputmask({"regex" : "[0-9-]+"});
					$(".letters_only").inputmask({ "regex" : "[a-zA-Z\\s]+" });
					
					ajaxFormSubmit();
					
				});
			});
		});
	}
	
	function _loading_message(type){
		$("#_loading_modal").modal(type).appendTo("body");
	}

	function _error_message(type, msg){
		$("._mem").html(msg);
		$("#_error_modal").modal(type).appendTo("body");
	}
	
	function getBaseUrl() {
		return window.location.href.match(/^.*\//);
	}
	
	function ajaxFormSubmit(){		
		$(".btnajaxsubmit").click( function(e){			
			e.preventDefault();
			var _conf = confirm("You are about to submit changes. Please confirm.");			
			if(_conf){				
				var _url 	= $(this).attr("url");
				var _form 	= $(this).attr("form");
				
				$.ajax({
					method: "POST",
					url: _url,
					data: $(_form).serialize(),
					dataType: "JSON",
					cache: false,
					beforeSend: function(){						
						_loading_message("show");
					},
					success: function(resp){												
						_responseMsg(resp.message);						
					},
					error: function(xJq, er1, er2){
						_responseMsg("An error occured during update " + xJq + er1, + er2);						
					},
					complete: function(){
						_loading_message("hide");
					}
				});
				
			}else{
				return false;
			}
		});
	}
	
	function actionModalLink(_url){
			
			var _conf = confirm("You are about to update or reset some data. Please confirm.");
			
			
			
			if(_conf){
				$.ajax({
					method: "GET",
					url: _url,
					dataType: "JSON",
					cache: false,
					beforeSend: function(){						
						_loading_message("show");
					},
					success: function(resp){												
						//console.log(resp);
						//var resp = JSON.parse(resp);
						_responseMsg(resp.message);							
					},
					error: function(xJq, er1, er2){
						_responseMsg("An error occured during update " + xJq + er1, + er2);						
					},
					complete: function(){
						_loading_message("hide");
					}
				});
				
			}else{
				return false;
			}
		
	}
	
	
	function updateCardStatusLinks(td_id){
		//alert(td_id);
		$(".updatecardstatus-link, .holder_status").click( function(e){
			
			e.preventDefault();
			var _conf = confirm("You are about to change the status of the selected item. Please confirm.");
			
			if(_conf){
				$("#view_card_detail_").modal("hide");
				
				var _url = $(this).attr("url");
				
				
				$.ajax({
					method: "GET",
					url: _url,
					dataType: "JSON",
					cache: false,
					beforeSend: function(){
						
						_loading_message("show");
					},
					success: function(resp){						
						
						_responseMsg(resp.message);	
						if(resp.status==200){							
							$("." + td_id).closest("tr").addClass("text-danger");
							$("." + td_id).closest("td").html("Status Changed"); //id of the selected td
						}
						
						$(this).prop("disabled", true);
						
						 //id of the selected td
						//window.location.href = getBaseUrl() + 'index/' + resp.card_status;
					},
					error: function(xJq, er1, er2){
						_responseMsg("An error occured during update " + xJq + er1, + er2);						
					},
					complete: function(){
						_loading_message("hide");
					}
				});
				
			}else{
				return false;
			}
		});
	}
	
	
	
	
	function _responseMsg(text){
		$(".message_modal_text").html(text);
		$("#_message_modal_default").modal("show").appendTo("body");
	}
	
	function _responseMsgRedirect(text){
		$(".message_modal_text_redirect").html(text);
		$("#_message_modal_default_redirect").modal("show").appendTo("body");
	}
	
	
	/*------------------------------
	| No disable of specific column
	-----------------------------*/
	function get_transaction_data_default(_url, tableid, cdefs){
			var _data = [];
			$.ajax({
				method		: "GET",
				url			: _url,
				cache		: false,				
				beforeSend	: function(){
					_loading_message("show");
				},
				success		: function(data){
						var _mdata = JSON.parse(data);
						$.each(_mdata.data, function(i, item){
							_data.push(item);
						});
				
						$(tableid).DataTable({
							data: _data,
							destroy: true,			
							"columnDefs": [{
								"targets": cdefs,
								"orderable": false
							}],
							"scrollY": "200px",
							"scrollCollapse": false,		
							"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
							"bStateSave": false, 
							"pagingType": "full_numbers"							
						});

						
				},
				error		: function(err1, err2, err3){
					_error_message("show", "Service is not yet available this time");
				
				},
				complete	: function(){
					_loading_message("hide");
					
				},				
			});			
	}
	
	
	function commonModalLink(_surl, tableid, _jqid){	
			$.get(_surl, function(resp){
				$("#modal_req_content").html(resp).promise().done( function(){								
					$(tableid).DataTable({														
						"scrollY": "200px",
						"scrollCollapse": false,
						"columnDefs": [{
							"targets": _jqid,
							"orderable": false
						}],
						"lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
						"bStateSave": false, 
						"pagingType": "full_numbers"							
					});								
				});			
			});
	}
	
	function generate_pdf_file(_data, _header, _url){
		//_loading_message("show");
		$.post(_url, {header: _header, data: _data}, function(resp){	
			//alert(resp.url);
			
			
		//$.post(_url, { responseType: 'arraybuffer' }, function(resp){		
			$("#_pdf_content_modal").modal("show");		
			//$("body").append(resp); 
			$("._pdf_content_body").html(resp); //.promise().done( function(){
				//_loading_message("hide");
				
				/* var blob=new Blob([resp]);
				var link=document.createElement('a');
				link.href=window.URL.createObjectURL(blob);
				link.download="sample.pdf";
				link.click();*/
				
			//});
			
			
		});		
	}
		
	
	
	
	
		
		
	/*-------------------
	| Approval Model
	--------------------*/	
	
		$("#view_content_, #_default_content_modal_").on("shown.bs.modal", function(){		
			$(this).appendTo("body");
		});
		
		/*
		$("#view_card_detail_").on("shown.bs.modal", function(){
					
		});
		*/
		
		$("#login_idle").on("shown.bs.modal", function(){
			$(this).appendTo("body");
			$.get("/cashmate/users/idle_warning", function(data, status){
				if(status!=="success"){
					 $("#login_idle").modal("hide");	 
					 $("#view_content_").modal("hide");	 
				}
			});	
		});
		
			
	
	
	/*-------------------
	| USER IDLE FUNCTION
	--------------------*/
	$(document).idleDetection({
	  onIdle: function() {
		 $("#login_idle").modal("show");	     
	  },
	  onHide: function() {
		//$("#login_idle").modal("show");	     
		//alert("Window/tab is not active anymore, do something else!");
	  },
	  onActive: function() {
		 //alert("User is active again. Hello user!");
	  },
	  onShow: function() {
		  //alert("Window is active again. Hey there window!");
	  },
	  idleCheckPeriod: 1800000 //30 mins
	});
	
	
	
	/*
	idleCheckPeriod: 1800000 //30 mins
	idleCheckPeriod: 300000 //5 mins
	idleCheckPeriod: 1000 //30 mins
	*/