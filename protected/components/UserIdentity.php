<?php
class UserIdentity extends CUserIdentity
{
	private $_id;
 
	public function authenticate()
	{
		$record = Login::model()->findByAttributes(array('user_name'=>$this->username,'activation'=>1));
		if($record===null)//validate username exsist or not 
			$this->errorCode = self::ERROR_USERNAME_INVALID;
			
		else if(md5($this->password)!=$record->password || $record->status!=1) { 
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else{
			if($record->status==1)//Authenticates only those users whose status =1
				$this->_id = $record->id;
			if($record->roles_id==3){
				$userInfo	=	SchoolsProfile::model()->findByAttributes(array('login_id'=>$record->id));
				$this->setState('userName',$userInfo->name);
				$this->setState('userImg',$userInfo->logo);
			}
			else{
				$userInfo	=	UserProfiles::model()->findByAttributes(array('login_id'=>$record->id));
				$this->setState('userName',$userInfo->first_name.' '.$userInfo->last_name);
				$this->setState('gender',$userInfo->gender);
				$this->setState('userImg',$userInfo->image);
			}
			$this->setState('userId',$record->id);
			$this->setState('profileId',$userInfo->id);
			$this->setState('userType',$record->roles->name);
			$this->setState('lastLogin',$record->last_login);
			$this->setState('activation',$record->activation);
			$userLogin	=	Login::model()->findByPk($record->id);
			$userLogin->login_status	=	1;
			$userLogin->last_login	=	date('Y-m-d H:i:s');
			$userLogin->save();
			
			$this->errorCode = self::ERROR_NONE;
		} 
		return !$this->errorCode;
	}
}