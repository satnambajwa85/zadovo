<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		
		$record = User::model()->findByAttributes(array('user_name'=>$this->username));
		if($record===null)//validate username exsist or not 
			$this->errorCode = self::ERROR_USERNAME_INVALID;			
		else if(md5($this->password)!=$record->password || $record->status!=1) { 
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else{
			if($record->user_type=='admin'){
			$this->setState('isAdmin',1);
	
			}
			$this->setState('isAdmin',1);//Authenticates only those users whose status =1
			$this->setState('userType',$record->user_type);
			$this->setState('userId',$record->id);
			$this->setState('id',$record->id);
			$this->setState('userName',$record->user_name);
			$this->errorCode=0;
		} 
		return !$this->errorCode;
	}
}