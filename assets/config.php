<?php
session_start();
ob_start();
$_SESSION['page'] = 'N';

public $dbhost = "sg2nlmysql37plsk.secureserver.net";
	public $dbname = "servin";
	public $dbuser = "servin";
	public $dbpass = 'Gcu22c5^';
	public $dbport = '3306';


//mysqli_connect($servername, $username, $password) or die(mysql_error());
//mysqli_select_db($dbname) or die(mysql_error());
$con = @mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname,$this->dbport);
$result = 0;
		if (mysqli_connect_errno()) {
			$result = "Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error();
		}
		else{
			$result = "Connected";
		}
		return $result;
?>