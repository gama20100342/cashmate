<?php
if(isset($response) && !empty($response)){
	if($response["code"]=="400"){
		echo json_encode($response);
	}else{
		echo json_encode($response);
			/*$this->Js->request(
			  array('http://localhost:81/slimAPI/public/authenticate'),
			  array(
				  'async' => true,
				  'dataExpression' => true,
				  'data' => '{
						userid 			: '.$response["user_details"]["userid"].',
						firstname 		: '.$response["user_details"]["firstname"].',
						lastname 		: '.$response["user_details"]["lastname"].',
						refid 			: '.$response["user_details"]["refid"].',
						terminal_id 	: '.$response["user_details"]["terminal_id"].'
					}',				  
				  'method' => 'POST',
				  'success' => 'console.log(data);'
				)
			  );
		
		 $this->Js->buffer($request);*/
		
		/*echo $this->Js->writeBuffer();
		$this->append('script');
		echo $this->Js->writeBuffer();
		$this->end();*/

		echo  $this->Js->Buffer('
			$(document).ready( function(){
				$.ajax({
					method: "GET",
					url: "http://localhost:81/slimAPI/public/authenticate_and_generate_user_token",				 							
					success: function(resp){
						console.log(resp);
					}
				});
			});
		');
		
		/*echo  $this->Js->Buffer('
				$.ajax({
					method: "POST",
					url: "http://localhost:81/slimAPI/public/authenticate_and_generate_user_token",
					dataType: "jsonp",					 
					data: {
						userid 		: '.$response["user_details"]["userid"].',
						firstname 	: '.$response["user_details"]["firstname"].',
						lastname 	: '.$response["user_details"]["lastname"].',
						refid 		: '.$response["user_details"]["refid"].',
						terminal_id : '.$response["user_details"]["terminal_id"].'
					},					
					success: function(resp){
						alert(resp);
					}
				});
			
			
		');*/
		
		
		
		
		/*echo $this->Js->Buffer('			
			$.post( "http://localhost:81/slimAPI/public/authenticate", { 
						userid 			: '.$response["user_details"]["userid"].',
						firstname 		: '.$response["user_details"]["firstname"].',
						lastname		: '.$response["user_details"]["lastname"].',
						refid 			: '.$response["user_details"]["refid"].',
						terminal_id 	: '.$response["user_details"]["terminal_id"].'
			}, function( data ) {
				JSON.stringify(data);
				return data;
			}, "json");
		');*/
		
	}
}
?>