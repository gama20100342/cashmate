<?php 

class MessageComponent extends Component{

    public $components = array('Session');

    public function showMsg($msg){
        $messages = array(
            'critical_save_normal_data' => 'A technical error has been encounterd by the system while processing your request',
            'error_save_normal_data'    => 'Save failed, please check the details again.',
            'critical_save_trans_data'  => 'Unable to process transaction at the moment, please try again later',
            'error_save_trans_data'     => 'Invalid transaction details, please check again.',
            'success_save_normal_data'  => 'Save successful. New details has been added',
            'success_save_trans_data'   => 'Transaction Successful',
            'cardholder_first_save'     => 'Card holder information has been saved.',
            'cardholder_second_save'    => 'Card application has been saved.',
			'password_dont_exist'		=> 'Current password does not match, please try again',
			'password_in_used'			=> 'Password already in used, please try another',
			'password_available'		=> 'Password is available and ready to use',
			'password_not_match'		=> 'Password do not match, please try again',
			'password_not_valid'		=> 'Password should be at least six (6) alphanumeric with 1 special and 1 uppercase',
			'cannot_change_password'	=> 'Unable to change the password, please try again',
			'password_changed'			=> 'Password has been successfully changed, please login again using your new password'
        );
        
        return $messages[$msg];
    }

    public function msgSuccess($msg){
        return $this->Session->setFlash($msg, 'success_message');
    }

    public function msgInfo($msg){
        return $this->Session->setFlash($msg, 'info_message');
    }

    public function msgError($msg){
        return $this->Session->setFlash($msg, 'error_message');
    }

    public function msgCommonError(){
        return $this->Session->setFlash('Save failed, please check the details again.', 'error_message');
    }

    public function msgCommonUpdate(){
        return $this->Session->setFlash('Changes has been successfully saved.', 'success_message');
    }

    public function msgCommonExists(){
		return $this->Session->setFlash('The details that you are about to save is already exsits.', 'error_message');
	}
    public function msgCommonSuccess(){
        return $this->Session->setFlash('New details has been successfully saved.', 'success_message');
    }
	
	public function respMsg($code, $msg=null){
		$codes = array(
			"200" => "Ok",
			"400" => "Bad Request",
			"401" => "Unauthorized",
			"403" => "Forbidden",
			"404" => "Not Found",
			"500" => "Internal Server Error"        
		);
		
		return array(
			"status" 	=> $code,
			"message" 	=> isset($msg) && !empty($msg) ? $msg : $codes[$code]
		);
	}
	
	
	
	

}