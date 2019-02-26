<?php

// This is the database connection configuration.
$ini = @parse_ini_file('env/.env', true);
return array(
	// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => isset($ini['database']['conn_str'])
                ? $ini['database']['conn_str']:"mysql:host=localhost;dbname=scm_elas",
	'emulatePrepare' => true,
	'username' => isset($ini['database']['user']) ? $ini['database']['user'] :'root'
	'password' => isset($ini['database']['password']) ? $ini['database']['password'] :'',
	'charset' => 'utf8',

);
