<?php
  
	echo "Sample Output <br />";
	
	if(isset($onus_balance_inquiries)){
		if(!empty($onus_balance_inquiries)){
			$total_balance_inquiry = 0;
			foreach($onus_balance_inquiries as $t): 
				$_tb_amount = str_replace("-", "", $t['Transbalanceinquiry']['transaction_amount']);
				$total_balance_inquiry += $_tb_amount;
				echo $t['Transbalanceinquiry']['trace_number'].'<br >';
					
			endforeach;
		
		}
	}else{
		echo "Variable is not set";
	}
	
	
?>