<?php

include("../include/db_connect.php");
include("../functions/functions.php");

if ($_SESSION['auth'] !='yes_auth' && $_COOKIE["account"])
{
	$str = $_COOKIE["account"];
	
	$all_len = strlen($str);
	$login_len = strpos($str,'+');
	$login = clear_string(substr($str,0,$login_len));
	$pass = clear_string(substr($str,$login_len+1,$all_len));
	
	$result = mysql_query("SELECT * FROM reg_user WHERE (login = '".$login."' OR email = '".$login."') AND pass = '".$pass."'",$link);
    if (mysql_num_rows($result) > 0)
    {
	$row = mysql_fetch_array($result);
	session_start();
	$_SESSION['auth'] = 'yes_auth';
	$_SESSION['auth_id'] = $row['user_id'];
	$_SESSION['auth_login'] = $row['login'];
	$_SESSION['auth_email'] = $row['email'];
	$_SESSION['auth_pass'] = $row['pass'];
	echo 'true';
    }
}