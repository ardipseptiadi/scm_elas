<?php

/**
 * ForgotForm class.
 * ForgotForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ForgotForm extends CFormModel
{
  public $email;
  public $username;
	public $password;
	public $rememberMe;

	private $_identity;
}
