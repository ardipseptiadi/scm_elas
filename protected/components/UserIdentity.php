<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;

	public function authenticate()
	{
		// $users=array(
			// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );
		$user_data = User::model()->findByAttributes(array('username'=>$this->username));
		if($user_data === null){
			$this->_id = 'username NULL';
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}else if($user_data->password!==md5($this->password)){
			$this->_id = $this->username;
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->_id = $user_data->username;
			$this->setState('title',$user_data->username);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}
